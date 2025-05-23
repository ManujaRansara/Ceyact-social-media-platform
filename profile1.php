<?php

  include("classes/autoload.php");


  //isset($_SESSION['mybook_userid']);
  $login = new Login();
  $user_data = $login->check_login($_SESSION['mybook_userid']);

  $USER = $user_data;

  if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $profile = new Profile();
    $profile_data = $profile->get_profile($_GET['id']);
  
    if(is_array($profile_data)){
      $user_data = $profile_data[0];
    }

  }
 
 //print_r($user_data);
    //posting starts here

    if($_SERVER['REQUEST_METHOD'] == "POST"){
       
      
      if(isset($_POST['first_name'])){
          $setttings_class =new Settings();
          $setttings_class->save_settings($_POST,$_SESSION['mybook_userid']);
         
      }else{

     
       $post = new Post();
       $id = $_SESSION['mybook_userid'];
       $result = $post->create_post($id,$_POST,$_FILES);

       if($result == ""){

         header("Location: profile1.php");
         die;

       }

      }
    }

    //collect posts

    $post = new Post();
    $id = $user_data['userid'];

    $posts = $post->get_posts($id);

    //collect friends
     
    $user = new User();
    $id = $user_data['userid'];

    $friends = $user->get_friends($id);
    
    $image_class=new Image();

?>

