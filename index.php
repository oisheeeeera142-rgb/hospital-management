<?php

session_start();

require_once 'routes/web.php';

/*
|--------------------------------------------------------------------------
| ERROR REPORTING
|--------------------------------------------------------------------------
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

/*
|--------------------------------------------------------------------------
| BASE PATH
|--------------------------------------------------------------------------
*/

define('BASE_URL', 'http://localhost/hospital /');

/*
|--------------------------------------------------------------------------
| CSRF TOKEN
|--------------------------------------------------------------------------
*/

if (empty($_SESSION['csrf_token'])) {

    $_SESSION['csrf_token'] =
        bin2hex(random_bytes(32));
}

/*
|--------------------------------------------------------------------------
| AUTOLOAD MODELS & CONTROLLERS
|--------------------------------------------------------------------------
*/

spl_autoload_register(function ($class) {

    $modelPath = "model/$class.php";
    $controllerPath = "controller/$class.php";

    if (file_exists($modelPath)) {
        require_once $modelPath;
    }

    if (file_exists($controllerPath)) {
        require_once $controllerPath;
    }
});

/*
|--------------------------------------------------------------------------
| HELPER FUNCTIONS
|--------------------------------------------------------------------------
*/

function sanitize($data)
{
    return htmlspecialchars(
        trim($data),
        ENT_QUOTES,
        'UTF-8'
    );
}

function redirect($page)
{
    header("Location:index.php?page=$page");
    exit;
}

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function checkRole($role)
{
    if (
        !isset($_SESSION['role']) ||
        $_SESSION['role'] !== $role
    ) {

        die("Unauthorized Access");
    }
}

/*
|--------------------------------------------------------------------------
| AUTH FUNCTION
|--------------------------------------------------------------------------
*/

function auth($role)
{
    if(
        !isset($_SESSION['role']) ||
        $_SESSION['role'] !== $role
    ){
        header('Location:index.php?page=login');
        exit;
    }
}

/*
|--------------------------------------------------------------------------
| FLASH MESSAGE
|--------------------------------------------------------------------------
*/

if (isset($_SESSION['success'])) {

    echo '
    <input type="hidden"
    id="success-message"
    value="' . $_SESSION['success'] . '">
    ';

    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {

    echo '
    <input type="hidden"
    id="error-message"
    value="' . $_SESSION['error'] . '">
    ';

    unset($_SESSION['error']);
}

/*
|--------------------------------------------------------------------------
| LOAD ROUTES
|--------------------------------------------------------------------------
*/

require_once 'routes/web.php';

