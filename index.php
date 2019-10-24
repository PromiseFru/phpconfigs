<?php
    require 'header.php'
?>

    <div>
    <?php
        if(isset($_SESSION['username'])){
            echo '<p>You are loged in</p>';
        }else {
             echo '<p>You are loged out</p>';
        }
    ?>
    </div>

<?php
    require 'footer.php'
?>