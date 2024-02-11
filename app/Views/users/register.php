<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MeloHaven</title>
    <link rel="stylesheet" href="/public/css/Register.css">
    <!-- Add your CSS stylesheets here -->
</head>

<body>

    <div class="register-container">
        <h2>Create an Account</h2>

        <!-- Registration Form -->
        <form action="?page=register" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Register</button>
        </form>

        <div class="additional-links">
            <span>Already have an account? <a href="?page=login">Login here</a></span>
        </div>
    </div>

    <!-- Add your additional scripts here -->

</body>

</html>
