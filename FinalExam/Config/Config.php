<?php 
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder

    /* ESTA ERA LA RUTA ORIGNAL DEL PROYECTO
    define("FRONT_ROOT", "http://localhost/FinalExam/");
    */

    // ESTA ES LA RUTA PARA QUE ANDE EN MI PC POR COMO TENGO ORGANIZADO MI HTDOC DE XAmpp
    define("FRONT_ROOT", "http://localhost/Laboratorio 4 PHP/Archivos de parciales/lazcano/FinalExam/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

    define("DB_HOST", "localhost");
    define("DB_NAME", "tickets");
    define("DB_USER", "root");
    //define("DB_PASS", "boca852456");
    define("DB_PASS", "");
?>