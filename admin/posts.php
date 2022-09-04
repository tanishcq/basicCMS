<?php require_once ("./admin_includes/header.php"); ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
      <?php require_once ("./admin_includes/nav.php"); ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Author</small>
                        </h1>
                    </div>
                    <?php
                    if(isset($_GET['opt']))
                    {
                        $opt=$_GET['opt'];
                    }
                    else
                    {
                        $opt='';
                    }
                    switch($opt)
                    {
                        case 'add_post':
                              require_once('admin_includes/add_post.php');
                            break;
                        case 'edit_post':
                            require_once('admin_includes/edit_posts.php');
                        
                        
                            break;
                        
                        default:
                            require_once('admin_includes/view_all_posts.php');
                            break;
                    }
                    
                    ?>
                 
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php require_once ("./includes/footer.php"); ?>
                          