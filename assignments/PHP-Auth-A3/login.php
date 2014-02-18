<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/17/14
 * Time: 11:41 PM
 */

require __DIR__ . '/vendor/autoload.php';

use \Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();

foreach ($session->getFlashBag()->get('flash', array()) as $message) {
    echo '<div data-alert class="alert-box">' . $message . '</div>';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/foundation.min.css" />
<body>
    <div class="row" style="padding-top:50px">
        <div class="small-6 large-4 small-centered large-centered columns">
            <h2 style="padding-bottom: 50px">Login</h2>

            <form method="post" action="login-process.php">
                    <label>Username:</label>
                    <input type="text" placeholder="student1" name="username">
                    <label>Password:</label>
                    <input type="password" name="password">
                    <button class="button small radius" type="submit">Log In</button>
            </form>
        </div>
    </div>
    <script>
        $(document).foundationAlerts();
    </script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.js"></script>
    <script src="js/foundation/foundation.alert.js"></script>
</body>
</html>