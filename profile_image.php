<?php


//print_r($_SESSION);


include("classes/autoload.php");


//isset($_SESSION['mybook_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['mybook_userid']);
$USER = $user_data;


$image_class=new Image();
include("header.php"); 

if($_SERVER['REQUEST_METHOD'] == "POST"){

   if(isset($_FILES['file']['name'])  &&  $_FILES['file']['name'] != ""){

    if($_FILES['file']['type'] == "image/jpeg"){
          $allowed_size = (1024 * 1024) * 5;

          if($_FILES['file']['size'] < $allowed_size){
                //everything is fine
                $folder = "uploads/" . $user_data['userid'] . "/";

                //create folder
                if(!file_exists($folder)){

                     mkdir($folder,0777,true);

                }
                $image = new Image();

                $filename = $folder.$image->generate_filename(20) . ".jpg";
                move_uploaded_file($_FILES['file']['tmp_name'],$filename);

                $change = "profile";

                // check for mode
                if(isset($_GET['change'])){

                    $change = $_GET['change'];

                }


                
                if($change == "cover"){

                  if(file_exists($user_data['cover_image'])){
                      unlink($user_data['cover_image']);
                  }

                  $image->resize_image($filename,$filename,1500,1500); 

                }else{

                  if(file_exists($user_data['profile_image'])){
                    unlink($user_data['profile_image']);
                  }

                  $image->resize_image($filename,$filename,1500,1500);

                }
                              
                 if(file_exists($filename)){
             
                      $userid = $user_data['userid'];
                    
                      if($change == "cover"){

                        $query = "update users set cover_image = '$filename' where userid = '$userid' limit 1";
                        $_POST['is_cover_image'] = 1;
                      }else{

                        $query = "update users set profile_image = '$filename' where userid = '$userid' limit 1";
                        $_POST['is_profile_image'] = 1;
                      }
                      
                      
                      $DB = new Database();
                      $DB->save($query);

                      //create a post
                      $post = new Post();
                    
                      $result = $post->create_post($userid,$_POST,$filename);

                      header(("Location: profile1.php"));
                      die;
                 }
             
                
          }else{
            echo "<div  id='o'>'";
            echo "<br>ERRORs:<br>";
            echo "Only images of size 5Mb or lower are allowed";
            echo "</div>";

          }

    }else{
      echo "<div  id='o'>";
      echo "<br>ERRORs:<br>";
      echo "Only images of Jpeg type are allowed.";
      echo "</div>";

    }

   


   }else{
    echo "<div id='o' style='margin:auto;'>";
    echo "<br>ERRORs:<br>";
    echo "please add a valid image";
    echo "</div>";

   }
            
}


?>


<html>
  <head>
    <title>Lankabook | Change_profile_image</title>
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
    #o{
      font-size:15px;
      width:60%;
      font-weight:bold;
      color:red;    
       background-color:rgba(255, 0, 0, 0.1);
       display:none;
       margin:auto;
       text-align:center;
    }
    #blue{
      background-color: rgb(11, 66, 129);
      height:50px;
      color:white;
      padding: 5px;
    }
    #search{
       border-radius: 5px;
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

  

     #posts{
       background-color:white;
       margin-top: 20px;
       margin-left:20px;
       


     }

     #g{
        width:800px;
        margin:14px;
        height:50px;
        font-size: 16px;
     }

     #u{
      display:inline;
      margin-left:650px;
      margin-top:-60px;
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


    ::placeholder{
       font-size: larger;
       text-align:center;
    }
  </style>
  <body style="font-family:tahoma;background-color: #e9ebee;">
      

                 <!--top blue bar-->
                
              <br>

    
       <!--content-->
       <div style="display:flex;width:80%;margin:auto;">

             

              <!--post area-->
              <div style="flex:2.5;">

                <div id="posts">

                  <form method="post" enctype="multipart/form-data">

                       <input name="file" type="file" placeholder="what's in your mind?" id="g">
                       <button  id="u">Upload</button>
                       <br> <br> <br>
                      <div style="text-align:center;">
                       <?php 
                             
                             //check mode
                             if(isset($_GET['change']) && $_GET['change'] == "cover"){

                              $change = "cover";

                                          
                                  if(file_exists($user_data['cover_image'])){
                                      
                                    echo "<img src='$user_data[cover_image]' style='width: 500px;margin-bottom:25px;'>";
                                        
                                  }else{
                                    echo "<img src='images/placeholder_cover1.png' style='width: 500px;margin-bottom:25px;'>";
                                  }

                              
          
                             }else{
                                
                              if(file_exists($user_data['profile_image'])){
                                      
                                echo "<img src='$user_data[profile_image]' style='width: 500px;margin-bottom:25px;'>";
                                    
                              }else{
                                if($user_data['gender'] == 'Female'){
                                  echo "<img src='images/user_female.jpg' style='width: 500px;margin-bottom:25px;'>";
                                }else{
                                  echo "<img src='images/user_male.jpg' style='width: 500px;margin-bottom:25px;'>";
                                }
                               
                              }
                             }
                     
                        ?> 
                       </div>

                  </form>
                                         </div>


                </div>
                
              </div>

       </div>
     
      
  </body>
</html>