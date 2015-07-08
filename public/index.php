<?php
try
{
    set_include_path
    (
        get_include_path() . PATH_SEPARATOR . getcwd() . '/../lib/' . PATH_SEPARATOR.
        get_include_path() . PATH_SEPARATOR . getcwd() . '/../application/config/'. PATH_SEPARATOR.
        get_include_path() . PATH_SEPARATOR . getcwd() . '/../application/controllers/' . PATH_SEPARATOR.
        get_include_path() . PATH_SEPARATOR . getcwd() . '/../application/views/' . PATH_SEPARATOR.
        get_include_path() . PATH_SEPARATOR . getcwd() . '/../application/models/' . PATH_SEPARATOR

    );


    function MVCAutoload( $className )
    {
        include $className . '.php';
    }

    spl_autoload_register('MVCAutoload', true, true);


    $request = new Request();

    $controller = $request->getParam( 'controller', 'index' );
    $action = $request->getParam( 'action', 'index' );


    $config = Config::getInstance();
    $config = $config->getConfig();


    if( file_exists( $config['APP_DIR'] . 'controllers/' . $controller . 'Controller.php' ) )
    {

        $requestObject = $controller . 'Controller';
        $actObject = new $requestObject();

        if( class_exists( $requestObject ) )
        {
            $requestAction = $action . 'Action';

            if( method_exists($requestObject,$requestAction))
            {
                ob_start();
                $actObject->$requestAction();

                $content = ob_get_contents();
                ob_end_clean();

                include_once( $config['LAYOUT'] );
            }
            else
            {
                throw new Exception( 'Action ' . $action. 'not exists in file: ' . $config['APP_DIR'] . 'controllers/' . $requestObject . '.php' );
            }
        }
        else
        {
            throw new Exception( 'Class ' . $controller . 'Controller not exists in file: ' . $config['APP_DIR'] . 'controllers/' . $requestObject . '.php' );
        }

    }
    else
    {
        throw new Exception( 'File ' . $config['APP_DIR'] . 'controllers/' . $controller . 'Controller.php not exists' );
    }






}
catch ( Exception $e )
{
    echo '<pre style="color:red;"><h1>ERROR</h1><br />';
    echo 'IN LINE: '. $e->getLine().'<br />';
    echo 'MESSAGE: '. $e->getMessage().'<br />';
    echo 'CODE: '. $e->getCode().'<br />';
    echo 'TRACE: ' . $e->getTraceAsString();
    echo '</pre>';
}

