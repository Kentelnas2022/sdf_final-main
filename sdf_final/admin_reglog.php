<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_reglog.css">
</head>
<body>
<div class="hero">  
        <div class="form-box">
        <form action="admin_action.php" method="POST" id="login" class="input-group">
                <input type="text" class="input-field" placeholder="Username" name="username">
                <input type="password" class="input-field" placeholder="Enter Password" name="password">
                <button type="submit" class="submit-btn" value="Login">Login</button>
                <p class="message">Not an Admin? <a href="reglog.php">Click here to go back</a></p>
            </form>
    </div>
</body>
</html>
