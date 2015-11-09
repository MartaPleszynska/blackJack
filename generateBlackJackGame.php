<?php
include('blackJack.php');
session_start();
if ($_SESSION['username'] == 'marta' && $_SESSION['password'] == 'pleszka') {

    ?>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Black Jack</title>
    </head>
    <body>
    <p>
        Your first random card is <?php echo $firstRandomCardValue; ?>
        of <?php echo
        $firstRandomCardSuit; ?>.
    </p>

    <p>
        Your second random card is <?php echo $secondRandomCardValue; ?>
        of <?php
        echo $secondRandomCardSuit; ?>.
    </p>

    <p>
        <?php echo nl2br($cardMessage); ?>
    </p>

    <p style="font-size: 24px; color: red;">
        <?php echo displayMessage($score); ?>
    </p>
    <br>
    <a href="logout.php" style="text-decoration: none; color: #0091B6;
    font-size: 24px"> Logout</a>

    </body>
    </html>
    <?php
} else {
    ?>
    You must be logged in to play a game.
    <br>
    <a href="login.php" style="text-decoration: none; color: #0091B6;
    font-size: 24px">Login</a>
    <?php
}