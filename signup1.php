


<html>
<head>
    <title>Ceyact</title>

   

    <style>
        #bar {
            height:80px;
            background-color:#005487;
            color: aliceblue;
            padding:20px;
            text-align:left;
        }

        #signup {
            background-color: rgb(37, 189, 37);
            width: 70px;
            text-align: center;
            padding: 6px;
            border-radius: 4px;
            display: inline;
            font-weight: 600;
            border-color: none;
            border-width: 0;
            color: white;
            cursor: pointer;
        }

        #signin {
            background-color: white;
            width: 600px;
            margin: auto;
            margin-top: 6%;
            padding: 10px;
            text-align: center;
            display: block;
            padding-top: 5%;
            height: 560px;
        }

        #text {
            height: 40px;
            width: 300px;
            border-radius: 4px;
            border: solid 1px #ccc;
        }

        #button {
            height: 50px;
            width: 300px;
            background-color: #005487;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        #signup:hover {
            cursor: pointer;
            background-color: white;
            color: rgb(37, 189, 37);
        }

        #signup:active {
            cursor: pointer;
            background-color: rgb(37, 189, 37);
            color: white;
        }

        #button:hover {
            cursor: pointer;
            background-color: white;
            border-width: 2px;
            border-color: blue;
            color: blue;
        }

        #button:active {
            background-color: rgb(4, 67, 139);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        #title {
            font-size: large;
            font-weight: bold;
            font: bold;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // Fade in the div over 3 seconds
        $('#u').fadeIn(1000, function() {
            // After fading in, wait for 9 seconds before fading out
            $(this).delay(2500).fadeOut(1000);
        });
    });
</script>
</head>

<body style="font-family:tahoma;background-color:#e9ebee">
<div id="bar">
    <div style="font-size:55px;display:inline;margin:auto;font-weight:bold;font-family: Franklin Gothic;">
    <a href="welcome.php" style='text-decoration:none;color:white;'>ceyact</a>  
    </div>
    <div style="display:inline;">
        <button id="signup">Log in</button>
    </div>
</div>

        <?php
        include("classes/connect.php");
        include("classes/signup.php");

        $first_name = "";
        $last_name = "";
        $gender = "";
        $email = "";

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $signup =new Signup();
            $result = $signup->evaluate($_POST);

            if($result != "") {
                
                echo "<div id='u'  style='font-family:tahoma;font-size:15px;width:60%;font-weight:bold;color:red;margin-top:10%;background-color:rgba(255, 0, 0, 0.1);display:none;margin:auto;text-align:center;'>";
                echo "<br>ERRORs:<br>";
                echo $result;
                echo "</div>";
            }else{

                header("Location: login1.php");
                die;

            }
            
                $first_name = $_POST['first_name'];
                $last_name =  $_POST['last_name'];
                $gender =  $_POST['gender'];
                $email =  $_POST['email'];
                //echo "<pre>";
                //print_r($_POST);
                //echo "</pre>"; 
        }
        

        ?>



<div id="signin">
    <div id="title">
        Signup to ceyact
    </div><br><br>

    <form method="post" action="signup1.php">

    <span style="font-size: 12px; text-align:left;font-weight:900">Name:</span><br><br>

        <input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First Name"><br><br>
        <input value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last Name"><br><br>
    
        <span style="font-size: 12px; text-align:left;font-weight:900">Gender:</span><br><br>
        <select id="text" name="gender">
            <option><?php echo $gender ?></option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
            <placehoder>Gender</placehoder>
        </select><br><br>
    
        <input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>
        <input name="password1" type="password" id="text" placeholder="Password"><br><br>
        <input name="password2" type="password" id="text" placeholder="Confirm Password"><br><br>
        <input type="submit" id="button" value="Signup">
        <br><br><br>

    </form>


</div>




<script>
  
    var loginButton = document.getElementById('signup');

    loginButton.addEventListener('click', function () {

        window.location.href = 'login1.php';
    });
</script>
</body>
</html>
