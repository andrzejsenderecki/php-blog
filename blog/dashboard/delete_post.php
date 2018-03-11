<?php include ('../connect_db.php');

if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
    $dbDeletePost = $mysqli->prepare("DELETE FROM posts WHERE id = ?");
    $dbDeletePost->bind_param("i",$id);
    $dbDeletePost->execute();
    $dbDeletePost->close();
    header("Location: my_post.php");
}
?>
