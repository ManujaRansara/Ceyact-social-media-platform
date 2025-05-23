<div  style = "min-height:400px;width:97%;background-color:white;margin-top:20px;width:80%;margin-left:10%;">

<?php 

  $DB = new Database();
  $sql = "select image,postid from posts where has_image = 1 && userid = $user_data[userid] order by id desc limit 30";
  $images = $DB->read($sql);

  $image_class = new Image();

  if(is_array($images)){
    foreach($images as $image_row){
      echo "<a href='single_post.php?id=$image_row[postid]'>";
      echo "<img src = '".$image_class->get_thumb_post($image_row['image'])."' style='width:200px;margin:20px;'>";
      echo "</a>";
    }
     

  }else{
     echo "<span style ='margin-left:35%;font-size:30px;'>No images were found!</span>";
  }

?>

</div>