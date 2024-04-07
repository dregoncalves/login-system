<?php
$con = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($con, 'sistema_login');

if (!$con || !$db) {
    echo mysqli_error($con);
}
?>