<?php
/**
 * Created by PhpStorm.
 * User: martapleszynska
 * Date: 05/11/15
 * Time: 14:47
 */
session_start();
session_unset();
session_destroy();
header('Location: index.php?pagetitle=login');