<?php 
	session_start();
	if(!isset($_SESSION['email'])){
	header("location:login.php");
	// echo $_SESSION['email'];
	exit();
 }
 
include 'pheader.php';?>


    <div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">			    
			    <h1 class="app-page-title">New Blog</h1>    
            
		    </div><!--//container-fluid-->
	</div><!--//app-content-->
	    
	    <div style="transform: translateY(-60px);" class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="row">
                <?php include 'connection.php';

if(isset($_POST['insert']))
{

    $image=$_FILES['image']['name'];
    $title=$_POST['title'];
    $read_time=$_POST['read_time'];
    $image_alt=$_POST['image_alt'];
    $slug=strtolower(str_replace(" ","-",$_POST['title']));
    $description=$_POST['description'];
    $content=$_POST['content']; 
    $current_date=$_POST['current_date'];
    $meta_title=$_POST['meta_title'];
    $meta_description=$_POST['meta_description'];
    $meta_tags=$_POST['meta_tags'];
    
    $query="INSERT INTO `blogs`(`image`, `title`,  `slug`, `read_time`, `image_alt`,  `content`, `description`, `current_date`, `meta_title`, `meta_description`, `meta_tags`) VALUES ('$image', '$title', '$slug', '$read_time', '$image_alt', '$content', '$description', '$current_date', '$meta_title', '$meta_description', '$meta_tags')";
    
    // echo "<pre>"; print_r($query); exit;
    $result=mysqli_query($con,$query);
    
    // die($result);
    
    if($result)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'. $image);
        echo "<script> alert('blog posted successfully.'); document.location='blogs.php';</script>";
    }
    else
    {
        
        echo("not entered");
    }
    
}
?>

<body>

    <!-- navbar ends -->
    <div class="container mt-3">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Image</label>
                 <input height="20%" style="margin-top:10px 5px;" type="file" name="image" class="form-control" accept=".jpg, .jpeg , .png" id="exampleInputPassword1">
                </div>
                <div class="col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Image Alt</label>
                 <input height="20%" style="margin-top:10px 5px;" type="text" name="image_alt" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="col-md-4">
                 <label for="exampleInputPassword1" class="form-label">Blog reading time in minutes(Like: 1, 2, 3, 4...)</label>
                 <input height="20%" style="margin-top:10px 5px;" type="text" name="read_time" class="form-control" id="exampleInputPassword1">
                </div>
                
            </div>  
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Blog Title</label>
                <input type="name" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Blog Description</label>
                <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" style="height:8vh;"></textarea>
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Blog All Content</label>
                <textarea name="content" cols="10" rows="80" class="ckeditor" id="exampleInputEmail1"></textarea>
            </div> 
            <h4 class="mt-5">Meta Types</h4>
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Meta Title</label>
                    <input type="name" name="meta_title" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                </div>
                <div class="col-md-6">
                    <label for="exampleInputEmail1" class="form-label">Meta Tags</label>
                    <input type="name" name="meta_tags" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                </div>
            </div>
            <div class="mb-2">
                <label for="exampleInputEmail1" class="form-label">Meta Description</label>
                <textarea type="name" name="meta_description" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" style="height:8vh;"></textarea>
                    <input type="text" name="current_date" value="<?php echo date('d M Y', strtotime($Date .'+0days'));?>" style="display:none;">
            </div>

            <button type="submit" class="btn btn-primary" name="insert">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Uploaded Blogs Details</h2>
        <hr>
        <table class="table">
            <thead>


                <tr>
                    <th scope="col">S. No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">View Blog</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Speak</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <?php 
    include 'connection.php';
    $query="SELECT * FROM blogs ";
    $result=mysqli_query($con,$query);
    $blog_id=0;
    while($row=mysqli_fetch_array($result))
    {
      $blog_id=$blog_id+1;
    ?>
            <tbody>

                <tr>
                    <th scope="row"><?php echo $blog_id; ?></th>
                    <td>
                    <img src="uploads/<?php echo $row['image']; ?>" height="50px;" width="80px" >
                    
                    </td>
                    <td style="font-size:12px;"><?php echo $row['title'];?></td>
                    <td style="font-size:12px;"><a href="view_blog?blog=<?=$row['blog_id'] ?>">View Blog</a></td>
                    <td><a href="blogsupdate?blog_id=<?= $row['blog_id'];?>"><i style="font-size: 20px;" class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                    
                    <td><a href="text-read?blog_id=<?= $row['blog_id'];?>"><i style="font-size: 20px;" class="fa fa-volume-up" aria-hidden="true"></i></a></td>
                    
                    <td>
                         <a onclick="return confirm('Are You Sure ...?')" href="blogsdelete?blog_id=<?= $row['blog_id'];?>"><i style="font-size: 20px;"
                        class="fa fa-trash" aria-hidden="true"></i></a>
                    </td> 
                    
                    <?php } 
    ?>




            </tbody>
        </table>
    </div>

			    </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	    
    </div><!--//app-wrapper--> 
    
<script>
    CKEDITOR.replace('content');
</script>
<?php include 'pfooter.php'?>;