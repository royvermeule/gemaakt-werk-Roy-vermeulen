<?php
include('./functions/userRoleSystem.php');
if (! ($userRole == "4") ) {
    session_unset();
    header("Refresh: 0; ./index.php");
}
// choose between 1: super user,    2: warehouse-admin,     3: financial admin,     4: student
?>
<h2>Welkom <?php echo($_SESSION["firstname"])?> <?php echo($_SESSION["lastname"])?></h2>
<h2>User roll = <?php echo ($_SESSION["UserRoll"])?></h2>