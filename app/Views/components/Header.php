<!-- header.php -->
<link rel="stylesheet" href="/public/css/Header.css">

<header>
    <div class="welcome-message">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <p>Welcome, <?php echo $_SESSION['username'] ?? 'Guest'; ?>!</p>
        <?php else : ?>
            <p>Welcome, Guest!</p>
        <?php endif; ?>
    </div>

    <div class="search-bar">
        <form action="?page=search" method="GET">
            <input type="text" id="search-input" name="q" placeholder="Search for songs" autocomplete="off">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="user-actions">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <div class="user-profile">
                <img src="<?php echo $_SESSION['avatar'] ?? 'path/to/default-avatar.jpg'; ?>" alt="User Avatar">
                <a href="?=logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        <?php else : ?>
            <a href="?page=login"> Login</a>
            <a href="?page=register">Register</a>
        <?php endif; ?>
    </div>

    <!-- Add your JavaScript code for login popup here -->
    <script src="path/to/popups.js"></script>
</header>
