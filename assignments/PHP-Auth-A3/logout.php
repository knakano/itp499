<?php

require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->invalidate();

$response = new RedirectResponse('login.php');
return $response->send();