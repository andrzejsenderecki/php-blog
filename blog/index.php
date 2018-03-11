<?php include ('connect_db.php');

echo '<a href="dashboard/dashboard.php">' . 'Login' . '</a>' . '<br>';

$dbContent = $mysqli->query("SELECT * FROM posts ORDER BY id");
while ($post = mysqli_fetch_array($dbContent)) {
    echo '<h3>' . $post['title'] . '</h3>';
    echo '<p>' . $post['content'] . '</p>';
}
?>
