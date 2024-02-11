<link rel="stylesheet" href="/public/css/Sidebar.css">

<aside class="sidebar">
    <div class="logo">
        <img src="/public/images/app_images/logo 2.jpg" alt="logo">
        <h2>melohaven</h2>
    </div>

    <nav class="sidebar-navigation">
        <ul>
            <li><a href="?page=home"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="?page=search"><i class="fas fa-search"></i> Genre</a></li>
            <li><a href="?page=profile"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="?page=favorites"><i class="fas fa-heart"></i> Favorites</a></li>
            <li><a href="?page=playlist"><i class="fas fa-list"></i> Playlists</a></li>
            <li><a href="?page=upload"><i class="fas fa-user"></i> Upload</a></li>
            <!-- Add more navigation links as needed -->
        </ul>
    </nav>

    <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="sign">
            <a href="?page=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    <?php else : ?>
        <div class="sign">
            <a href="?page=login"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
    <?php endif; ?>

</aside>
