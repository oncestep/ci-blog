<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <!-- Custom style for renew-->
    <link href="<?php echo base_url('resource/css/renew.css') ?>" rel="stylesheet">

    <!--Custom style for tag scss-->
    <link href="<?php echo base_url('resource/scss/tag.css') ?>" rel="stylesheet">

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
<header class="intro-header" style="background-image: url(<?php echo base_url('resource/img/home-bg.jpg'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="site-heading">
                    <h1>CI Blog</h1>
                    <span class="subheading">Own your blog in your own way</span>
                </div>
            </div>
        </div>
        <!-- Nav Switch-->
        <div class="tag_container">
            <div class="switch-button">
                <span class="active"></span>
                <button class="switch-button-case left active-case">PRIVATE</button>
                <button class="switch-button-case right">PUBLIC</button>
            </div>
        </div>
        <!--Switch End-->
    </div>
</header>


<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">

            <div id="private">
                <?php foreach ($posts as $key => $value): ?>
                    <div class="post-preview">
                        <a href="<?php echo site_url('/posts/view/' . $value['post_id']) ?>">
                            <h2 class="post-title">
                                <?php echo $value['title'] ?>
                            </h2>
                            <div class="img_limit">
                                <?php
                                echo $value['content'];
                                ?>
                            </div>
                        </a>
                        <p class="post-meta">Posted by <span><?php echo $value['nickname'] ?></span>
                            on <?php echo $value['date_cre'] ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <!-- Pager -->
                <div class="clearfix">
                    <div class="float-right private_link">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>

            <div id="public" class="display_default">
                <?php foreach ($posts_all as $key => $value): ?>
                    <div class="post-preview">
                        <a href="<?php echo site_url('/posts/view/' . $value['post_id']) ?>">
                            <h2 class="post-title">
                                <?php echo $value['title'] ?>
                            </h2>
                            <div class="img_limit">
                                <?php
                                echo $value['content'];
                                ?>
                            </div>
                        </a>
                        <p class="post-meta">Posted by <span><?php echo $value['nickname'] ?></span>
                            on <?php echo $value['date_cre'] ?></p>
                    </div>
                    <hr>
                <?php endforeach; ?>

                <!-- Pager -->
<!--                <div class="clearfix">-->
<!--                    <div class="float-right public_link">-->
<!--                        --><?php //echo $this->pagination->create_links(); ?>
<!--                    </div>-->
<!--                </div>-->


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

<!-- Tag -->
<script src="<?php echo base_url('resource/js/tag.js') ?>"></script>

</body>

</html>
