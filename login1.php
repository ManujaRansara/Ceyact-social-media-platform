

<html>
   <head>
    <title>Ceyact</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function() {
         // Fade in the div over 3 seconds
         $('#u').fadeIn(1000, function() {
            // After fading in, wait for 9 seconds before fading out
            $(this).delay(2000).fadeOut(1000);
         });
      });
      </script>
   </head>
    <style>
      #bar{
         height:80px;
         background-color:#005487;
         color: aliceblue;
         padding:20px;
         text-align:left;
         
      }

      #signup{
         background-color:rgb(37, 189, 37) ;
         width:70px;
         text-align: center;
         padding: 6px;
         border-radius: 4px;
         display:inline;
         font-weight:600;
         border-color: none;
         border-width: 0;
         color: white;
         cursor:pointer;
      }
      #signup:hover{
         cursor: pointer;
         background-color: white;
         color: rgb(37, 189, 37);
     }
     #signup:active{
        cursor: pointer;
        background-color:  rgb(37, 189, 37);
        color:white;
     }
      #signin{
         background-color:white;
         width:50%;
         margin:auto;
         margin-top:10%;
         padding:20px;
         text-align:center;
         display:block;
         padding-top:80px;
         height: 300px;
      }


      #text{
          height:40px;
          width:300px;
          border-radius: 4px;
          border:solid 1px #ccc;
      }
      #button{
          height: 50px;
          width:300px;
          background-color:#005487;
          color:white;
          font-size: 16px;
          font-weight:bold;
          cursor:pointer;
      }

      #button:hover{
         cursor:pointer;
         background-color: white;
         border-width: 2px;
         border-color: blue;
         color:blue;
     }
     #button:active{
        background-color:rgb(4, 67, 139);
        color:white;
        font-size: 16px;
        font-weight:bold;
        cursor:pointer;
     }
      #title{
          font-size: medium;
          font-weight: bold;
          font:bold;
      }
    </style>
   <body style="font-family:tahoma;background-color:#e9ebee">
       <div id="bar"> 
          <div style="font-size:55px;display:inline;margin:auto;font-weight:bold;font-family: Franklin Gothic;"> 
            <a href="welcome.php" style='text-decoration:none;color:white;'>ceyact</a>  
          </div> 
          <div style="display:inline;" >
            <button id="signup" >Signup</button>
         </div>     
      </div>


         <?php
 
               include("classes/autoload.php");
               

               $email = "";
               $password = "";
               

               if($_SERVER['REQUEST_METHOD']=='POST'){

               $login =new Login();
               $result = $login->evaluate($_POST);

               if($result != "") {
                  echo "<div id='u' style='font-size:15px;width:60%;font-weight:bold;color:red;
                  margin-top:10%;background-color:rgba(255, 0, 0, 0.1);display:none;margin:auto;text-align:center;>'";
                  echo "<br>ERRORs:<br>";
                  echo $result;
                  echo "</div>";
               }else{

                  header("Location: profile1.php");
                  die;

               }
                  
                  $password = $_POST['password'];
                  $email =  $_POST['email'];
                  //echo "<pre>";
                  //print_r($_POST);
                  //echo "</pre>"; 
               }
  

         ?>
      <div id="signin">
           <div id="title">
            Log in to ceyact
         </div><br><br>

         <form method="post" >

          <input  name="email" value="<?php echo $email?>" type="text" id="text" placeholder="Email"><br><br>
          <input  name="password" value="<?php echo $password?>" type="password" id="text" placeholder="Password"><br><br>
          <button id="button" >Log in</button>


         </form>
         
      </div>
   </body>
   <script>
      var loginButton = document.getElementById('signup');

      loginButton.addEventListener('click', function () {
  
          window.location.href = 'signup1.php';
      });
   </script>
</html>