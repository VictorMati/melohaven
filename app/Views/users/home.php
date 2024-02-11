<?php include_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\Views\components\SongCard.php") ;

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\controllers\HomeController.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloHaven - Home</title>
    <link rel="stylesheet" href="/public/css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
<body>

    <section class="banner">
        <!-- Sliding banner content with text and action button -->
        <div class="banner-content">
            <h1>Welcome to MeloHaven</h1>
            <p>Discover, Enjoy, and Share Your Favorite Music</p>
            <a href="" class="subscribe-button">Premium Account</a>
        </div>
    </section>

    <?php
    $sections = [
        'New Songs' => $newSongs,
        'Popular Artists' => $popularArtists,
        'Recommended Songs' => $recommendedSongs,
        'Popular Songs' => $popularSongs,
        'Favorites' => $favoriteSongs
    ];

    foreach ($sections as $title => $data) :
    ?>
        <section class="home-section">
            <h2><?= $title ?></h2>
            <div class="<?= strtolower(str_replace(' ', '-', $title)) ?>-cards-container">
                <?php if (isset($data) && is_array($data)) : ?>
                    <?php foreach ($data as $item) : ?>
                        <?php SongCard::render($item); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No <?= strtolower($title) ?> available.</p>
                <?php endif; ?>
            </div>
            <a href="?page=view_more&type=<?= strtolower(str_replace(' ', '_', $title)) ?>">See More</a>
        </section>
    <?php endforeach; ?>

<section class="home-section">
    <h2>Playlists</h2>
    <div class="playlist-cards-container">
        <?php if (isset($playlists) && is_array($playlists)) : ?>
            <?php foreach ($playlists as $playlist) : ?>
                <!-- Playlist card rendering logic goes here -->
                <?php SongCard::render($playlist); ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No playlists available.</p>
        <?php endif; ?>
    </div>
    <a href="?page=view_more&type=playlists">See More</a>
</section>

<section class="home-section">
    <h2>Genres</h2>
    <div class="genre-cards-container">
        <?php if (isset($genres) && is_array($genres)) : ?>
            <?php foreach ($genres as $genre) : ?>
                <!-- Genre card rendering logic goes here -->
                
            <?php endforeach; ?>
        <?php else : ?>
            <p>No genres available.</p>
        <?php endif; ?>
    </div>
    <a href="?page=view_more&type=genres">See More</a>
</section>


    <!-- Include any necessary scripts at the end of the body -->

</body>

</body>

</html>
