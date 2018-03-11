<?php include ('../connect_db.php');
include ('dashboard.php');

if ($_SESSION) {
    $dbContent = $mysqli->query("SELECT * FROM posts ORDER BY id");
    while ($post = mysqli_fetch_array($dbContent)) {
        echo '<h3>' . $post['title'] . '</h3>';
        echo '<p>' . $post['content'] . '</p>';
        echo '<a href="delete_post.php?id=' . $post['id'] . '">' . 'Delete post' . '</a>' . '<br><br>';
    }
} else {
  echo 'You are not login';
}
?>
