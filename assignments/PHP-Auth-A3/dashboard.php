<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/17/14
 * Time: 11:42 PM
 */

require __DIR__ . '/vendor/autoload.php';
require_once 'db.php';

use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;
use \Carbon\Carbon;

$session = new Session();
$session->start();


// The dashboard is a page that only authenticated users can access.
// If I navigate directly to this page and I am not logged in,
// I should be redirected to login.php.

if (!($session->has('loginTime'))) {
    $response = new RedirectResponse('login.php');
    return $response->send();
}

// In the upper right corner, display:
// the username and email of the logged in user
// echo $session->get('username');
// echo $session->get('email');


// the time of the login in the format: Last Login: 5 seconds ago.
// Use the Carbon package for this.

date_default_timezone_set('America/Los_Angeles');
$time = $session->get('loginTime');
$carbonTime = Carbon::createFromTimestamp($time)->diffForHumans();
//echo 'Last login: ' . $carbonTime;


// Display a table with headings of all songs containing:
// title, artist, genre, price

$songQuery = new ITP\Songs\SongQuery($pdo);
$songs = $songQuery
    ->withArtist()
    ->withGenre()
    ->orderBy('title')
    ->all();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/foundation.min.css" />
<body>
    <div class="fixed">
        <nav class="top-bar" data-topbar>
            <ul class="title-area">
                <li class="name">
                    <h1><a href="#"><?php echo $session->get('username'); ?></a></h1>
                </li>
            </ul>
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li><a href="#"><?php echo 'Last login: ' . $carbonTime; ?></a></li>
                    <li class="active"><a href="logout.php">Logout</a></li>
                </ul>
                <!-- Left Nav Section -->
                <ul class="left">
                    <li><a href="#"><?php echo $session->get('email'); ?></a></li>
                </ul>
            </section>
        </nav>
    </div>
    <?php
        foreach ($session->getFlashBag()->get('flash', array()) as $message) {
            echo '<div data-alert class="alert-box success" style="margin-top:45px; margin-bottom:20px;">' . $message . '</div>';
        }
    ?>
    <div class="row">
        <div class="large-12 small-12 small-centered large-centered columns" style="margin-top:50px; margin-bottom:50px;">
            <h1><small>Dashboard - Songs</small></h1>
        <table>
            <thead>
                <tr>
                    <th width="300">Title</th>
                    <th width="300">Artist</th>
                    <th width="200">Genre</th>
                    <th width="100">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($songs as $song) {
                    echo '<tr>';
                        echo '<td>' . $song['title'] . '</td>';
                        echo '<td>' . $song['artist_name'] . '</td>';
                        echo '<td>' . $song['genre'] . '</td>';
                        echo '<td>' . $song['price'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>
    <script>
        $(document).foundationAlerts();
    </script>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/modernizer.js"></script>
    <script src="js/foundation/foundation.js"></script>
    <script src="js/foundation/foundation.alert.js"></script>
    <script src="js/foundation/foundation.topbar.js"></script>
</body>
</html>

