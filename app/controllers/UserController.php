<?php

require_once("../models/UserModel.php");

class UserController {
    
    // Register a new user
    public function registerUser($username, $email, $password) {
        // Add validation if needed

        // Create a new user instance
        $newUser = UserModel::createNewUser($username, $email, $password);

        // Save the user to the database (you should implement this method in the User model)
        // For now, let's assume there is a saveUser method in the User model
        $newUser->saveUser(); // You need to implement this method in the User model

        // Redirect or perform other actions as needed
        header('Location: ?page=login');
        exit();
    }

    // Login user
    public function loginUser($username, $password) {
        // Find the user in the database based on the username
        $user = UserModel::getUsername($username);

        // Check if the user exists and the password is correct
        if ($user && $user->verifyPassword($password)) {
            // Set session variables to indicate user is logged in
            $_SESSION['user_id'] = $user->getUserID();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['user_type'] = $user->getUserType();

            // Redirect or perform other actions as needed
            header('Location: ?page=home');
            exit();
        } else {
            // Handle login failure (e.g., show an error message)
            echo "Invalid username or password";
        }
    }

    // Logout user
    public function logoutUser() {
        // Destroy the session variables to log the user out
        session_destroy();

        // Redirect or perform other actions as needed
        header('Location: ?page=home');
        exit();
    }

    // Additional methods for user authentication and actions

    // Example method to check if the user is authenticated before allowing access to a page
    public function checkAuthentication() {
        if (!UserModel::isAuthenticated()) {
            // Redirect to the login page or show an access denied message
            header('Location: ?page=login');
            exit();
        }
    }


    // Update user information
    public function updateUser($userID, $username, $email) {
        // Check if the user making the request is the same as the one being updated
        if ($userID !== $_SESSION['user_id']) {
            // Handle unauthorized access (e.g., throw an exception)
            echo "Unauthorized access to update user information.";
            return;
        }

        // Find the user in the database based on the user ID
        $user = UserModel::getUserByID($userID);

        // Check if the user exists
        if ($user) {
            // Update user details
            $user->setUsername($username);
            $user->setEmail($email);

            // Save the updated user to the database
            $user->saveUser(); // You need to implement this method in the User model

            // Redirect or perform other actions as needed
            header('Location: ?page=profile');
            exit();
        } else {
            // Handle user not found (e.g., show an error message)
            echo "User not found.";
        }
    }

    // Fetch user details
    public function getUserDetails($userID) {
        // Check if the user making the request is the same as the one being fetched
        if ($userID !== $_SESSION['user_id']) {
            // Handle unauthorized access (e.g., throw an exception)
            echo "Unauthorized access to fetch user details.";
            return;
        }

        // Find the user in the database based on the user ID
        $user = UserModel::getUserByID($userID);

        // Check if the user exists
        if ($user) {
            // Return user details
            return [
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'user_type' => $user->getUserType(),
                // Add other user details as needed
            ];
        } else {
            // Handle user not found (e.g., show an error message)
            echo "User not found.";
        }
    }

    // Additional user-related methods as needed

    // Example method to fetch user favorites
    public function getUserFavorites($userID) {
        // Implement logic to fetch user favorites (you need to implement this in the User model)
        $favorites = UserModel::getUserFavorites($userID);
        return $favorites;
    }

    // Example method to fetch user playlists
    public function getUserPlaylists($userID) {
        // Implement logic to fetch user playlists (you need to implement this in the User model)
        $playlists = UserModel::getUserPlaylists($userID);
        return $playlists;
    }
}

?>
