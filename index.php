
<!-- Header -->
<?php require_once "includes/header.php"; ?>
    <!-- Navigation -->
<?php require_once "includes/nav.php"; ?>
    

    <!-- Page Content -->
    <div class="container">
      

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <?php
                $query = "select * from posts where post_status = 'published'";
                $data = mysqli_query($con, $query);
                $post_status = "";
                while($row = mysqli_fetch_assoc($data))
                {
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_img = $row['post_img'];
                  $post_content = $row['post_content'];
                  $post_tags = $row['post_tags'];
                  $post_status = $row['post_status'];
            
          ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_img; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

               
                <hr>

           
          <?php
          	    }
            if($post_status !== 'published')
            {
                echo '<div class="alert alert-danger">Posts not found.</div>';
            }
            
           ?>
           </div>

            <!-- Sidebar -->
          <?php require_once "includes/side_bar.php"; ?>
          

        <hr>

        <!-- Footer -->
        <?php require_once "includes/footer.php"; ?>

  