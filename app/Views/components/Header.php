<!-- header.php -->
<link rel="stylesheet" href="/public/css/Header.css">

<header>
    <div class="sidebar-toggle">
        <!-- Add your sidebar open/close icon here -->
        <i class="fas fa-bars"></i>
    </div>

    <div class="navigation-links">
        <a href="?page=music">Music</a>
        <a href="?page=movies">Movies</a>
        <a href="?page=games">Games</a>
    </div>

    <div class="search-bar">
        <form action="?page=search" method="GET">
            <input type="text" id="search-input" name="q" placeholder="Search for songs" autocomplete="off">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="user-profile">
        <img src="<?php echo $_SESSION['avatar'] ?? 'path/to/default-avatar.jpg'; ?>" alt="User Avatar">
        <span class="username">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <?php echo $_SESSION['username'] ?? 'Guest'; ?>
                <div class="dropdown-menu">
                    <a href="?page=profile"><i class="fas fa-user"></i> Profile</a>
                    <a href="?page=notifications"><i class="fas fa-bell"></i> Notifications</a>
                    <a href="?page=settings"><i class="fas fa-cog"></i> Settings</a>
                    <a href="?page=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            <?php else : ?>
                <a href="?page=login">Login</a>
                <a href="?page=register">Register</a>
            <?php endif; ?>
        </span>
    </div>

    <!-- Add your JavaScript code for dropdown menu here -->
    <script src="path/to/dropdown.js"></script>
</header>
