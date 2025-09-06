<?php

require_once __DIR__ . '/../vendor/autoload.php';

$env = $_SERVER['APPLICATION_ENV'] ?? 'local';
//Add sentry config here if needed
//\Sentry\init([
//    'dsn' => getenv('SENTRY_DSN'),
//]);

/** Api Application  */
try {
    $application = new \Pantono\Core\Application\ApiApplication($env, __DIR__ . '/../');
    $application->run();
} catch (\Exception $e) {
    $debug = \Pantono\Utilities\StringUtilities::boolValue($_ENV['DEBUG'] ?? '0');
    header('HTTP/1.1 500 Internal Server Error');
    if ($debug === true) {
        echo json_encode(['error' => true, 'message' => $e->getMessage(), 'trace' => $e->getTrace()]);
    } else {
        echo json_encode(['error' => true, 'message' => 'An application error occurred']);
    }
}

/** Web Application  */
/*try {
    $application = new \Pantono\Core\Application\WebApplication($env, __DIR__ . '/../');
    $application->run();
} catch (\Exception $e) {
    $debug = \Pantono\Utilities\StringUtilities::boolValue($_ENV['DEBUG'] ?? '0');
    header('HTTP/1.1 500 Internal Server Error');
    if ($debug === true) {
        echo $e->getMessage();
        dd($e->getTrace());
    } else {
        echo 'An application error occurred';
    }
}*/
