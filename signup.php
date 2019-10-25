<?php
    require 'header.php'
?>

<div>

    <form action='includes/signup.inc.php' method='POST' class='col-md-5 mx-auto mt-5'>
        <?php
            require 'includes/signup_flashalerts.inc.php'
        ?>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class='form-control' id="inputEmail4" placeholder="Email" name='email'>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name='pwd'>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Username</label>
            <input type="text" class="form-control" id="inputAddress" name='username'>
        </div>
        <button name='signup-btn' type="submit" class="btn btn-primary">Sign Up</button>
    </form>

</div>

<?php
    require 'footer.php'
?>