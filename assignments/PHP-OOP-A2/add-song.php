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
    require_once 'classes/ArtistQuery.php';
    require_once 'classes/GenreQuery.php';
    require_once 'classes/ArtistMenu.php';
    require_once 'classes/GenreMenu.php';

    $artistQuery = new ArtistQuery($pdo);
    $artists = $artistQuery->getAll();

    $genreQuery = new GenreQuery($pdo);
    $genres = $genreQuery->getAll();

    ?>

    <body>
        <div class="row">
            <div class="large-6 large-centered columns" style="padding-top:50px">
                <h1 style="padding-bottom: 50px">Add Song</h1>
                <form method="post" action="add-song-process.php">
                    <div>
                        <label>Title:</label>
                        <input type="text" name="title" />
                    </div>
                    <div>
                        <label>Artist:</label>
                        <?php echo new ArtistMenu('artist', $artists) ?>
                    </div>
                    <div>
                        <label>Genre:</label>
                        <?php echo new GenreMenu('genre', $genres) ?>
                    </div>
                    <div>
                        <label>Price:</label>
                        <input type="text" name="price" />
                    </div>
                    <div>
                        <input type="submit" class="button radius" value="Add Song" />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>