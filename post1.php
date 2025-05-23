<style>

    #k{
      font-weight:600;
      text-decoration: none;
      color:#4169e1;
      border: 2px solid #4169e1;
      border-radius:10px;
      
    }
    #k:hover{
       color:#A9A9A9;
       border: 2px solid #A9A9A9;
    } 
       

</style>



<div id="post">
                           <div>
                                <?php 
                                    $image ="images/user_male.jpg";
                                    if($row_user['gender'] == "Female"){

                                         $image = "images/user_female.jpg";

                                    }
                                    if(file_exists($row_user['profile_image'])){

                                        $image = $image_class->get_thumb_profile($row_user['profile_image']);
                                  }
                                ?>   
                             
                               <img src="<?php echo $image ?>" style="width:50px;border-radius:50px;margin-right:6px;">
                           </div>
                           <div>
                                <div style="font-weight:bold;color:#405d9b;">
                                    <?php 
                                        echo "<a href='profile1.php?id=$row[userid]' style='text-decoration: none;color:black;' >";
                                       echo  htmlspecialchars($row_user['first_name']) . " " . htmlspecialchars($row_user['last_name']);
                                       echo "</a>";
                                       echo "&nbsp";
                                      
                                       if($row['is_profile_image']){

                                        $pronoun = "his";
                                        if($row_user['gender']=="Female"){
                                           $pronoun = "her";
                                        }

                                        echo "<span style='font-weight:normal;color:#aaa;'> updated $pronoun profile image.</span>";
                                       }

                                       if($row['is_cover_image']){

                                        $pronoun = "his";
                                        if($row_user['gender']=="Female"){
                                           $pronoun = "her";
                                        }

                                        echo "<span style='font-weight:normal;color:#aaa;'> updated $pronoun cover image.</span>";
                                       }
                                    
                                    ?>
                                </div>
                                 <?php echo htmlspecialchars($row['post'])?>
                                 <br><br>
                                  <?php
                                         if(file_exists($row['image'])){
                                          $post_image = $image_class->get_thumb_post($row['image']);
                                          echo "<img src='$post_image' style='width:100%;'>";
                                         }
                                         
                                  ?>

                                  <div style="margin-top:3%;">

                                  

                                             

                                             <?php 
                                               $likes = "";
                                               $likes = ($row['likes']>=0) ? $row['likes']: "";
                                              ?> 
                                               
                                            
                                             
                                            
                                            
                                             <?php 
                                                
                                                $comments = "" ;
                                                if($row['comments']>=0){
                                                     $comments = $row['comments'];
                                                }
                                              
                                             ?>
                                            
                                           

                                              
                                             <div style="display:flex;margin-top:1%;font-weight:bold;font-family:Franklin Gothic;">
                                                   <div style='flex:1;'>
                                                            <a onclick="like_post(event)" href="like.php?type=post&id=<?php echo  $row['postid']?> " style="text-decoration:none;color:#466F89;" >
                                                                     <?php echo $likes ?>  &nbsp   &nbsp     <br>
                                                                       Like

                                                                    
                                                            </a> 
                                                   </div>
                                                   <ion-icon src="Like.svg"></ion-icon>
                                                   <div style="flex:1;">
                                                            <a href="single_post.php?id=<?php echo $row['postid']?>"style= "text-decoration:none;color:#466F89;">
                                                                     <?php   echo $comments ?> <br>
                                                                     Comment 
                                                            </a> 
                                                   </div>
                                                                                                                                                                                                                                                                                 
                                            </div>  
                                 <div style="margin-top:3%;">

                                      
                                             <?php

                                                   $timeInstance = new Time();

                                                   // Calling the get_time() method on the instance
                                                  $currentTime = $timeInstance->get_time($row['date']);
                                                   echo  $row['date'];
                                              ?>

                                             </span>

                                             <?php 
                                                if($row['has_image']){
                                                   echo "<a href='image_view.php?id=$row[postid]'>";
                                                    echo ". View Full Image .";
                                                    echo "</a>";
                                                }

                                              ?>  

                                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                             <?php
                                                   $post = new Post();
                                                   if($post->i_own_post($row['postid'],$_SESSION['mybook_userid'])){

                                                   
                                                      echo "<a href='edit.php?id=$row[postid]'style='color: #999;'>
                                                               Edit
                                                               </a> &nbsp&nbsp&nbsp&nbsp&nbsp 
                                                               <a href='delete.php?id=$row[postid]' style='color: #999;'>
                                                               Delete
                                                               </a> ";
                                                   }
                                             ?>

                              </div>  

                                  <?php 
                                     $i_liked = 0;
                                    if(isset($_SESSION['mybook_userid'])){
                                       
                                          $DB = new Database();
                                          //save likes details
                                         
                                          $sql = "select likes from likes  where type='post' && contentid='$row[postid]' limit 1";
                                          $result = $DB->read($sql);

                                          if(is_array($result)){

                                             $likes = json_decode($result[0]['likes'],true);
                                       
                                             $user_ids = $arr = array_column($likes,"userid");

                                             if(in_array($_SESSION['mybook_userid'],$user_ids)){
                                                $i_liked = 1;
                                             }
                                          }  
                                    } 
                                    echo "<a id='info_$row[postid]' href='likes.php?type=post&id=$row[postid]'>";

                                 if($row['likes']>0){

                                   

                                    if($row['likes'] == 1){
                                          if($i_liked ==1){
                                          echo "<span style='float:left;color:grey;'> You liked this post </span>";
                                          }else{
                                          echo "<span style='float:left;color:grey;'> 1 person liked this post </span>";
                                          }
                                    }else{
                                          if($i_liked ==1){
                                             if(($row['likes']-1)==1){
                                                echo "<span style='float:left;color:grey;'>You and " . ($row['likes']-1) . " person liked this post </span>";
                                             }else{
                                                echo "<span style='float:left;color:grey;'>You and " . ($row['likes']-1) . " people liked this post </span>";
                                             }
                                         
                                          }else{
                                             echo "<span style='float:left;color:grey;'> " . $row['likes'] . " people liked this post </span>";
                                          }
                                    }
                                 
                                 }
                                 echo "</a>";
                                  ?>

                                </div>
                                
                           </div>

                       </div>
                            <br><br>

<script type = "text/javascript">
    function ajax_send(data,element){
            
        var ajax = new XMLHttpRequest();
        ajax.addEventListener('readystatechange',function(){
            if(ajax.readyState == 4 && ajax.status == 200){
                response(ajax.responseText,element);
            }
        });
       
        data = JSON.stringify(data);

        ajax.open("post1","ajax.php",true);
        ajax.send(data);

    }  
    function response(result,element){
       if(result != ""){
           
          var obj = JSON.parse(result);
          if(typeof obj.action != 'undefined'){

             if(obj.action == 'like_post'){
                var likes = "";
                likes = (parseInt(obj.likes)>=0) ?  obj.likes+ " &nbsp   &nbsp     " + "<br>Like": "<br>Like";

                element.innerHTML =  likes;

                var info_element = document.getElementById(obj.id);
                info_element.innerHTML = obj.info;
             }

          }
          
       }
     
    } 
    
    function like_post(e){

      e.preventDefault();
      var link = e.target.href;
      
      var data = {};
      data.link = link;
      data.action = "like_post";
      ajax_send(data,e.target);
    }
  
</script>    