<?php require_once ("./admin_includes/header.php"); ?>
 <?php require_once ("./admin_includes/nav.php"); ?>
<body>

    

        <!-- Navigation -->
     

<?php 
  if(isset($_POST['btn_add_post']))
  {
    $Post_Title=$_POST['post_title'];
    $Post_Author=$_POST['post_author'];
    $Post_Cat_id=$_POST['cat_name'];
    $Post_Status=$_POST['post_status'];
    
    /*this does not work*/
    $Post_image=$_FILES['image']['name'];
    $Post_Temp=$_FILES['image']['tmp_name'];
    
    
    $Post_Tags=$_POST['post_tags'];
    $Post_Content=$_POST['post_content'];
    $Post_date=date('Y-m-d');
    $Post_comment=4;

    $sql="insert into posts(post_cat_id,post_title,post_author,post_date,post_img,post_content,post_tags,post_comment_count,post_status) 
    values ('$Post_Autor','$Post_Title','$Post_Cat_id',now(),'$Post_image','$Post_Content','$Post_Tags','$Post_comment','$Post_Status')";
    $result=mysqli_query($con,$sql);
    
  
    if($result)
    {
       echo "Success!!!";
      move_uploaded_file($Post_Temp, "../images/$Post_Image");
     
    }
    else
    {
      echo "Query Failed";
      
      
    }

  }
  ?>
        <div id="page-wrapper">

            

             
               <form action="" method="POST" enctype="mutlipart/form-data">
                 <div class="container-fluid">
                      <label>Post Title</label>
                      <input type="text" name="post_title" placeholders="Post Title" class="form-control mb-2">
                        
                    
                  
                  
                 
                            </div>
                  <select name="cat_name" id="" class="form-control">
                  <?php
                        $sql = "select * from categories";
                        $value = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($value))
                        {
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                  ?>
                        <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
                  <?php
                        }
                  ?>
                  </select>
                   <div class="container-fluid">

             
                      <label>Post Author</label>
                      <input type="text" name="post_author" placeholders="Author" class="form-control mb-2">
                     
              </div>
                 <div class="container-fluid">

             
                      <label>Post Status</label>
                      <input type="text" name="post_status" placeholders="Status" class="form-control mb-2">
                   
                        
              </div>
                 <div class="container-fluid">

             
                      <label>Post Tags</label>
                      <input type="text" name="post_tags" placeholders="Tags" class="form-control mb-2">
                   
                        
              </div>
                   <div class="container-fluid">

             
                      <label>Post Image</label>
                      <input type="file" name="image" class="form-control mb-2">
                   
                        
              </div>
                   <div class="container-fluid">

             
                      <label>Post Content</label>
                      <textarea type="text" name="post_content"  class="form-control"></textarea>
                   
                        
              </div>
                 <button class="btn btn-success" type="submit" name="btn_add_post">Add Post</button>
                    </form>
                  
                  
                 
                            </div>
                        
                                    <!-- /.row -->
                <?php require_once ("./includes/footer.php"); ?>
                          