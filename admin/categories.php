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
                  
                  <!-- Add category -->
                  <div class="col-lg-6">
                    <?php 
                      if(isset($_POST['btn_category'])){
                        if($_POST['category'] == ""){
                          echo "<p class='alert alert-danger'>Please enter category</p>";
                        }
                        else {
                        $add_cat = $_POST['category'];
                        $query = "insert into categories (cat_title) values ('$add_cat')";
                        $result = mysqli_query($con, $query);
                        }

                      }
                  	?>
                    <!--add a new category -->
                    <form action="" method="POST">
                      <label>Add new Category</label>
                      <input type="text" name="category" placeholders="Category" class="form-control mb-2">
                        <button class="btn btn-success" type="submit" name="btn_category">Add</button>
                    </form>
                  

                    <!--edit a new category -->
<?php
if(isset($_GET['edit'])){
  $Edit_id = $_GET['edit'];
  $query = "select * from categories where cat_id = $Edit_id";
  $result = mysqli_query($con, $query);
$data=mysqli_fetch_assoc($result);
  
  ?>
  <form action="update.php" method="POST" >
    <label>Edit Category</label>
    <input type="text" name="edit_category" placeholders="Category" class="form-control mb-2" value="<?php echo $data['cat_title']; ?>">
    <input type="hidden" name="edit_id" value="<?php echo $data['cat_id']; ?>">
      <button class="btn btn-success" type="submit" name="btn_edit_category">Edit</button>
  </form>
  <?php
}
?>
                	</div>
                  
                  <div class="col-lg-6">
                    
                    <table class="table table-bordered">
                      <tr>
                        
                        <th style="width: 20%">Category ID </th>
                        <th style="widht: 50%">Category Name </th>
                        <th style="widht: 30%" colspan="2">Operations </th>
                      </tr>
                      <tr>
                        <?php 
                        $sql = "select * from categories";
                        $result = mysqli_query($con, $sql);
                        
                          while($row = mysqli_fetch_assoc($result)){
                            
                         ?> 
                        <td><?php echo $row['cat_id'];?></td>
                        <td><?php echo $row['cat_title'];?></td>
                        <td><a href="categories.php?Del=<?php echo $row['cat_id']; ?>" class ="btn btn-danger"><span class="fa-fa-trash"></span></td>
                        <td><a href="categories.php?edit=<?php echo $row['cat_id']; ?>" class ="btn btn-success"><span class="fa-fa-edit"></span></td>
                      </tr>
                      <?php
                      }
                        //delete
                        if(isset($_GET['Del'])){
                         	$Del = $_GET['Del'];
                          $sql = "delete from categories where cat_id='$Del'";
                          $result = mysqli_query($con, $sql);
                          if($result){
                            header("location: categories.php");
                        }
                        }
  
  					?>
                    </table>
                  </div>
              </div>
                </div>
                <!-- /.row -->
				<?php require_once ("./admin_includes/footer.php"); ?>

           