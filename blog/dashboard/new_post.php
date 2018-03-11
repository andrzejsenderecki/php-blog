<?php include ('dashboard.php');

if ($_SESSION) {
    echo '<form method="post" action="dashboard.php">';
    echo '<label>' . 'New Post' . '</label>' . '<br>';
    echo '<input type="text" name="title" id="title">' . '<br>';
    echo '<input type="text" name="content" id="content">' . '<br>';
    echo '<input type="submit" class="ui primary button" id="send" name="send" value="Send">' . '</input>';
    echo '</form>';
} else {
    echo 'You are not login';
}
?>
