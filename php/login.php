<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Paul Vlahos / pvlahos1</title>

        <!-- Main Page CSS / Custom CSS -->
        <link rel="stylesheet" href="css/shop-homepage.css" rel="stylesheet">

        <link rel="stylesheet" href="css/p2css.css" rel="stylesheet">
    
        <!-- Popper JS -->
        <script src="https://unpkg.com/popper.js"></script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

        <!-- Ajax -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!-- FontAwesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
</html>

<?php
session_start();
include_once 'db.php';

//Information being submitted
$loginEmail = $_POST["loginEmail"];
$loginPassword = $_POST["loginPassword"];

$message = "";
if (count($_POST) > 0) {
    $sql = "SELECT * FROM USERS WHERE EMAIL=('$loginEmail') AND PASSWORD=('$loginPassword')";
    $result = $conn->query($sql);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "Not Authenticated";
    } else {
        $_SESSION['user'] = $user['ID'];
        //header('HTTP/1.0 404 Not Found');
        header('Location: http://codd.cs.gsu.edu/~pvlahos1/Project2.php');
        echo "<script type='text/javascript'> $(document).ready(function(){ $('#myModal').modal('show');});</script>";
    }
}
?>