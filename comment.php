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



<div id="post" style="background-color:#eee;">
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
                                        echo "<a href='profile1.php?id=$comment[userid]' style='text-decoration: none;color:black;' >";
                                        echo  htmlspecialchars($row_user['first_name']) . " " . htmlspecialchars($row_user['last_name']);
                                        echo "</a>";
                                        echo "&nbsp";
                                      
                                       if($comment['is_profile_image']){

                                        $pronoun = "his";
                                        if($row_user['gender']=="Female"){
                                           $pronoun = "her";
                                        }

                                        echo "<span style='font-weight:normal;color:#aaa;'> updated $pronoun profile image.</span>";
                                       }

                                       if($comment['is_cover_image']){

                                        $pronoun = "his";
                                        if($row_user['gender']=="Female"){
                                           $pronoun = "her";
                                        }

                                        echo "<span style='font-weight:normal;color:#aaa;'> updated $pronoun cover image.</span>";
                                       }
                                    
                                    ?>
                                </div>
                                 <?php echo htmlspecialchars($comment['post'])?>
                                 <br><br>
                                  <?php
                                         if(file_exists($comment['image'])){
                                          $post_image = $image_class->get_thumb_post($comment['image']);
                                          echo "<img src='$post_image' style='width:100%;'>";
                                         }
                                         
                                  ?>

                                  <div style="margin-top:3%;">

                                  

                                             <div style="display:inline-block;">

                                             <?php 
                                               $likes = "";
                                               $likes = ($comment['likes']>0) ? $comment['likes']: "";
                                              ?> 
   
                                                
                                             <div style="display:flex;margin-top:1%;font-weight:bold;font-family:Franklin Gothic;">
                                                   <div style='flex:1;'>
                                                            <a onclick="like_post(event)" href="like.php?type=post&id=<?php echo  $comment['postid']?> " style="text-decoration:none;color:#466F89;" >
                                                                     <?php echo $likes ?>  &nbsp   &nbsp     <br>
                                                                       Like

                                                                    
                                                            </a> 
                                                   </div>
                                                   <ion-icon src="Like.svg"></ion-icon>
                                                   
                                                                                                                                                                                                                                                                                 
                                            </div>  
                                             
                                   
                                 </div>  
                                 <div style="margin-top:3%;">

                                      
                                             <?php echo $comment['date'] ?>

                                             </span>

                                             <?php 
                                                if($comment['has_image']){
                                                   echo "<a href='image_view.php?id=$comment[postid]'>";
                                                    echo ". View Full Image .";
                                                    echo "</a>";
                                                }

                                              ?>  

                                             &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                             <?php
                                                   $post = new Post();
                                                   if($post->i_own_post($comment['postid'],$_SESSION['mybook_userid'])){

                                                   
                                                      echo "<a href='edit.php?id=$comment[postid]'style='color: #999;'>
                                                               Edit
                                                               </a> &nbsp&nbsp&nbsp&nbsp&nbsp 
                                                               <a href='delete.php?id=$comment[postid]' style='color: #999;'>
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
                                         
                                          $sql = "select likes from likes  where type='post' && contentid='$comment[postid]' limit 1";
                                          $result = $DB->read($sql);

                                          if(is_array($result)){

                                             $likes = json_decode($result[0]['likes'],true);
                                       
                                             $user_ids = $arr = array_column($likes,"userid");

                                             if(in_array($_SESSION['mybook_userid'],$user_ids)){
                                                $i_liked = 1;
                                             }
                                          }  
                                    } 
                                    echo "<a id='info_$comment[postid]' href='likes.php?type=post&id=$comment[postid]'>";

                                 if($comment['likes']>0){

                                   

                                    if($comment['likes'] == 1){
                                          if($i_liked ==1){
                                          echo "<span style='float:left;color:grey;'> You liked this post </span>";
                                          }else{
                                          echo "<span style='float:left;color:grey;'> 1 person liked this post </span>";
                                          }
                                    }else{
                                          if($i_liked ==1){
                                             if(($comment['likes']-1)==1){
                                                echo "<span style='float:left;color:grey;'>You and " . ($comment['likes']-1) . " person liked this post </span>";
                                             }else{
                                                echo "<span style='float:left;color:grey;'>You and " . ($comment['likes']-1) . " people liked this post </span>";
                                             }
                                         
                                          }else{
                                             echo "<span style='float:left;color:grey;'> " . $comment['likes'] . " people liked this post </span>";
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