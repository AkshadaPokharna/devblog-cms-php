<?php
require("config.php");
$q = $_GET['q'];
$res = $conn->query("SELECT * FROM posts WHERE title LIKE '%$q%'");
while ($row = $res->fetch_assoc()) {
    echo "<h3>{$row['title']}</h3><p>{$row['content']}</p><hr>";
}
?>
<form method="GET">
    <input name="q" placeholder="Search title..." />
    <button type="submit">Search</button>
</form>
