<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 05/11/15
 * Time: 14:20
 */
$username = $_POST['username'];
$password = $_POST['password'];

if($username == 'marta' && $password == 'pleszka') {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    header('Location: generateBlackJackGame.php');
} else {
    ?>
    Unsuccesful login. Please try again.
    <br>
    <a href="login.php" style="text-decoration: none; color: #0091B6;
    font-size: 24px">Go
        Back</a>
<?php
}
