
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_style.css">
    <script src="js/admin_script.js"></script>
    <title>Admin Login</title>
</head>

<body>
    <div class="container">
        <form id="form" method="post" action="notifications.php" onsubmit="return login()">
            <h3>Admin login</h3>
            <div>
                <label for="phone">Username:</label>
                <input type="text" name="uname" id="uname" required>
            </div>
            <div>
                <label for="phone">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <button name="submit" type="submit" id="submit">submit</button>
            </div>
        </form>
    </div>
</body>

</html>
