<?php
include 'connection.php';

$blog_id=$_POST['blog_id'];

$img_old=$_POST['img_old'];
$img_new=$_FILES['image']['name'];
if($img_new != '')
{
    $update_img=$_FILES['image']['name'];
}
else
{
    $update_img= $img_old;
}
$title=$_POST['title'];
$image_alt=$_POST['image_alt'];
$slug=strtolower(str_replace(" ","-",$_POST['title']));
$description=$_POST['description']; 
$content=$_POST['content']; 
$read_time=$_POST['read_time'];
$meta_title=$_POST['meta_title'];
$meta_description=$_POST['meta_description'];
$meta_tags=$_POST['meta_tags'];

$query="UPDATE  blogs SET image='$update_img' , image_alt='$image_alt', title='$title', slug='$slug', read_time='$read_time', content='$content', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_tags='$meta_tags' where blog_id='$blog_id'";
$rees=mysqli_query($con,$query);
// die($query);
if ($rees) 
{
    if($_FILES['image']['name']!='')
    {
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$_FILES['image']['name'] );
        unlink("uploads/".$img_old);
    }
    echo "<script>alert('Updated Successfully.'); document.location='blogs.php';</script>";
}
else{
    echo "not done";
}
?>