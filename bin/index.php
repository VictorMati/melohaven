<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeloHaven</title>
    <link rel="stylesheet" href="/public/css/Index.css">
    <link rel="stylesheet" href="/public/css/SongCard.css">
    <!-- Add more CSS files as needed for specific pages -->

    <link rel="icon" href="/assets/images/default_images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add any additional external stylesheets here -->

    <!-- Add any additional script tags or external script references here -->
</head>

<body>

    <main class="main-layout">
        <div class="sidebar-container">
            <?php include("../melohaven/app/views/components/Sidebar.php"); ?>
        </div>

        <div class="content-container">
            <header>
                <?php include("../melohaven/app/views/components/Header.php"); ?>
            </header>
            <?php
            // Include the main content based on the requested page
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            $allowedPages = ['home', 'search', 'profile', 'login_popup', 'register_popup'];

            if (in_array($page, $allowedPages)) {
                include("pages/" . $page . ".php");
            } else {
                // Handle 404 or redirect to a default page
                include 'pages/404.php';
            }
            ?>
            <footer>
                <?php include("../melohaven/app/views/song/PlayerView.php"); ?>
            </footer>
        </div>
    </main>

    <!-- Add any additional script tags or external script references here -->
</body>

</html>
