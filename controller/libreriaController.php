<?php
//Importa la libreria para poder crear el objeto del modelo. 
require_once 'model/libreriaModel.php';
require_once 'model/bibliotecaBd.php';

//Creación de la clase controlador
class LibreriaController
{
    //Creo el atributo donde guardare el modelo
    private $modelo;
    // Con el método constructor cargo la variable.
    public function __construct()
    {
        $this->modelo = new LibreriaModel();
    }

    //Función que controla el tiempo de cada sesión.
    public function verificarSesion()
    {
        $tiempoMaximo = 60*30;
        if (isset($_SESSION['tiempoSesion']) && (time() - $_SESSION['tiempoSesion'] > $tiempoMaximo)) {
            session_unset(); // Borro las variables de sesión
            session_destroy(); // Destruyo la sesión
            header("Location: index.php"); // Redirijo al usuario al login
            exit();
        }
    }

    public function cerrarSesion()
    {
        session_unset(); // Borro las variables de sesión
        session_destroy(); // Destruyo la sesión.
        include 'view/formularioInicio.html';
    }

    // Defino el método que utilizare para listar los libros, llamandola desde el modelo y retornado el valor en una variable.
    public function listarLibros()
    {
        $libros = $this->modelo->cargarLibros();
        return $libros;

    }
    //Creo un método para validar el usuario que ha iniciado sesion, bien sea admin o user. 
    public function iniciarSesion()
    {
        // verico que si existan las variables de usuario y contraseña enviadas por el formulario.
        if (isset($_POST['user']) && isset($_POST['password'])) {

            //Guardo los valores enviados por post
            $usuario = $_POST['user'];
            $contra = $_POST['password'];

            $credencialesCorrectas = $this->comprobarContrasena($usuario, $contra);


            if ($credencialesCorrectas == "correcto") {
                //Guardado del tiempo de sesión.

                if ($usuario == "admin") {
                    $_SESSION["user"] = "Admin";
                    if (!isset($_SESSION['tiempoSesion'])) {
                        $_SESSION['tiempoSesion'] = time();
                    }
                    $this->verificarSesion();
                    //Envio la vista
                    include 'view/adminView.php';
                    exit();

                } else {
                    $libros = $this->modelo->cargarLibros();
                    $_SESSION["user"] = $usuario;
                    if (!isset($_SESSION['tiempoSesion'])) {
                        $_SESSION['tiempoSesion'] = time();
                    }
                    $this->verificarSesion();
                    include 'view/usuarioView.php';
                    exit();
                }

            } elseif ($credencialesCorrectas == "contraseñaIncorrecta") {
                echo "<div class='contenedorCentrado'> <div class='contenido'> Contraseña incorrecta, intente de nuevo. <br> <a href='index.php'> Volver al formulario </a> </div> <div>";
            } else {
                echo "<div class='contenedorCentrado'> <div class='contenido'> No existe ese usuario, intente de nuevo. <br> <a href='index.php'> Volver al formulario </a> </div> <div>";
            }
        }

    }

    public function retomarSesion()
    {
        $this->verificarSesion();
        $libros = $this->modelo->cargarLibros();
        include 'view/usuarioView.php';
        exit();
    }
    public function retomarSesionAdmin()
    {
        $this->verificarSesion();
        include 'view/adminView.php';
        exit();
    }

    public function comprobarContrasena($usuario, $contraseña)
    {
        $consulta = "SELECT * FROM `usuarios` where nick_usuario = ? ";
        $resultado = BibliotecaBd::consultaLectura($consulta, $usuario);
        $salida = "";

        $hashContraIngresada = hash('sha256', $contraseña);

        if ($resultado == true && count($resultado) > 0) {
            $contaUsuario = $resultado[0]['contrasena'];
            if ($hashContraIngresada == $contaUsuario) {
                return $salida = "correcto";
            } else {
                return $salida = "contraseñaIncorrecta";
            }

        } else {
            return $salida = "usuarioNoExiste";
        }

    }

}

?>