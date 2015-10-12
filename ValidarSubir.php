<?php

class ValidarSubir {
    //$boton es el campo de texto que contiene el archivo
    private static function validarNombre($boton){
        //Comprobamos la extensión
        $nombre = $_FILES[$boton]["name"];
        $extension = $nombre.  substr($nombre,-3);
        if($nombre=='php'){
            return FALSE;
        }
    }
    private static function validarTamano($boton){
        //Comprobamos el tamaño del archivo
        $tamano = $_FILES[$boton]["size"];
        if($tamano > 100000){
            return FALSE;
        }
    }
    static function fileUpload($boton,$nombreArchivo=null,$ruta=null){
        self::validarNombre($boton);
        self::validarTamano($boton);
        $nombre = $_FILES[$boton]["name"];
        $archivoRuta = dirname($ruta.'/'.$nombreArchivo);
        //si esta el archivo no me deja subirlo
        //$boton es el campo de texto que contiene el archivo
        if(file_exists($archivoRuta)){
            return '<h1>Archivo ya subido</h1>';
        }else{
            move_uploaded_file($_FILES[$boton]["tmp_name"],$archivoRuta);
            return "<h1>".'$archivoRuta'."</h1>". 
            "<h1> Archivo subido con exito </h1>";
        }
        
    }
}
