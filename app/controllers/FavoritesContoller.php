<?php

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Favorite.php");

class FavoritesController {
    
    public static function addToFavorites($userID, $songID) {
        Favorite::addToFavorites($userID, $songID);
        // You may redirect to a specific page or perform other actions after adding to favorites
    }

    public static function removeFromFavorites($favoriteID) {
        Favorite::removeFromFavorites($favoriteID);
        // You may redirect to a specific page or perform other actions after removing from favorites
    }

    public static function getUserFavorites($userID) {
        return Favorite::getUserFavorites($userID);
    }

    // Other functions as required
}

