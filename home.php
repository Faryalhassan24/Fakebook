<?php
include("database.php");
?>
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
                        <span class='username'>" . htmlspecialchars($row['username']) . "</span>
                        <small class='post-time'>" . $row['created_at'] . "</small>
                    </div>
                    <p class='post-content'>" . htmlspecialchars($row['content']) . "</p>";

                if ($row['post_image']) {
                    echo "<img src='" . htmlspecialchars($row['post_image']) . "' class='post-media'>";
                }
                if ($row['post_video']) {
                    echo "<video src='" . htmlspecialchars($row['post_video']) . "' controls class='post-media'></video>";
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
        <div class="notify-box">
            <p>No new notifications</p>
        </div>
    </div>
</div>
</div>