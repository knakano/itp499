<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/17/14
 * Time: 11:41 PM
 */

require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use ITP\Auth;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;

date_default_timezone_set('America/Los_Angeles');

$request = Request::createFromGlobals();
//echo $request->get('username');

// Start new session
$session = new Session();
$session->start();

// Get session attributes
$username = $request->get('username');
$password = $request->get('password');


// If the user navigates directly to this page and they are logged in,
// redirect to dashboard. Otherwise, redirect back to the login page
if ($session->has('loginTime')) {
    $response = new RedirectResponse('dashboard.php');
    return $response->send();
}

// Authentication
$auth = new Auth($pdo);

// If valid credentials are passed, store the following data in the session
// username, email, unix timestamp of the logged in time
if ($auth->attempt($username, $password)) {

    // Set session attributes
    $session->set('username', $username);
    $session->set('email', $auth->checkUser($username)["email"]);
    $session->set('loginTime', time());

    // Redirect users to dashboard.php if they log in successfully
    // and display a flash message "You have successfully logged in!"
    $session->getFlashBag()->set('flash', 'You have successfully logged in!');

    $response = new RedirectResponse('dashboard.php');
    return $response->send();

}

// If invalid credentials were passed, redirect to login.php
// with an error flash message "Incorrect credentials"

else {

    $session->getFlashBag()->set('flash', 'Incorrect credentials');
    $response = new RedirectResponse('login.php');
    return $response->send();

}

?>
