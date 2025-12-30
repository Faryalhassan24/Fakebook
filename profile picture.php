<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("database.php"); // database connection file

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$success = "";

if(isset($_POST['uploadBtn'])){
    $file = $_FILES['profile_image'];
    $filename = $file['name'];
    $tmpname = $file['tmp_name'];
    $fileError = $file['error'];

    $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif','jfif'];

    if(in_array($fileExt, $allowed)){
        if($fileError === 0){
            $newName = "images/".uniqid('', true).".".$fileExt;
            move_uploaded_file($tmpname, $newName);

            // update path in database
            $sql = $conn->prepare("UPDATE userdata SET profile_pic=? WHERE user_id=?");
            $sql->bind_param("si", $newName, $user_id);
            if($sql->execute()){
                $success = "Profile picture updated successfully!";
            } else {
                $success = "Database update failed!";
            }
        } else {
            $success = "Error uploading file!";
        }
    } else {
        $success = "Invalid file type! Only jpg, jpeg, png, gif allowed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Profile Picture</title>
</head>
<body>
    <h2>Change Profile Picture</h2>
    <?php if($success) echo "<p>$success</p>"; ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="profile_image" accept="image/*" required>
        <button type="submit" name="uploadBtn">Upload</button>
    </form>
    <br>
    <a href="master.php?page=profile">Back to Profile</a>
</body>
</html>
