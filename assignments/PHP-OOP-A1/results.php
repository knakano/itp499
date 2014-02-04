<html>
    <head>
        <link rel="stylesheet" href="css/foundation.css" />
    </head>
    <?php
    /**
     * Created by PhpStorm.
     * User: kalynnakano
     * Date: 1/21/14
     * Time: 5:32 PM
     */

    $host = 'itp460.usc.edu';
    $dbname = 'dvd';
    $user = 'student';
    $pass = 'ttrojan';

    $title = $_GET['title']; // $_REQUEST['artist']

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    $sql = "
    SELECT title, rating, genre, format
    FROM dvd_titles
    INNER JOIN ratings
    ON dvd_titles.rating_id = ratings.id
    INNER JOIN genres
    ON dvd_titles.genre_id = genres.id
    INNER JOIN formats
    ON dvd_titles.format_id = formats.id
    WHERE title LIKE ?
    ORDER BY title
    ";

    $statement = $pdo->prepare($sql);
    $like = '%'.$title.'%';
    $statement->bindParam(1, $like);

    $statement->execute();
    $dvds = $statement->fetchAll(PDO::FETCH_OBJ);

    //var_dump($dvds);
    ?>
    <body>
        <div class="row">
            <div class="large-6 columns" style="padding-top:50px">
                <form method="get" action="results.php">
                    <div class="row collapse">
                        <div class="small-10 columns">
                            <input type="text" placeholder="Search by DVD title" name="title">
                        </div>
                        <div class="small-2 columns">
                            <input type="submit" class="button postfix" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-bottom: 100px">
            <div class="large-12 columns">
                <?php if (empty($dvds)) : ?>
                    <h1 style="padding-bottom: 50px">Sorry, no results were found for: '<?php echo $title ?>'</h1>
                <?php endif ?>
                <?php if (!empty($dvds)) : ?>
                    <h1 style="padding-bottom: 50px">Search results for: '<?php echo $title ?>'</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>DVD Title</th>
                            <th>Rating</th>
                            <th>Genre</th>
                            <th>Format</th>
                        </tr>
                        </thead>
                        <?php foreach($dvds as $dvd) : ?>
                            <tr>
                                <td><?php echo $dvd->title ?></td>
                                <td><?php echo $dvd->rating ?></td>
                                <td><?php echo $dvd->genre ?></td>
                                <td><?php echo $dvd->format ?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                <?php endif ?>
            </div>
        </div>
    </body>
</html>