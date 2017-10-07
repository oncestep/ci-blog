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

    <!-- Editor style-->
    <link href="<?php echo base_url('resource/lib/umeditor/themes/default/css/umeditor.min.css') ?>" rel="stylesheet">

    <!-- Renew Design-->
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
                <!--<li class="nav-item">
                    <a class="nav-link page-scroll" href="post.php">Sample Post</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://pro_blog.loc/index.php/users/show">Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="intro-header" style="background-image: url(<?php echo base_url('resource/img/create-bg.jpg') ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="page-heading">
                    <h1>Create New</h1>
                    <hr class="small">
                    <span class="subheading">Design your own blog on your own</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
            <p>Enter the details for a new blog!</p>
            <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
            <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
            <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
            <!--                <form name="sentMessage" id="contactForm" novalidate method="post" accept-charset="utf-8" action="http://pro_blog.loc/index.php/posts/create">-->
            <?php echo form_open('posts/create') ?>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Title" id="title" name="title" required
                           data-validation-required-message="Please enter the title.">
                    <p class="help-block text-danger"></p>
                </div>
            </div>

            <br>
            <br>
            <script class="contain_style" type="text/plain" id="container" name="content">Please Enter Something.
            </script>
            <br>
            <div id="success"></div>
            <div class="form-group float-right">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
            </form>
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

<!-- Contact Form JavaScript -->
<script src="<?php echo base_url('resource/js/jqBootstrapValidation.js') ?>"></script>
<script src="<?php echo base_url('resource/js/contact_me.js') ?>"></script>

<!-- Theme JavaScript -->
<script src="<?php echo base_url('resource/js/clean-blog.min.js') ?>"></script>

<!--UEditor-->
<script type="text/javascript"
        src="<?php echo base_url('resource/lib/umeditor/third-party/template.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resource/lib/umeditor/umeditor.config.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resource/lib/umeditor/umeditor.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resource/lib/umeditor/lang/zh-cn/zh-cn.js') ?>"></script>
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('container');

</script>

</body>

</html>
