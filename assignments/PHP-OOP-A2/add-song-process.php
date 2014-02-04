<html>
    <head>
        <link rel="stylesheet" href="css/foundation.css" />
    </head>

    <?php
    /**
     * Created by PhpStorm.
     * User: kalynnakano
     * Date: 1/30/14
     * Time: 9:58 PM
     */

    require_once 'db.php';
    require('classes/Song.php');

    $song = new Song($pdo);
    $song->setTitle($_POST['title']);
    $song->setArtistId($_POST['artist']);
    $song->setGenreId($_POST['genre']);
    $song->setPrice($_POST['price']);
    $response = $song->save();

    ?>

    <body>
        <div class="row">
                <?php if ($response === true) : ?>
                    <div class="large-6 large-centered columns" style="border:3px #158342 solid; margin-top:50px; padding: 20px;">
                        <h3>The song <?php echo $song->getTitle() ?>
                            with an ID of <?php echo $song->getId() ?>
                            was inserted successfully!</h3>
                    </div>
                <?php else : ?>
                    <div class="large-6 large-centered columns" style="border:3px #c6142f solid; margin-top:50px; padding: 20px;">
                        <h3>There was an error adding your song.</h3>
                    </div>
                <?php endif ?>
        </div>
        <div class="row" style="margin-top: 50px">
            <div class="large-6 large-centered columns" style="text-align: center">
                <a href="add-song.php" class="button radius">Add another song</a>
            </div>
        </div>
    </body>
</html>