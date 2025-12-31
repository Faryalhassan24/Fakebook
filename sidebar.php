<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
    <div class="part1">
        <h2><?php echo htmlspecialchars($username); ?></h2>
        <hr>
        <a class="side-link" href="master.php?page=home"><i class="fa-solid fa-house"></i> Home</a>
        <a class="side-link" href="master.php?page=profile"><i class="fa-regular fa-circle-user"></i> Profile</a>
        <a class="side-link" href="master.php?page=settings"><i class="fa-solid fa-gear"></i> Settings</a>
        <hr>
    </div>

    <div class="part2">
        <div class="top-text">
            <h3>People You May Follow</h3>
            <h5>suggest</h5>
        </div>
        <div class="follow-content">
            <?php
            $stmt = $conn->prepare("SELECT * FROM userdata WHERE user_id != ?");
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $users = $stmt->get_result();

if ($users->num_rows > 0) {
    while ($row = $users->fetch_assoc()) {
        echo "<div class='follow-user'>";
        echo "<span>" .$row['username'] . "</span>";
        echo " <button class='follow-button' data-username='" .$row['username'] . "'>Follow</button>";
        echo "</div>";
    }
} else {
    echo "<p>No users to suggest.</p>";
}
?>

        </div>
         <hr>
        <a class="side-link" href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
    </div>
</div>

</body>

</html>