<table class="table table-bordered">
                    <tr>
                    <td>ID</td>
                    <td>Author</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Status</td>
                    <td>Img</td>
                    <td>Comment</td>
                    <td>Date</td>
                      <td>Delete</td>
                      <td>Edit</td>
                    </tr>
                     <tr>
                      
                   
                    

                       <?php
                       
                       $query="select * from posts";
                       $results=mysqli_query($con,$query);
                       while($row=mysqli_fetch_assoc($results))
                        {
                          $cat_id = $row['post_cat_id'];
                        ?>
                        <td><?php echo $row['post_id']; ?></td>
                    <td><?php echo $row['post_author']; ?></td>
                    <td><?php echo $row['post_title']; ?></td>
                    
                    <?php
                      $query="select * from categories where cat_id = '$cat_id'";
                      $data= mysqli_query($con, $query);
                      while($value = mysqli_fetch_assoc($data))
                      {
                    ?>
                      <td><?php echo $value['cat_title']; ?></td>
                    <?php
                      }
                    ?>

                    <td><?php echo $row['post_status']; ?></td>
                    <td><img width="100" height="50"  class="img-responsive" src="../images/<?php echo $row['post_img']; ?>"></td>
                    <td><?php echo $row['post_comment_count']; ?></td>
                    <td><?php echo $row['post_date']; ?></td>
                       <td><a href="posts.php?del=<?Php echo  $row['post_id'];?>" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
                       <td><a href="posts.php?opt=edit_post&p_id=<?Php echo  $row['post_id'];?>" class="btn btn-success"><span class="fa fa-edit"></span></a></td>
                    </tr>
   
                       
                              <?php
                               
                             
                       }
                       ?>
  
                    </table>
<?php
                       
                        if(isset($_GET['del'])){
                            $Del=$_GET['del'];
                          echo $Del;
                          $sql="DELETE FROM `posts` WHERE post_id='$Del'";
                           $result=mysqli_query($con,$sql);
    
  
    if($result)
    {
       echo "Success!!!";
      move_uploaded_file($Post_Temp, "../images/$Post_Image");
      unlink("../images/$old");
      header("location:posts.php");
     
    }
    else
    {
      echo "Query Failed";
      
      
    }
                         
                        }
                       ?>
                 
                    
                                        
                   
                  