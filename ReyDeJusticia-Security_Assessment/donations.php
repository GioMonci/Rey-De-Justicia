<?php
    require "header.php"
?>

<main>
    <?php
        if(isset($_SESSION['userId'])){
            echo '<p>You are logged in!</p>';
        }
        else{
            echo '<p>You are logged out!</p>';
        }
    ?>
    <div class="int-main-cont">
        <img src="/img/" alt="">
        <h2>Welcome to Donations Page!</h2>
        <p>If you haven't already, click sign up!</p>
    </div>
</main>

<?php
    require "footer.php"
?>
