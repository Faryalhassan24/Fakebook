<?php
include("database.php");

// DELETE POST
if (isset($_GET["delete"])) {
    $pid = $_GET["delete"];
    $sql = $conn->prepare("DELETE FROM posts WHERE id = ? AND user_id = ?");
    $sql->bind_param("ii", $pid, $user_id);
    $sql->execute();
}
?>

<div class="center-bar">
    <img src="images/Default_pfp.jpg" alt="Profile Image">

    <?php
    // Count posts of logged-in user
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM posts WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $postCount = 0;
    if ($row = $result->fetch_assoc()) {
        $postCount = $row['total'];
    }
    ?>

    <div class="post-count">
        <p><?php echo $postCount; ?></p>
        <h4>Post</h4>
    </div>

    <div class="friend-count">
        <p>0</p>
        <h4>Friends</h4>
    </div>
</div>

<h3>Your Posts</h3>
<div class="posts-container">
    <?php
    $myposts = $conn->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY id DESC");
    $myposts->bind_param("i", $user_id);
    $myposts->execute();
    $result = $myposts->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image_html = !empty($row["post_image"]) ? "<img src='{$row["post_image"]}' width='300'>" : "";
            $video_html = !empty($row["post_video"]) ? "<video width='300' controls><source src='{$row["post_video"]}' type='video/mp4'></video>" : "";

            echo "
            <div class='post'>
                <p>" . htmlspecialchars($row["content"]) . "</p>
                $image_html
                $video_html
                <small>" . $row["created_at"] . "</small>

                <div class='post-actions'>
                    <a href='update.php?id=" . $row["id"] . "'><i class='fa-solid fa-pen'></i> Edit Post</a>
                    <span><a href='master.php?page=profile&delete=" . $row["id"] . "'><i class='fa-solid fa-trash'></i> Delete</a></span>
                </div>
            </div>";
        }
    } else {
        echo "<p>No posts yet!</p>";
    }
    ?>
</div>