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
			      
            
		   
	    


                
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blogitem">
      <div class="container" data-aos="fade-up">

        <div class="row">
        <?php 
$servername="localhost";
$username="u433191804_crspl_user";
$password="Crspl22satish";
$database="u433191804_crspl";
    
    $con=mysqli_connect($servername, $username, $password, $database);
    if(!$con)
    {
        die("Can't Connect to database". $mysqli_connect_error);
    }

    $blog_id=$_GET['blog'];

    $sql="SELECT * FROM blogs WHERE blog_id = '$blog_id'";
    $result=mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);

    ?>

          <div class="blog-article">
            <article class="col-md-12 blogs-entry">

            <div class="blog-img">
                <img src="uploads/<?php echo $row['image']; ?>" alt="image" class="img-fluid">
              </div>

              <h2 style="color:black;" class="blog-title">
                <a href=""><?php echo $row['title'];?></a>
              </h2>

              <div class="blog-meta">
                <ul style="display:flex;">
                    <li style="margin-left:-30px;" class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="">CRSPL</a></li>
                    <li style="margin-left:30px;" class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><?php echo $row['date'];?></a></li>
                    <li style="margin-left:30px;" class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="">0 Comments</a></li>
                </ul>
              </div>

              <div class="blog-content">
                <p><?php echo $row['content'];?></p>
                <p><?php echo $row['ex_content'];?></p>
                
              </div>
            </article>
          </div>
    

        </div>

      </div>

                    
                    
    </section><!-- End Blog Single Section -->
    <br><br>
<div><a style="border:1px solid #ff6d32;border-radius: 5px;padding:5px 15px;" href="blogs.php"> Back..</a></div>
              </div><!--//container-fluid-->
	            </div><!--//app-content-->
			    </div><!--//row-->
			    
                </div><!--//container-fluid-->
            </div><!--//app-content-->
            
            
        </div><!--//app-wrapper--> 
    
    
    <?php include 'pfooter.php'?>;