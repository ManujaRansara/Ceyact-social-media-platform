<?php

include("classes/autoload.php");

//isset($_SESSION['mybook_userid']);
$login = new Login();
$user_data = $login->check_login($_SESSION['mybook_userid']);
 
$USER = $user_data;
if(isset($_GET['find'])){

  $find = addslashes($_GET['find']);
  
  $sql = "select * from users where first_name like '%$find%' || last_name like '%$find%' || CONCAT(first_name,' ', last_name)  like '%$find%' limit 100";
  
  $DB = new Database();
  $results = $DB->read($sql);


}

$image_class=new Image();
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
            background-color:white;
            width: 600px;
            margin: auto;
            margin-top: 6%;
            padding: 10px;
       

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
      margin-left:85%;
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

               

        

                <div id="posts">
                    <span style="margin-left:30%;font-size:20px;"></span>

                     <?php
                        $User = new User();
                        $image_class=new Image();
                         if(is_array( $results)){
                             foreach( $results as $row){
                                #code
                                $friend_row = $User->get_user($row['userid']);
                                include("user1.php");
                                
                             }
                         }else{
                            echo "no results were found.";
                         }

                     ?>
               

                </div>
                
          

       </div>
     
      
  </body>
</html>