<?php 
include 'connection.php' ;
$blog_id=$_REQUEST['blog_id'];

$sql="DELETE FROM blogs WHERE blog_id = '$blog_id'";
$result=mysqli_query($con, $sql);

if($result)
{
    // unlink("uploads/".$_FILES['image']['name']);
    echo '<script> alert("Blog post deleted successfully."); document.location="blogs.php"</script>';
}
?>

