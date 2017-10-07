<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Entrance</title>
    <link href="<?php echo base_url('resource/css/login.css')?>" rel="stylesheet">
</head>
<body style="background-image: url(<?php echo base_url('resource/img/background.jpg')?>)">

<div class="container">
    <div class="backbox">
        <div class="loginMsg">
            <div class="textcontent">
                <p class="title">Don't have an account?</p>
                <p>Sign up to save all your graph.</p>
                <button id="switch1">Sign Up</button>
            </div>
        </div>
        <div class="signupMsg visibility">
            <div class="textcontent">
                <p class="title">Have an account?</p>
                <p>Log in to see all your collection.</p>
                <button id="switch2">LOG IN</button>
            </div>
        </div>
    </div>
    <!-- backbox -->

    <div class="frontbox">

        <?php echo form_open('users/login'); ?>
        <div class="login">
            <h2>LOG IN</h2>
            <div class="inputbox">
                <input type="text" name="username_s" placeholder="  USERNAME">
                <input type="password" name="password_s" placeholder="  PASSWORD">
            </div>
            <p>FORGET PASSWORD?</p>
            <button type="submit">LOG IN</button>
        </div>
        </form>

        <?php echo form_open('users/register'); ?>
        <div class="signup hide">
            <h2>SIGN UP</h2>
            <div class="inputbox">
                <input type="text" name="username" placeholder="  USERNAME">
                <input type="text" name="nickname" placeholder="  NICKNAME">
                <input type="text" name="telephone" placeholder="  TELEPHONE">
                <input type="text" name="email" placeholder="  EMAIL">
                <input type="password" name="password" placeholder="  PASSWORD">
                <input type="password" name="confirm" placeholder="  PASSWORD CONFIRM">
            </div>
            <button type="submit">SIGN UP</button>
        </div>
        </form>

    </div>
    <!-- frontbox -->
</div>
<script src="<?php echo base_url('resource/lib/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('resource/js/login.js')?>"></script>

</body>

</html>