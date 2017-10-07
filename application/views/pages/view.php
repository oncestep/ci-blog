<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Clean Blog - Start Bootstrap Theme</title>

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
<header class="intro-header" style="background-image: url('<?php echo base_url("resource/img/view-bg.jpg") ?>')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <div class="post-heading">
                    <h1>CI BLOG</h1>
                    <h2 class="subheading">Show Your Creavity&Mood</h2>
                    <span class="meta">Posted by <a
                                href="<?php echo site_url('/account') ?>"><?php echo $post['nickname'] ?></a></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->


<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                <h2 class="section-heading title_size"><?php echo $post['title'] ?></h2>
                <!--alter start-->
                <!--                --><?php
                //                    if($post['user_id']!=$_SESSION['user_id']){
                //                        echo "<script>document.getElementById('alter_item').setAttribute('display',none);</script>";
                //                    }
                //                ?>
                <?php
                    if($post['user_id'] == $_SESSION['user_id']){
                        ?>
                <div id="alter_item" class="show_inline">
                    <button class="back_op" type="button" data-toggle="modal" data-target="#tag_alter">
                        <img class="img_size" src="<?php echo base_url('resource/img/edit.png') ?>">
                    </button>
                    <button class="back_op" type="button" data-toggle="modal" data-target="#tag_delete">
                        <img class="img_size" src="<?php echo base_url('resource/img/delete.png') ?>">
                    </button>


                    <div class="modal fade" id="tag_alter" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="exampleModalLabel">POST INFO</h4>
                                </div>
                                <?php echo form_open('posts/alter/' . $post['post_id']) ?>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="recipient-name" class="control-label">TITLE</label>
                                        <input type="text" class="form-control" id="recipient-name" name="title"
                                               value="<?php echo $post['title'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                        <label for="message-text" class="control-label">CONTENT</label>
                                        <!--                                        <textarea class="form-control" id="message-text"></textarea>-->
                                        <br>

                                        <script class="umeditor" type="text/plain" id="container" name="content">
                                        </script>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" tabindex="-1" role="dialog" id="tag_delete">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">CONFIRM</h4>
                                </div>
                                <div class="modal-body">
                                    <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        SURE TO DELETE THIS POST?</p>
                                </div>
                                <?php echo form_open('posts/delete/' . $post['post_id']) ?>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>

                <?php
                    } else {
                    }?>

                <!--alter end-->

                <blockquote class="blockquote" style="line-height:40px;"><?php echo $post['content'] ?></blockquote>


                <span class="caption text-muted float-right">Written by <?php echo $post['nickname'] ?>
                    On <?php echo $post['date_cre'] ?></span>


                <br/>
                <hr>
                <br/>
                <h5>Comments</h5>
                <!--                <p>No Comments To Display</p>-->

                <?php
                $order = 0;
                foreach ($comments as $key => $value):
                    $order++;
                    ?>

                    <?php
                        if($value['user_id'] != $_SESSION['user_id']) {
                            ?>

                            <div class="float_block_l">
                            <span class="caption text-muted float-left box_align" id="<?php echo 'item' . $order ?>">
                            <?php echo $order . '.  ' . $value['body'] . ' --' . $value['nickname'];?>
                            </span>
                            </div>

                        <?php } else { ?>

                            <div class="float_block_r">
                            <span class="caption text-muted float-right box_align comment_bri" id="<?php echo 'item' . $order ?>">
                            <?php echo $order . '.  ' . $value['body'] . ' --' . $value['nickname'];?>
                            </span>
                            </div>
                        <?php } ?>
                    <br>
                    <br>
                <?php endforeach; ?>

                <br>
                <br>
                <hr>
                <h5>Show Comment</h5>
                <?php echo form_open('comments/create') ?>
                <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control"
                           value="<?php echo $_SESSION['user_nickname'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Body</label>
                    <textarea name="body" class="form-control text_size"></textarea>
                </div>

                <button id="btn-sub" class="btn btn-primary float-right" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</article>

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

<!--UEditor-->
<script type="text/javascript"
        src="<?php echo base_url('resource/lib/umeditor/third-party/template.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resource/lib/umeditor/umeditor.config.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resource/lib/umeditor/umeditor.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resource/lib/umeditor/lang/zh-cn/zh-cn.js') ?>"></script>
<script type="text/javascript">
    //实例化编辑器
    var um = UM.getEditor('container');
    um.ready(function () {
        um.setContent('<?php echo $post['content']?>');
    });

</script>

</body>

</html>
