<?php
require_once 'model/libreriaModel.php';


class LibreriaController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new LibreriaModel();
    }

    public function listarLibros()
    {
        $libros = $this->modelo->cargarLibros();
        return $libros;

    }

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

                // También guardo el tiempo de inicio de la sesión para gestionar la duración.
                $_SESSION['tiempoSesion'] = time();

                //Envio la vista
                include 'view/adminView.php';
                exit(); // Se finaliza la ejecución para asegurarse de que no se ejecuta más código.

            } elseif ($usuario == 'user' && $contra == '123') {

                $libros = $this->modelo->cargarLibros();
                // Si las credenciales son correctas, se guarda el usuario en la sesión.
                $_SESSION["user"] = "user";

                // También guardo el tiempo de inicio de la sesión para gestionar la duración.
                $_SESSION['tiempoSesion'] = time();

                //Realizo el include de la vista
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