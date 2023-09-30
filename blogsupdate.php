<?php include 'pheader.php' ; 
 include 'connection.php';

// header('Location:student.php');

?> 
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row">




<?php include 'connection.php';
  
$blog_id=$_GET['blog_id'];
$query="SELECT * FROM blogs where blog_id='$blog_id'";
$ress=mysqli_query($con,$query);
while ($row=mysqli_fetch_assoc($ress)) 
{

?>
    <form action="blogsupdatequery.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="blog_id" value="<?php echo $row['blog_id']; ?>">
        <div class="row">
            <div class="col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Image</label>
                 <input type="file" name="image" class="form-control" accept=".jpg, .jpeg , .png" id="exampleInputPassword1">
                
                  <input type="hidden" name="img_old" value="<?php echo $row['image']; ?>" alt="img">
                  <img src="<?php echo "uploads/" . $row['image'];?>" alt="" style="height: 120px; width: 250px;">
            </div>
            <div class="col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Image Alt</label>
                 <input type="text" name="image_alt" class="form-control" id="exampleInputPassword1" value="<?php echo $row['image_alt']; ?>">
            </div>
            <div class="col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Blog reading time in minutes(Like: 1, 2, 3, 4...)</label>
                 <input  type="text" name="read_time" class="form-control" id="exampleInputPassword1" value="<?php echo $row['read_time']; ?>">
            </div>
            
        </div> 
        <div class="row"> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tatle</label>
                <input type="name" name="title" class="form-control" id="exampleInputEmail1"
                    value="<?php echo $row['title']; ?>" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Blog Description</label> 
                <textarea style="height:8vh;" name="description" class="form-control" value="<?php echo $row['description']; ?>"><?php echo $row['description']; ?></textarea>
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Blog All Content</label>
                <textarea name="content" cols="10" rows="80" class="ckeditor" ><?php echo $row['content']; ?></textarea>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Meta Title</label>
                    <input type="name" name="meta_title" class="form-control" id="exampleInputEmail1" value="<?php echo $row['meta_title']; ?>"  aria-describedby="emailHelp">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Meta Tags</label>
                    <input type="name" name="meta_tags" class="form-control" id="exampleInputEmail1" value="<?php echo $row['meta_tags']; ?>" aria-describedby="emailHelp">
                </div>
            </div> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label> 
                <textarea style="height:8vh;" name="meta_description" class="form-control" id="exampleInputEmail1" value="<?php echo $row['meta_description']; ?>"><?php echo $row['meta_description']; ?></textarea>
            </div>
        </div>


        <button type="submit" class="btn btn-primary mt-4">Update</button>
    </form>
</div>
<?php }
?>

                   </div><!--//row-->
			    
                </div><!--//container-fluid-->
            </div><!--//app-content-->
            
            
        </div><!--//app-wrapper--> 
               
<script>
    CKEDITOR.replace('content');
</script>

    <?php include 'pfooter.php'?>;