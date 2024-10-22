<?php
//Importa la libreria para poder crear el objeto del modelo. 
require_once 'model/libreriaModel.php';


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
        $tiempoMaximo = 60 * 30;
        if (isset($_SESSION['tiempoSesion']) && (time() - $_SESSION['tiempoSesion'] > $tiempoMaximo)) {
            session_unset(); // Borro las variables de sesión
            session_destroy(); // Destruyo la sesión
            header("Location: index.php"); // Redirijo al usuario al login
            exit();
        }
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

            // Esto ocurre en el servidor para su posterior verificación.
            $usuario = $_POST['user'];
            $contra = $_POST['password'];

            // Verifico si es admin o usuario y retorno las vistas correspondientes.
            if ($usuario == 'admin' && $contra == 'abcdef') {

                // Si las credenciales son correctas, se guarda el usuario en la sesión.
                $_SESSION["user"] = "Admin";

                // Llamo a el método para ver si aun se mantiene activa la sesion en caso de recarga de la web. 
                $this->verificarSesion();

                // si no esta guardado el tiempo de sesion lo guardo en una variable, en caso que ya este no lo hago. 
                if (!isset($_SESSION['tiempoSesion'])) {
                    $_SESSION['tiempoSesion'] = time();
                }

                //Envio la vista
                include 'view/adminView.php';
                exit(); // Se finaliza la ejecución para asegurarse de que no se ejecuta más código.

            } elseif ($usuario == 'user' && $contra == '123') {

                $libros = $this->modelo->cargarLibros();
                // Si las credenciales son correctas, se guarda el usuario en la sesión.
                $_SESSION["user"] = "user";

                $this->verificarSesion();

                if (!isset($_SESSION['tiempoSesion'])) {
                    $_SESSION['tiempoSesion'] = time();
                }
                include 'view/usuarioView.php';
                exit(); // Se finaliza la ejecución para asegurarse de que no se ejecuta más código.
            } else {
                // Si las credenciales son incorrectas, redirijo al usuario nuevamente a index.php.
                header(header: "Location: index.php");
                exit(); // Se finaliza la ejecución.
            }
        }




    }

}

?>