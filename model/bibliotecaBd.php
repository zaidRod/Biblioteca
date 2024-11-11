<?php
class BibliotecaBd
{
    private static $conexion = null;
    private static function conexionBd()
    {
        //Credenciales de la base de datos.  
        $ficheroConfig = parse_ini_file(__DIR__ . "../config.ini");
        //Valaido si hay una conexión previamente establecida
        if (self::$conexion === null) {
            self::$conexion = new mysqli($ficheroConfig['server'], $ficheroConfig['user'], $ficheroConfig['pasw'], 'biblioteca');
            //Error de conexión. 
            if (self::$conexion->connect_error) {
                die("Error de conexión " . self::$conexion->connect_error);
            }
            self::$conexion->set_charset('utf8');
        }
        return self::$conexion;
    }

    public static function consultaInsercion($consulta, ...$parametros)
    {
        $conexion = self::conexionBd();
        $preparacion = self::preparar($conexion, $consulta, ...$parametros);
        if ($preparacion->execute()) {
            return true;
        } else {
            //En caso de error se retorna
            return false;
        }
    }



    private static function preparar($conexion, $consulta, ...$parametros)
    {
        $preparacion = $conexion->prepare($consulta);
        if ($parametros) {
            $tipos = "";
            foreach ($parametros as $parametro) {
                //Verifica si el paramtero es un número o un string
                $tipos .= is_int($parametro) ? 'i' : 's';
            }
        }
        $preparacion->bind_param($tipos, ...$parametros);
        return $preparacion;
    }

    public static function consultaLectura($consulta, ...$parametros)
    {
        $conexion = self::conexionBd();
        $preparacion = self::preparar($conexion, $consulta, ...$parametros);
        $preparacion->execute();
        $resultado = $preparacion->get_result();

        //Comprobación de resultados
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            return null;
        }


    }

    public static function cerrarConexion()
    {
        if (self::$conexion !== null) {
            self::$conexion->close();
            self::$conexion = null;

        }
    }


}

