<?php
include_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\Views\components\SongCard.php");
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
    <script src="/public/js/Home.js" defer></script>
</head>

<body>
<section class="banner">
    <div class="banner-slider">
        <!-- Slides for the sliding banner -->
        <div class="slide">
            <img src="/public/images/banner_images/slide 1.jpg" alt="Banner Image">
            <div class="slide-content">
                <h1>Welcome to MeloHaven</h1>
                <p>Discover, Enjoy, and Share Your Favorite Music</p>
                <a href="" class="subscribe-button">Premium Account</a>
            </div>
        </div>
        <!-- Add more slides as needed -->

        <!-- Navigation arrows for the sliding banner -->
        <div class="arrow arrow-left"><i class="fas fa-chevron-left"></i></div>
        <div class="arrow arrow-right"><i class="fas fa-chevron-right"></i></div>
    </div>

    <!-- Genre cards section to the right of the banner -->
    <div class="genre-cards">
        <h2>Explore Genres</h2>
        <div class="genre-card" onclick="window.location.href='?page=genre_specific&genre=rock'">
            <img src="/public/images/genre_images/rock.jpg" alt="Rock Genre">
            <p>Rock</p>
        </div>
        <div class="genre-card" onclick="window.location.href='?page=genre_specific&genre=rock'">
            <img src="/public/images/genre_images/rock.jpg" alt="Rock Genre">
            <p>Rock</p>
        </div>
        <div class="genre-card" onclick="window.location.href='?page=genre_specific&genre=rock'">
            <img src="/public/images/genre_images/rock.jpg" alt="Rock Genre">
            <p>Rock</p>
        </div>
        <div class="genre-card" onclick="window.location.href='?page=genre_specific&genre=rock'">
            <img src="/public/images/genre_images/rock.jpg" alt="Rock Genre">
            <p>Rock</p>
        </div>
        <!-- Add more genre cards as needed -->
    </div>
</section>


    <section class="home-section">
        <h2>New Releases</h2>
        <div class="new-songs-cards-container">
            <!-- Render new releases song cards here -->
            <!-- Example: SongCard::render($newReleaseSong); -->
        </div>
        <a href="?page=view_more&type=new_releases">See More</a>
    </section>

    <section class="home-section">
        <h2>Recommended Music</h2>
        <div class="recommended-songs-cards-container">
            <!-- Render recommended music song cards here -->
            <!-- Example: SongCard::render($recommendedSong); -->
        </div>
        <a href="?page=view_more&type=recommended_music">See More</a>
    </section>

    <section class="home-section">
        <h2>Popular Artists</h2>
        <div class="popular-artists-cards-container">
            <!-- Render popular artists cards here -->
            <!-- Example: SongCard::render($popularArtist); -->
        </div>
        <a href="?page=view_more&type=popular_artists">See More</a>
    </section>

    <?php if (isset($_SESSION['user_id'])) : ?>
        <section class="home-section">
            <h2>Favorites</h2>
            <div class="favorites-cards-container">
                <!-- Render favorites song cards here -->
                <!-- Example: SongCard::render($favoriteSong); -->
            </div>
            <a href="?page=view_more&type=favorites">See More</a>
        </section>

        <section class="home-section">
            <h2>Playlists</h2>
            <div class="playlist-cards-container">
                <?php if (isset($playlists) && is_array($playlists)) : ?>
                    <?php foreach ($playlists as $playlist) : ?>
                        <?php SongCard::render($playlist); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>No playlists available.</p>
                <?php endif; ?>
            </div>
            <a href="?page=view_more&type=playlists">See More</a>
        </section>
    <?php endif; ?>

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

</html>
