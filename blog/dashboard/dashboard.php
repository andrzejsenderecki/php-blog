<?php include ('../connect_db.php');

session_start ();

if ($_SESSION) {
  echo '<a href="dashboard.php">' . 'Dashboard' . '</a>' . '<br>';
  echo '<a href="new_post.php">' . 'New post' . '</a>' . '<br>';
  echo '<a href="my_post.php">' . 'My post' . '</a>' . '<br>';
  echo '<a href="logout.php">' . 'Logout' . '</a>' . '<br><br>';
}
elseif ( isset($_POST['login']) ) {
    $dbUser = $mysqli->query("SELECT * FROM user ORDER BY id");
    while ( $user = mysqli_fetch_array($dbUser) ) {
        if ($_POST['username'] == $user['username'] && $_POST['password'] == $user['password'] ) {
            $_SESSION['username'] = $user['username'];
            echo '<a href="new_post.php">' . 'New post' . '</a>' . '<br>';
            echo '<a href="my_post.php">' . 'My post' . '</a>' . '<br>';
            echo '<a href="logout.php">' . 'Logout' . '</a>' . '<br>';
        } else {
            echo 'Bad login data';
        }
    }
} else {
    echo '<form method="post" action="dashboard.php">';
    echo '<label>' . 'Login' . '</label>' . '<br>';
    echo '<input type="text" name="username" id="username">' . '<br>';
    echo '<input type="text" name="password" id="password">' . '<br>';
    echo '<input type="submit" class="ui primary button" id="login" name="login" value="Login">' . '</input>';
    echo '</form>';
}

if ( isset($_POST['send']) ) {
    if ( $_SESSION ) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $dbNewPost = $mysqli->prepare("INSERT posts (title,content) VALUES (?,?)");
        $dbNewPost->bind_param("ss",$title,$content);
        $dbNewPost->execute();
        $dbNewPost->close();
        header("Location: my_post.php");
    } else {
        echo 'You are not login';
    }
}
?>
