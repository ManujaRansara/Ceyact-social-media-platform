       <!--content-->
       <div style="display:flex;width:80%;margin:auto;">

<!--friends-->
<div style=" min-height:400px;flex:1;" id="e">

      <div id="friends_bar">
            <div style="color:black;font-weight:bolder;margin-left:40%;">
              Friends
            </div>
            
             <br>

             <?php 
            if($friends){

               foreach($friends as $friend_row){
          
                include("user1.php"); 
               }

            }
          
            ?>
 
      </div>

</div>

<!--post area-->
<div style='flex:2.5;'>
<div id='posts'>
<?php
   
if($USER['userid'] == $user_data['userid']){
      
        if($_SERVER['REQUEST_METHOD'] == "POST"){
          
          

          $post = new Post();
          $id = $_SESSION['mybook_userid'];
          $result = $post->create_post($id,$_POST,$_FILES);

          if($result == ""){

            header("Location: profile1.php");
            die;

          }else{
            echo "<div id='o' style='font-size:15px;width:60%;font-weight:bold;color:red;
            margin-top:10%;background-color:rgba(255, 0, 0, 0.1);display:none;margin:auto;text-align:center;>'";
            echo "<br>ERRORs:<br>";
            echo $result;
            echo "</div>";
          }


      }
  
   
    
      
    
      echo"

      

      <form method='post' enctype='multipart/form-data'>

        <textarea name='post' id='g' style='height:200px;' placeholder=' what is in your mind?'></textarea>
        <input type='file' name='file' style='margin-left:6%;margin-top:-7%;'>
           
           <button  id='u'>post</button>

      </form>";         
 }  

?>   

        <!--others posts-->

     <div id="post_bar">
            <?php 
            
            if($posts){

               foreach($posts as $row){
                 
                $user = new User();
                $row_user =  $user->get_user($row['userid']);
                                                
                 include("post1.php"); 
                
               }

            }
          
            ?>
     </div>


  </div>
  
  </div>