<div id="friends">

<?php
  $image ="images/user_male.jpg";
  if($friend_row['gender'] == "Female"){

     $image = "images/user_female.jpg";

   }
   if(file_exists($friend_row['profile_image'])){

    $image = $friend_row['profile_image'];
}
?>   
   
   <a href="profile1.php?id=<?php echo $friend_row['userid'];?>" style="text-decoration: none;color: #405d9b;font-size:15px;font-weight:bolder;">
  <div style="display:flex;width:300px;">
     <div style="flex:0.5">
              <img id="friends_img" src="<?php echo $image ?>">
     </div>

     <div style="flex:0.1">
              
     </div>
          
     <div style="flex:1.5;margin:auto;">
            <?php echo  $friend_row['first_name'] . " " . $friend_row['last_name']  ?>
     </div>
  </div> 
            
  </a>      


        


 </div>