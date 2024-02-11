
<?php
// AuthMiddleware.php

class AuthMiddleware {
    public static function checkAuth() {
        // Check if the user is authenticated (you can customize this logic)
        if (!isset($_SESSION['user_id'])) {
            // Redirect to the login page or show an access denied page
            header('Location: ?page=login');
            exit();
        }
    }
}
