<?php
session_start();
include("database.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

// fetch user info
$sql = $conn->prepare("SELECT username, email FROM userdata WHERE user_id = ?");
$sql->bind_param("i", $user_id);
$sql->execute();
$user = $sql->get_result()->fetch_assoc();

// update user info
if (isset($_POST["updateProfile"])) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($password == "") {
        $update = $conn->prepare("UPDATE userdata SET username = ?, email = ? WHERE user_id = ?");
        $update->bind_param("ssi", $username, $email, $user_id);
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $update = $conn->prepare("UPDATE userdata SET username = ?, email = ?, password = ? WHERE user_id = ?");
        $update->bind_param("sssi", $username, $email, $hashed, $user_id);
    }

    if ($update->execute()) {
        header("Location: profile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="edit_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="settings-wrapper">

    <div class="settings-header">
        <h2>Edit Profile</h2>
        <p>Update your account information</p>
    </div>

    <form method="post" class="settings-form">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username"
                   value="<?php echo htmlspecialchars($user['username']); ?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                   value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>

        <div class="form-group">
            <label>New Password <span>(optional)</span></label>
            <input type="password" name="password" placeholder="Leave empty to keep current password">
        </div>

        <button class="save-btn" name="updateProfile">
            <i class="fa-solid fa-floppy-disk"></i> Save Changes
        </button>

    </form>

    <div class="settings-footer">
        <a href="master.php?page=settings" class="btn secondary"><i class="fa-solid fa-gear"></i> Back to Settings</a>
        <a href="master.php" class="btn primary"><i class="fa-solid fa-house"></i> Home</a>
    </div>

</div>

</body>
</html>
