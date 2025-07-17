<?php
session_start();
require 'config.php';

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION["user"];
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - DevBlog</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="add_post.php">➕ Add Post</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Welcome, <?= htmlspecialchars($user); ?> 👋</h2>
    <p>This is your dashboard. Start creating content or managing your blog!</p>

    <h3 style="margin-top: 30px;">Your Blog Posts</h3>

    <?php if ($result->num_rows === 0): ?>
        <p>No posts yet. <a href="add_post.php">Create one now</a>.</p>
    <?php else: ?>
        <?php while ($post = $result->fetch_assoc()): ?>
            <div class="post-card">
                <h3><?= htmlspecialchars($post['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars(substr($post['content'], 0, 150))) ?>...</p>
                <p class="actions">
                    <a href="edit_post.php?id=<?= $post['id'] ?>">✏️ Edit</a> |
                    <a href="delete_post.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure you want to delete this post?');">🗑️ Delete</a>
                </p>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
</body>
</html>
