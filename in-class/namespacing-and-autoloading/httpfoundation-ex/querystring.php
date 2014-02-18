<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/4/14
 * Time: 6:10 PM
 */

require __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;

$request = Request::createFromGlobals();

echo $request->query->get('fullname'); // $_GET['fullname']

//header('Location: index.php'); // Instead of this, do:
//$response = new RedirectResponse('http://google.com'); // Better for testing
//$response->send(); // To actually redirect

$session = new Session();
$session->start(); // session_start()
//$session->set('fullname', 'David Tang');
//$session->set('email', 'dtang@usc.edu');
//$session->set('loginTime', time());


// To log out:
//$session->clear(); // session_destroy()

echo $session->get('fullname');
echo '<br/>';
echo $session->get('loginTime');


// Flash Message:
//$session->getFlashBag()->set('statusMessage', 'Thanks!'); // Only persists for one request

var_dump($session->getFlashBag()->get('statusMessage'));

// Login:

 $request->request->get('fullname'); // $_POST['fullname']