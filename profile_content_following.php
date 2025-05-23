<div  style = "min-height:400px;width:80%;background-color:white;margin:auto;">
<div style="margin-top:2%;">
<?php 

   

  $image_class = new Image();
  $post_class=new Post();
  $user_class=new User();
  $following = $user_class->get_following($user_data['userid'],"user");

  if(is_array($following)){
    foreach($following as $follower){
       $friend_row = $user_class->get_user($follower['userid']);
       include("user1.php");
    }
     

  }else{
     echo "<span style ='margin-left:35%;font-size:30px;'>No followings were found!</span>";
  }

?>
</div>
</div>