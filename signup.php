<?php
    require "header.php"
?>

<main>
    <div class="signup-form">
        <h1>Signup</h1> <br>
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "empty_Fields"){
                echo '<p> Fill in all fields! <p>';
            }
            elseif($_GET['error'] == "invalid_Email_Uid"){
                echo '<p> Fill in username and email! <p>';
            }
            elseif($_GET['error'] == "invalid_Email"){
                echo '<p> Invalid email! <p>';
            }
            elseif($_GET['error'] == "invalid_Uid"){
                echo '<p> Invalid username! <p>';
            }
            elseif($_GET['error'] == "userTaken"){
                echo '<p> Username is taken! <p>';
            }
        }
        else if($_GET['signup'] == "success"){
            echo '<p> Signup Successful! <p>';
        }
        ?>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username"> <br> <br>
            <input type="text" name="mail" placeholder="E-mail"> <br> <br>
            <input type="password" name="pwd" placeholder="Password"> <br> <br>
            <input type="password" name="pwd-repeat" placeholder="Repeat Password"> <br> <br>
            <button type="submit" name="signup-submit">Signup</button> <br> <br>
        </form>
    </div>
</main>

<?php
    require "footer.php"
?>
