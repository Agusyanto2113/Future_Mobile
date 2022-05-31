<?php
    ob_start();
    // include header.php file
    include ('headerlogin.php');
?>

<?php
    /*  include special price section  */
     include ('Template/_payment.php');
    /*  include special price section  */

?>

<?php
// include footer.php file
include ('footer.php');
?>