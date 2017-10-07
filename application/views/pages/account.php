<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - CI</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('resource/lib/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Additional fonts for this theme -->
    <link href="<?php echo base_url('resource/lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"
          type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>

    <!-- Custom styles for this theme -->
    <link href="<?php echo base_url('resource/css/clean-blog.min.css') ?>" rel="stylesheet">

    <!--Custom style for update and suit-->
    <link href="<?php echo base_url('resource/css/renew.css') ?>" rel="stylesheet">

    <!-- Temporary navbar container fix until Bootstrap 4 is patched -->
    <style>
        .navbar-toggler {
            z-index: 1;
        }

        @media (max-width: 576px) {
            nav > .container {
                width: 100%;
            }
        }
    </style>

</head>

<body>

<!-- Navigation -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand page-scroll" href="http://pro_blog.loc/index.php/posts">CodeIgniter Blog</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://pro_blog.loc/index.php/posts">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://pro_blog.loc/index.php/posts/create">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://pro_blog.loc/index.php/users/show">Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="intro-header" style="background-image: url(<?php echo base_url('resource/img/about-bg.jpg') ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="page-heading">
                    <h1>About Me</h1>
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="row">

    <div class="col-md-4 col-md-offset-4 account_tfont">
        <div style="text-align: center">
            <img src="<?php echo base_url('resource/img/profile.jpg') ?>" alt="Profile"
                 class="img-circle account_profile">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo $details['username'] ?>"
                   disabled="disabled">
        </div>
        <div class="form-group">
            <label>Nickname</label>
            <input type="text" class="form-control" name="nickname" value="<?php echo $details['nickname'] ?>"
                   disabled="disabled">
        </div>
        <div class="form-group">
            <label>Telephone</label>
            <input type="number" class="form-control" name="telephone" value="<?php echo $details['telephone'] ?>"
                   disabled="disabled">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $details['email'] ?>"
                   disabled="disabled">
        </div>
        <div class="form-group">
            <label>Personal Statement</label>
            <textarea type="text" class="form-control limit_resize" name="statement"
                      disabled="disabled"><?php echo $details['statement'] ?></textarea>
        </div>
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">
            Alter
        </button>

        <?php echo form_open('users/logout') ?>
        <button type="submit" class="btn btn-primary btn-block btn_mar" data-toggle="modal">
            Log Out
        </button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Details</h4>
                    </div>

                    <?php echo form_open('users/alter') ?>
                    <div style="text-align: center">
                        <img src="<?php echo base_url('resource/img/profile.jpg') ?>" alt="Profile"
                             class="img-circle account_profile">
                    </div>
                    <div class="form-group account_form">
                        <label>Nickname</label>
                        <input type="text" class="form-control" name="nickname_a"
                               value="<?php echo $details['nickname'] ?>">
                    </div>
                    <div class="form-group account_form">
                        <label>Telephone</label>
                        <input type="number" class="form-control" name="telephone_a"
                               value="<?php echo $details['telephone'] ?>">
                    </div>
                    <div class="form-group account_form">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email_a" value="<?php echo $details['email'] ?>">
                    </div>
                    <div class="form-group account_form">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password_a" placeholder="Password">
                    </div>
                    <div class="form-group account_form">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_a" placeholder="Confirm Password">
                    </div>
                    <div class="form-group account_form">
                        <label>Personal Statement</label>
                        <textarea type="text" class="form-control limit_resize"
                                  name="statement_a"><?php echo $details['statement'] ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; CodeIgniter BLOG 2017</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery Version 3.1.1 -->
<script src="<?php echo base_url('resource/lib/jquery/jquery.js') ?>"></script>

<!-- Tether -->
<script src="<?php echo base_url('resource/lib/tether/tether.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('resource/lib/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- Theme JavaScript -->
<script src="<?php echo base_url('resource/js/clean-blog.min.js') ?>"></script>

</body>

</html>
