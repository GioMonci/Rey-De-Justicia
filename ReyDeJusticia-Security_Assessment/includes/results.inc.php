<?php

//post method to check if they got here legit
if(isset($_POST['result-submit'])){

    require 'dbh.inc.php';
    $conn = mysqli_connect("localhost", "root", "", "church");

    $nameFull = $_POST['name'];
    $userName = $_POST['uid'];
    $id = $_POST['id'];


    $sql = "SELECT nameUsers, ammount, donationDate
            FROM users INNER JOIN donation ON users.idUsers = donation.idUsers
            WHERE users.nameUsers ='$nameFull' and users.uidUsers= '$userName' and users.idUsers = '$id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "Name: ";
            echo $row['nameUsers'];
            echo '<br>';
            echo "Donation amount: ";
            echo $row['ammount'];
            echo '<br>';
            echo "Date: ";
            echo $row['donationDate'];
            echo '<br>';
        }
    }

}
else{
    header("Location: ../troll.php?error=sqlError");
    exit();
}