<?php

include("classes/autoload.php");

//isset($_SESSION['mybook_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['mybook_userid']);
$USER = $user_data;
$image_class=new Image();
$Post = new Post();


  $ERROR = "";
      if(isset($_GET['id'])){
          $row = $Post->get_one_post($_GET['id']);

          if(!$row){
            $ERROR = "NO such post was found!";
          }else{
              if($row['userid'] != $_SESSION['mybook_userid']){
                 $ERROR = "Access denied! you can't delete this file.<br><br><br>";
              }
          }

      }else{
         $ERROR = "NO such post was found!";
      }

      if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $Post->edit_post($_POST,$_FILES);

        if(isset($_SERVER['HTTP_REFERER']) && strstr(!$_SERVER['HTTP_REFERER'],"edit.php")){
          $_SESSION['return_to'] = $_SERVER['HTTP_REFERER'];
       }else{
          $_SESSION['return_to'] = "profile1.php";
       }
       header("Location: ". $_SESSION['return_to']);
        die;
         
      }

?>


<html>
  <head>
    <title>Ceyact</title>
  </head>

  <style>
    #blue{
      background-color: rgb(11, 66, 129);
      height:50px;
      color:white;
      padding: 5px;
    }
    #search{
      margin-top:2%;
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
        padding:30px;
        text-align:center;
        font-size:30px;
        color:black;
     }

     #friends{
       clear: both;
       
       
     }

     #posts{
       width:80%;
       margin:auto;
       background-color:white;
       margin-top: 20px;
       

     }

     #g{
        width:97%;
        margin:14px;
        height:125px;
        font-size: 16px;
     }

     #u{
      display:inline;
      margin-top:-50px;
      margin-left:500px;
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

             

              <!--post area-->
              <div style="flex:1;">

                <div id="posts">

                  <form method="post" enctype="multipart/form-data">
                       <h2 > &nbsp Edit Post</h2>

                       &nbsp&nbsp&nbsp 
                       <hr>
                         <?php 
                          if($ERROR != ""){
                              echo $ERROR;
                          }else{
                            
                            
                            echo " <textarea name='post' type='text' placeholder='whats in your mind?' id='g'>" . $row['post']. "</textarea>";
                            echo  "  <input type='file' name='file' style='margin-left:6%;margin-top:-5%;'>";

                     

                            echo "<input type='hidden' name='postid' value='$row[postid]'>";
                            echo "<input id='u' type='submit' value='Save'>";
                            if(file_exists($row['image'])){
                              $image_class = new Image();
                              $post_image = $image_class->get_thumb_post($row['image']);
                              echo "<img src='$post_image' style='width:50%;margin-left:25%;'>";
                             }
    
                          }
                         ?>
                        <hr>
                       
                  </form>
               

                </div>
                
              </div>

       </div>
     
      
  </body>
</html>