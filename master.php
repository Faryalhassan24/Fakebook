<?php
session_start();
include("database.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <?php include("sidebar.php"); ?>

        <!-- Main Content -->
        <div class="main">
            <?php
            $page = $_GET['page'] ?? 'home';

            switch ($page) {
                case 'profile':
                    include("profile.php");  
                    break;
                case 'settings':
                    include("settingsold.php"); 
                    break;
                case 'home':
                default:
                    include("home.php");  
                    break;
            }
            ?>
        </div>

    </div>
</body>
</html>