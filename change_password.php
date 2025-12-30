<?php
session_start();
include("database.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$msg = "";
$user_id = $_SESSION["user_id"];

if (isset($_POST["change_password"])) {
    $old_password = trim($_POST["old_password"]);
    $new_password = trim($_POST["new_password"]);

    // fetch current password
    $sql = $conn->prepare("SELECT password FROM userdata WHERE user_id = ?");
    $sql->bind_param("i", $user_id);
    $sql->execute();
    $result = $sql->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($old_password, $user["password"])) {
        $hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $update = $conn->prepare("UPDATE userdata SET password = ? WHERE user_id = ?");
        $update->bind_param("si", $hashed, $user_id);

        if ($update->execute()) {
            $msg = "Password updated successfully!";
        } else {
            $msg = "Something went wrong!";
        }
    } else {
        $msg = "Old password is incorrect!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Change Password</h2>
<p><?php echo $msg; ?></p>

<form method="post">
    <input type="password" name="old_password" placeholder="Old Password" required><br><br>
    <input type="password" name="new_password" placeholder="New Password" required><br><br>
    <button name="change_password">Update Password</button>
</form>

<br>
<a href="master.php?page=settings" class="">⬅ Back to Settings</a> |
<a href="master.php">🏠 Home</a>

</body>
</html>
