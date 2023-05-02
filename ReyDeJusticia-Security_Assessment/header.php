<?php
session_start();
?>

<!DOCTYPE html>
<html lang="sp">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dios te bendiga</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/dbStyle.css">
    </head>
    <body>
        <header class="header-main">
            <div class="header-main-logo">
                <img src="#" alt="logo">
                <nav class="header-main-nav">
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="donations.php">Donations</a></li>
                        <?php
                        if(isset($_SESSION['userId'])){
                            echo'
                            <li><a href="results.php">View Donations</a></li>';
                        }
                        ?>
                    </ul>
                    <div class="header-main-sm">
                        <?php
                            if(isset($_SESSION['userId'])){
                                echo '<form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="logout-submit">Logout</button>
                        </form>';
                            }
                            else{
                                echo '<form action="includes/login.inc.php" method="post"> <!-- use method=post for security -->
                            <input type="text" name="mailuid" placeholder="Username...">
                            <input type="password" name="pwd" placeholder="Password...">
                            <button type="submit" name="login-submit">Login</button>
                        </form>
                        <a href="signup.php">Signup</a>';
                            }
                        ?>
                    </div>
                </nav>
            </div>
        </header>
    </body>
</html>

