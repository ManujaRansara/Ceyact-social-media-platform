<?php

include("classes/autoload.php");

//isset($_SESSION['mybook_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['mybook_userid']);

$USER = $user_data;
$image_class=new Image();

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

   }else{
    echo "<div id='o' style='font-size:15px;width:60%;font-weight:bold;color:red;
    margin-top:10%;background-color:rgba(255, 0, 0, 0.1);display:none;margin:auto;text-align:center;>'";
    echo "<br>ERRORs:<br>";
    echo $result;
    echo "</div>";
   }

  }
}



 

?>


<html>
  <head>
    <title>Ceyact</title>
  </head>

  <style>
    #blue{
      background-color: rgb(50, 100, 120);
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
    #a{
      border-radius: 200px;
      width:50px;
      float: right;
      margin:6px;
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

     #p:hover{
       background-color: rgb(163, 163, 163);
       color:black;
       cursor: pointer;

     }
     #p:active{
       background-color: white;
       color: rgb(11, 66, 129);
     }

     #friends_img{
        width:75px;
        float:left;
        margin:8px;
     }

     #friends_bar{
       
        min-height:400px;
        margin-top: 10px;
        color:rgb(11, 66, 129);
        font-weight:bold;       
        text-align:center;
        font-size:30px;
        color:black;
     }

     #friends{
       clear: both;
       
       
     }

     #posts{
       background-color:white;
       min-height:415px;
       margin-top: 20px;
       margin-left:20px;

     }

     #g{
        width:800px;
        margin:14px;
        height:125px;
        font-size: 16px;
     }

     #u{
      display:inline;
      margin-top:-50px;
      margin-left:650px;
      width:140px;
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
       margin-top:20px;
       background-color:white;
       padding:10px;

     }

     #post{
       
       padding:4px;
       font-size:16px;
       display:flex;


     }

     #profile_pic{
         margin-top:50px;
     }

    ::placeholder{
       font-size: larger;
       text-align:center;
    }
  </style>
  <body style="font-family:tahoma;background-color: #e9ebee">
      

                 <!--top blue bar-->
                 <?php include("header.php"); ?>
              <br>

    
       <!--content-->
       <div style="display:flex;">

              <!--friends-->
              <div style=" min-height:400px;flex:1.5;">

                    <div id="friends_bar">

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
                        
                    <img src="<?php echo  $image?>" id="profile_pic"> <br>
                       <a href="profile1.php" style="text-decoration: none;">
                          <span style="color:Black;font-weight:bold;font-family:tahoma;">
                             
                          <?php echo htmlspecialchars($user_data['first_name']) . " " . htmlspecialchars($user_data['last_name']) ?>
                          </span>
                          

                       </a>

                    </div>

              </div>

              <!--post area-->
              <div style="min-height:400px;flex:3;margin:auto;">

                <div id="posts">

                <form method='post' enctype='multipart/form-data'>

                      <textarea name='post' id='g' style='height:200px;' placeholder=' what is in your mind?'></textarea>
                      <input type='file' name='file' style='margin-left:6%;margin-top:-7%;'>
                        
                        <button  id='u'>post</button>

                  </form>  
                      <!--others posts-->

                   <div id="post_bar">
                          
                   <?php 
                      
                      $DB = new Database(); 
                      $user_class = new User();
                      $image_class = new  Image();

                      $followers = $user_class->get_following($_SESSION['mybook_userid'],"user");
                      
                      $follower_ids = false;
                      if(is_array($followers)){
                         $follower_ids = array_column($followers,"userid");
                         $follower_ids = implode("','",$follower_ids);
                      }
                      
                      if($follower_ids){
                        $sql = "select * from posts where parent = 0 and userid in('" .$follower_ids. "') order by id desc limit 100";
                        $posts =  $DB->read($sql);
                      }
                    
                      if($followers){
                        if($posts){

                          foreach($posts as $row){
                            
                            $user = new User();
                            $row_user =  $user->get_user($row['userid']);
                                                            
                            include("post1.php"); 
                            
                          }
  
                        }

                      }else{
                          echo "<span style ='margin-left:25%;font-size:30px;'>Find you like to follow or friends!</span>";
                      }
                      
                    
                      ?>

                   </div>


                </div>
                
              </div>
              <div style="min-height:400px;flex:1;">
            
              </div>

       </div>
     
      
  </body>
</html>