<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MeloHaven</title>
    <link rel="stylesheet" href="/public//css/Login.css">
    <!-- Add your CSS stylesheets here -->
</head>

<body>

    <div class="login-container">
        <h2>Login to MeloHaven</h2>

        <!-- Login Form -->
        <form action="?page=process_login" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <div class="additional-links">
            <a href="?page=forgot_password">Forgot Password?</a>
            <span>|</span>
            <a href="?page=register">Don't have an account? Sign up here</a>
        </div>
    </div>

    <!-- Add your additional scripts here -->

</body>

</html>
