<?php 
    namespace Config;
    use Config\Request as Request;

    class Router{
        
        public static function Route(Request $request)
        {
            /*
            var_dump($request);
            echo "<br><br>";
            */

            $controllerName = $request->getcontroller() . 'Controller';
            //echo "<br>Controller Name --->>  $controllerName <br>";

            $methodName = $request->getmethod();
            //echo "<br>Metohd Name --->  $methodName <br>";

            $methodParameters = $request->getparameters();
            /*
            echo "<br>Method PArameters <br>";
            var_dump($methodParameters);
            */

            $controllerClassName = "Controllers\\". $controllerName;
            //echo "<br>Controller Class Names --->>  $controllerClassName <br>";            

            $controller = new $controllerClassName;
            /*
            echo "<br>Controller --->>   <br>";
            var_dump($controller);
            */
            if(!isset($methodParameters))            
                call_user_func(array($controller, $methodName));
            else
                call_user_func_array(array($controller, $methodName), $methodParameters);
        }
    }
?>