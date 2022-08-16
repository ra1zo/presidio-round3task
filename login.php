<?php

$is_invalid = false;


require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
                   
    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    

    if ($user) {

        if (password_verify($_POST["password"], $user["password_hash"])) {

            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];
            header("Location: welcome.php");

            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    
    <h1 style="margin: auto; width: 220px;">Login</h1>

    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post" style="margin: auto; width: 220px;">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>

    <p>Don't have an account? <a href="signup.html">Sign up now</a>.</p>
    
</body>
</html>








