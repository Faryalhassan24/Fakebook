<?php
include("database.php");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];

if (isset($_POST["postBtn"])) {
    $content = trim($_POST["content"]);
    $imagePath = null;
    $videoPath = null;

    if (!empty($_FILES['post_image']['name'])) {

        $imgName = time() . '_' . basename($_FILES['post_image']['name']);
        $imgTmp  = $_FILES['post_image']['tmp_name'];

        $imagePath = "uploads/" . $imgName;
        move_uploaded_file($imgTmp, $imagePath);
    }



    if (!empty($_FILES['post_video']['name'])) {
        $vidName = time() . '_' . basename($_FILES['post_video']['name']);
        $vidTmp  = $_FILES['post_video']['tmp_name'];
        $videoPath = "uploads/" . $vidName;
        move_uploaded_file($vidTmp, $videoPath);
    }

    if ($content != "" || $imagePath || $videoPath) {
        $stmt = $conn->prepare("INSERT INTO posts (user_id, content, post_image, post_video, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("isss", $user_id, $content, $imagePath, $videoPath);
        $stmt->execute();
        header("Location: master.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<body>
    <div class="container">

        <!-- Main Content -->
        <div class="main">
            <!-- Create Post -->
            <div class="post-box">
                <h3>Create a Post</h3>
                <form method="post" enctype="multipart/form-data">
                    <textarea name="content" placeholder="What's on your mind?" rows="4"></textarea>

                    <input type="file" id="imageUpload" name="post_image" accept="image/*" hidden>
                    <label for="imageUpload" class="image-icon"><i class="fa-solid fa-image"></i></label>

                    <input type="file" id="videoUpload" name="post_video" accept="video/*" hidden>
                    <label for="videoUpload" class="video-icon"><i class="fa-solid fa-video"></i></label>

                    <button name="postBtn">Post</button>
                </form>
            </div>

            <!-- All Posts -->
            <h3>All Posts</h3>
            <div class="posts-container">
                <?php
                $all = $conn->query("SELECT posts.*, userdata.username FROM posts 
                                 JOIN userdata ON posts.user_id = userdata.user_id 
                                 ORDER BY posts.id DESC");
                while ($row = $all->fetch_assoc()) {
                    echo "<div class='post'>
                    <div class='post-header'>
                        <span class='username'>" . $row['username'] . "</span>
                        <small class='post-time'>" . $row['created_at'] . "</small>
                    </div>
                    <p class='post-content'>" . $row['content'] . "</p>";

                    if ($row['post_image']) {
                        echo "<img src='" . $row['post_image'] . "' class='post-media'>";
                    }
                    if ($row['post_video']) {
                        echo "<video src='" . $row['post_video'] . "' controls class='post-media'></video>";
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <div class="rightbar">
            <div class="search">
                <input type="text" placeholder="search">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <h3>Trending</h3>
            <div class="trend-box">
                <p># Nature</p>
                <p># Programming</p>
                <p># Photography</p>
            </div>
            <h3>Notifications</h3>
            <div class="notify-box" id="notifyBox">
                <p id="notifyMsg"></p>
            </div>

        </div>
    </div>
</body>
<script src="Follow-request.js"></script>

</html>