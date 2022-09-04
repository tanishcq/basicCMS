<?php require_once ("./admin_includes/header.php"); ?>

<body>

    

        <!-- Navigation -->
      <?php require_once ("./admin_includes/nav.php"); ?>

<?php 
  if(isset($_GET['p_id']))
  {
    $pid=$_GET['p_id'];
    $sql="select * from posts where post_id='$pid'";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $old=$row['post_img'];
     
                    $pauthor= $row['post_author'];
                    $ptitle= $row['post_title'];
                    $pcatid= $row['post_cat_id'];
                    $pstatus=  $row['post_status']; 
                   $pcontent=$row['post_content'];
      $ptag=$row['post_tags'];
                    $pcomment= $row['post_comment_count'];
                    $pdate=$row['post_date']; 
    }
    if(isset($_POST['btn_edit_post']))
    {
    $Post_Title=$_POST['post_title'];
    $Post_Cat_id=$_POST['cat_name'];
    $Post_Author=$_POST['post_author'];
    $Post_Status=$_POST['post_status'];
    
    /*this does not work*/
    $Post_image=$_FILES['image']['name'];
    $Post_Temp=$_FILES['image']['tmp_name'];
    
    
    $Post_Tags=$_POST['post_tags'];
    $Post_Content=$_POST['post_content'];
    $Post_date=date('Y-m-d');
    $Post_comment=4;

    if(empty($Post_Image))  
    {
      $query = "select * from post_id='$Post_ID'";
      $result = mysqli_query($con, $query);

      while($row = mysqli_fetch_assoc($result))
      {
        $Post_Image = $row['post_img'];
      }
    }

    $sql="UPDATE posts SET post_cat_id='$Post_Cat_id',post_title='$Post_Title',post_author='$Post_Author',post_date='$Post_date',post_img='$Post_image',post_content='$Post_Content',post_tags='$Post_Tags',post_comment_count='$Post_comment',post_status ='$Post_Status' WHERE post_id=$pid";
    $result=mysqli_query($con,$sql);
    
  
    if($result)
    {
       echo "Success!!!";
      move_uploaded_file($Post_Temp, "../images/$Post_Image");
     header("location: ./posts.php");
    }
    else
    {
      echo "Query Failed";
      
      
    }
    }
    else
    {
      echo "Not set";
    }
  }
  ?>
        

            

             
               <form action="" method="POST" enctype="mutlipart/form-data">
                 <div class="container-fluid">
                      <label>Post Title</label>
                     <select name="cat_name" id="" class="form-control" >
            <?php 
  $sql="SELECT * FROM categories;";
                         $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
                          {
                           ?>
              <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_title'];?></option>
              <?php
                          }

                            
  ?>
            </select>
                 </div>
                    <div class="container-fluid">
                 
                      <input type="text" name="post_title" placeholders="Post Title" class="form-control mb-2" value="<?php echo   $ptitle?>">
                        
                    
                  
                  
               
                            </div>
    

             
                     
                   <div class="container-fluid">

             
                      <label>Post Author</label>
                      <input type="text" name="post_author" placeholders="Author" class="form-control mb-2"  value="<?php echo $pauthor  ?>">
                     
              </div>
                 <div class="container-fluid">

             
                      <label>Post Status</label>
                      <input type="text" name="post_status" placeholders="Status" class="form-control mb-2"  value="<?php echo  $pstatus?>">
                   
                        
              </div>
                 <div class="container-fluid">

             
                      <label>Post Tags</label>
                      <input type="text" name="post_tags" placeholders="Tags" class="form-control mb-2"  value="<?php echo   $ptag?>">
                   
                        
              </div>
                   <div class="container-fluid">
<img width="100" height="120"  class="img-responsive" src="../images/<?php echo $old; ?>">
             
                      <label>Post Image</label>
                      <input type="file" name="image" class="form-control mb-2"  >
                   
                        
              </div>
                   <div class="container-fluid">

             
                      <label>Post Content</label>
                      <textarea type="text" name="post_content"  class="form-control"><?php echo   $pcontent?></textarea>
                   
                        
              </div>
                 <button class="btn btn-success" type="submit" name="btn_edit_post">Edit Post</button>
                    </form>
                  
                  
                 
                    
                        
                                    <!-- /.row -->
                <?php require_once ("./includes/footer.php"); ?>
                          