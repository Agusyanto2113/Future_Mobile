<?php
    ob_start();
    // include header.php file
    include ('header.php');
?>

<?php

    /*  include banner area  */
        include ('DefaultTemplate/_banner-area.php');
    /*  include banner area  */

    /*  include top sale section */
        include ('DefaultTemplate/_top-sale.php');
    /*  include top sale section */

    /*  include special price section  */
         include ('DefaultTemplate/_special-price.php');
    /*  include special price section  */

    /*  include banner ads  */
        include ('DefaultTemplate/_banner-ads.php');
    /*  include banner ads  */

    /*  include new phones section  */
        include ('DefaultTemplate/_new-phones.php');
    /*  include new phones section  */

    /*  include blog area  */
         include ('DefaultTemplate/_blogs.php');
    /*  include blog area  */

?>


<?php
// include footer.php file
include ('footer.php');
?>