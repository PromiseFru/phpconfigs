<?php
    require 'header.php'
?>

<div>

    <form action='includes/login.inc.php' method='POST' class='col-md-5 mx-auto mt-5'>
        <?php
            require 'includes/login_flashalerts.inc.php'
        ?>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class='form-control' id="inputEmail4" placeholder="Email or Username" name='email_or_username'>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name='pwd'>
            </div>
        </div>
        <button name='login-btn' type="submit" class="btn btn-primary">Login</button>
    </form>

</div>

<?php
    require 'footer.php'
?>