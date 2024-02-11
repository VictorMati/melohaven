<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="/public/css/Profile.css">
    <!-- Add other stylesheet links here -->
</head>

<body>
    <main>
        <section class="profile-container">
            <?php
            // Assuming you have a $user variable containing user details
            ?>
            <div class="user-info">
                <h2>User Profile</h2>
                <p>Username: <?php echo $user['username']; ?></p>
                <p>Email: <?php echo $user['email']; ?></p>
                <!-- Add other user details as needed -->
            </div>

            <div class="edit-profile">
                <h3>Edit Profile</h3>
                <!-- Form for editing user details -->
                <form action="?page=update_profile" method="post">
                    <!-- Add input fields for editing user details -->
                    <button type="submit">Save Changes</button>
                </form>
            </div>
        </section>

        <section class="favorites-container">
            <h2>Favorites</h2>
            <?php
            // Assuming you have a $favoriteSongs variable containing user's favorite songs
            // Loop through and display each favorite song using the SongCard component
            foreach ($favoriteSongs as $favoriteSong) {
                SongCard::render($favoriteSong);
            }
            ?>
            <a href="?page=favorites">See More</a>
        </section>

        <section class="playlists-container">
            <h2>Playlists</h2>
            <?php
            // Assuming you have a $userPlaylists variable containing user's playlists
            // Loop through and display each playlist
            foreach ($userPlaylists as $playlist) {
                // Display playlist information
                echo '<div class="playlist">';
                echo '<h3>' . $playlist['PlaylistName'] . '</h3>';
                // Add more playlist details if needed
                echo '<a href="?page=playlist&id=' . $playlist['PlaylistID'] . '">View Playlist</a>';
                echo '</div>';
            }
            ?>
            <a href="?page=view_playlists">See More</a>
        </section>

        <section class="downloads-container">
            <h2>Downloads</h2>
            <a href="?page=downloads">See Downloads</a>
        </section>

        <section class="uploads-container">
            <h2>Uploads</h2>
            <a href="?page=uploads">See Uploads</a>
        </section>
    </main>

    <!-- Add any additional script tags or external script references here -->

</body>

</html>
