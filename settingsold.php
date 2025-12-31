<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>FakeBook Settings</title>
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <div class="settings-container">
        <h2 class="settings-title">⚙️ Account Settings</h2>

        <div class="settings-menu">
            <a href="profile picture.php" class="settings-item">
                <i class="fa-solid fa-user"></i>
                <span>Change Profile Picture</span>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="edit_profile.php" class="settings-item">
                <i class="fa-solid fa-lock"></i>
                <span>Change Password</span>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="" class="settings-item">
                <i class="fa-solid fa-palette"></i>
                <span>Change Theme</span>
                <label class="switch">
                    <input type="checkbox" id="themeToggle">
                    <span class="slider"></span>
                </label>
            </a>
        </div>

        <div class="settings-footer">
            <a href="master.php?page=profile" class="btn secondary">← Back to Profile</a>
            <a href="master.php" class="btn primary">🏠 Home</a>
        </div>
    </div>

</body>
<script src="Follow-request.js"></script>
<script>
const toggle = document.getElementById("themeToggle");
const settingsBox = document.querySelector(".settings-container");

toggle.addEventListener("change", function () {
    if (this.checked) {
        settingsBox.classList.add("dark");
    } else {
        settingsBox.classList.remove("dark");
    }
});

</script>


</html>