<html>
  <head>
    <title>Ceyact </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function() {
         // Fade in the div over 3 seconds
         $('#o').fadeIn(1000, function() {
            // After fading in, wait for 9 seconds before fading out
            $(this).delay(2000).fadeOut(1000);
         });
      });
      </script>
  </head>

  <style>
    #blue{
      background-color: rgb(11, 66, 129);
      height:50px;
      color:white;
      padding: 5px;
    }
    #search{
       border-radius: 5px;
       margin-top:2%;
       width:500px;
       height:34px;
       background-image: url(search.png);
       background-repeat: no-repeat;
       background-position: right;
       font-family: tahoma;
       
    }
    #textbox{
       border-radius: 5px;
       width:100%;
       height:34px;
       background-repeat: no-repeat;
       background-position: right;
       font-family: tahoma;
       border: solid thin grey;
       margin:10px;
       
    }
    #a{
      border-radius: 200px;
      width:50px;
      
    }
    #profile{
       border-radius: 300px;
       display:inline;
       border-radius:200px;
      
    }

    #profile_pic{
        width: 200px;
        margin-top:-130px;
        border-radius:500px;
        border-color: white;
        border-width: 50px;
    }

    #p{
      display:inline-block;
      min-width:100px;
      font-size:larger;
      font-weight:bold;
      text-decoration: none;
      color:black;
      text-align:center;
      
    }

     #p:hover{
       color:#005487;
       font-size:30px;
       cursor: pointer;

     }
     #p:active{
      color:black;
      
      text-decoration: none;
       
     }

     #friends_img{
        width:75px;
        float:left;
        margin-top:2%;
     }

     #friends_bar{
        background-color:white;
        min-height:400px;
        margin-top: 5.5%;
        color:rgb(11, 66, 129);
        font-weight:bold;
        
     }

     #friends{
       clear: both;
       margin-left:2%;

       
       
     }

     #posts{
       background-color:white;
       min-height:415px;
       margin-top: 20px;
       margin-left:20px;

     }

     #g{
        width:97%;
        margin:14px;
        height:125px;
        font-size: 16px;
     }

     #u{
      display:inline;
      margin-top:-7%;
      margin-left:80%;
      width:15%;
      height:30px;
       background-color:rgb(11, 66, 129);
        color:white;
       font-weight:bold;
       font-style:tahoma;
       font-size:large;
       border-radius: 20px;

     }

     #u:hover{
        color: rgb(11, 66, 129);
        background-color:white;
        border-color:rgb(11, 66, 129) ;
        border-width: 2px;

        cursor: pointer;
     }
     #u:active{
      background-color:rgb(11, 66, 129);
      color:white;
     }

     #post_bar{
       margin-top:10px;
       background-color:white;
       padding:10px;

     }

     #post{
       
       padding:4px;
       font-size:16px;
       display:flex;
       



     }
     #m{
      
      min-width:20%;
      height:40px;
      font-weight:bold;
      font-size:20px;
      margin:auto;
      background-color:#466F89;
      color:white;
      border-color:#466F89;
      border-radius:5px;
     }
     #m:hover{
      background-color:white;
      color:#466F89;
      
     }

     #m:active{
      background-color:#466F89;
      color:white;
      
     }

     #n:hover{
       color:purple;
     }

    ::placeholder{
       font-size: larger;
       text-align:center;
    }

    @media only screen and (max-width: 768px) {
            #blue {
                flex-direction: column;
                align-items: center;
            }
            #search {
                max-width: 100%;
            }
            #profile_info {
                margin-top: 20px;
            }
            #profile_nav {
                flex-wrap: wrap;
            }
            #profile_nav div {
                width: 50%;
                text-align: center;
            }
            
             
              
            
        }

        @media only screen and (max-width: 480px) {
            #profile_pic {
                width: 100px;
                height: 100px;
                margin-top: -50px;
            }
        }
  </style>
  <body style="font-family:tahoma;background-color:  	 #e9ebee;">
       
      
       <?php include("header.php"); ?>
   

                 <!--covering area-->
     <div style="width: 80%; margin:auto;background-color: black; min-height: 200px;">
        <div style="background-color: white; color: #040810;">
                    <?php       

                      $image="images/placeholder_cover1.png";
                      if(file_exists($user_data['cover_image'])){

                            $image = $image_class->get_thumb_cover($user_data['cover_image']);
                      }

                    ?>
           <img src="<?php echo $image ?>" style="width:100%;">
           &nbsp;&nbsp;
           <span>
                    <?php

                        
                        if($user_data['gender'] == "Female"){

                          $image = "images/user_female.jpg";

                        }else{
                          $image ="images/user_male.jpg";
                        }

                          if(file_exists($user_data['profile_image'])){

                                $image = $image_class->get_thumb_profile($user_data['profile_image']);
                          }
  
                     ?>
               <img id="profile_pic" src="<?php echo $image ?>" style="border-radius: 2500px;border-color:white;margin-top:-10%;">
               
           </span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

           <div style="display:inline-block;text-align:center;font-size:40px;font-style:tahoma;font-weight:bold;">
              <a href="profile1.php?id=<?php echo $user_data['userid']?>" style="text-decoration: none;color:black;">
              <?php  echo htmlspecialchars($user_data['first_name']) . " " .  htmlspecialchars($user_data['last_name'])  ?>
              </a>
              
           </div>

        
            
          <?php

             if($USER['userid'] == $user_data['userid']){
                    echo "<div  style='margin-left: 85%;font-size:13px;color:#466F89;font-weight:bold;dispaly:inline-block;margin-top:-40px;'>
                        <a href='profile_image.php?change=cover' style='text-decoration: none;color:#466F89;'>Change Cover image</a>
                    </div>";

                    echo "<br> <span style='margin-left:3.5%;font-size:13px;color:#466F89;font-weight:bold;'>
                        <a href='profile_image.php?change=profile' style='text-decoration: none;color:#466F89;' >Change Profile Picture</a>
                    </span>";
              }      

           ?>
           <br><br>

           <div style="margin-left:50%;">
                
            
                <?php
                   
                    $myfollowers = $user_data['likes'];
                     if($myfollowers>0){
                      echo "<a href='profile1.php?section=followers&id='$user_data[userid]' style='text-decoration: none;'>";
                      echo   " <span style='color:grey;margin:auto;font-size:22px;'>".$myfollowers." Followers</span>";
                      echo "      </a>";
                    }
                  ?> 

                  <br><br>
                  <a href="like.php?type=user&id=<?php echo $user_data['userid']?>">
                  

                  <input id="m" type="button" value="Follow">
                </a>
      
           </div>
          

           <br><br>
           <div style="display:flex;margin-top:-10px;min-height:6%;">
                  <?php
                   if($user_data['userid']==$_SESSION['mybook_userid']){
                        echo '<div style="flex:1;text-align:center;">
                        <a  href="index.php" style="text-decoration: none;">
                     
                           <span id="p" >Timeline</span>
                        </a>
                        </div>';
                   }               
                   ?>
                   

                   <div style="flex:1;text-align:center;">
                        <a  href="profile1.php?section=about&id=<?php echo $user_data['userid']?>" style="text-decoration: none;">
                        
                        <span id="p">About</span>
                    </a>
                   </div>

                   <div style="flex:1;text-align:center;">
                      <a  href="profile1.php?section=followers&id=<?php echo $user_data['userid']?>" style="text-decoration: none;">
                        
                        <span id="p">Followers</span>
                      </a>
                     </div>

                   <div style="flex:1;text-align:center;">
                      <a  href="profile1.php?section=following&id=<?php echo $user_data['userid']?>" style="text-decoration: none;">
                        
                        <span id="p">Followings</span>
                      </a>
                   </div>

                   <div style="flex:1;text-align:center;">
                       <a  href="profile1.php?section=photos&id=<?php echo $user_data['userid']?>" style="text-decoration: none;">
                    
                          <span id="p">Photos</span>
                      </a>
                   </div>

                   <?php
                   if($user_data['userid']==$_SESSION['mybook_userid']){
                        echo '<div style="flex:1;text-align:center;">                      
                        <a  href="profile1.php?section=settings&id='.$user_data['userid'].'" style="text-decoration: none;">
                        
                        <span id="p">Settings</span>
                        </a>
                      </div>';
                   }               
                   ?>
                    
           </div>  
           
           
        </div>
     </div>
 <!--content-->
   
      <?php
         $section = "default";
         if(isset($_GET['section'])){
            $section=$_GET['section'];
         }

         if($section == "default"){
          include("profile_content_default.php");
         }elseif($section== "photos"){
           include("profile_content_photos.php");
         }elseif($section == "about"){
          include("profile_content_about.php");
         }elseif($section == "settings"){
          include("profile_content_settings.php");
         }elseif($section == "followers"){
          include("profile_content_followers.php");
         }elseif($section == "following"){
          include("profile_content_following.php");
         }else{
           include("profile_content_default.php");
         }

      ?>
       </div>
     
     
      
  </body>
</html>