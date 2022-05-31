<?php
ob_start();
// include header.php file
include ('headerlogin.php');
?>
<?php 
    /*  include cart items if it is not empty */
    include ('Template/_order-template.php');
    /*  include cart items if it is not empty */

?>
<?php
// include footer.php file
include ('footer.php');
?>