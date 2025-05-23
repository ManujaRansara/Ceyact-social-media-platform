<html>
  <head>
    <title>
        Ceyact
    </title>
  </head>

  <style>
    #a{
       background-color:#005487;
       height:30%;
       color: white;
       text-align: center;
    }
    #b {
      display: flex;
      align-items: center;
      
    }
    #b1 {
        flex: 1;
        padding: 20px;
        font-family: tahoma;
        font-size: 30px;
        font-weight: bold;
    }
    #b2 img {
        width: 300px;
        height: auto;
        display: block;
    } 
    #c {
      display:flex;
      align-items: center;
      background-color: #005487 ;
      color: white;
      height: 200px;
      margin-top: 2%;
    }
    #c1 {
        flex: 1;
        padding: 10px;
        
        font-family: tahoma;
        font-size: 30px;
        align-items: center;
        font-weight: bold;
        width: 50%;
        
    }
    #c2 {
        width: 50%;
        flex: 1;
        height: auto;
        font-family: tahoma;
        font-size: 30px;
        font-weight: bold;
    } 
    #d1{
      height: 70px;
      width:200px;
      font-size:larger;
      color:white; 
      background-color:green;
      border:0cap;
      border-radius: 10px;
      font-family: tahoma;
      font-weight: 550;
      margin-left:35%;
    }
    #d1:hover{
      background-color: white;
      color:green;
      border: 1;
     
    }
    #d1:active{
      background-color:green;
      color:white; 
    }
    #d2{
      height: 70px;
      width:200px;
      font-size:larger;
      color:white; 
      background-color:green;
      border:0cap;
      border-radius: 10px;
      font-family: tahoma;
      font-weight: 550;
      margin-left:35%;
    }
    #d2:hover{
      background-color: white;
      color:green;
      border: 1;
    }
    #d2:active{
      background-color:green;
      color:white; 
    }
    
    
    @media (min-width: 768px) {
  /* Increase font size and button dimensions */
  #b1 {
    font-size: 24px;
  }
  #a{
       background-color: #005487;
       height:13%;
       color: white;
       text-align: center;
    }
  #d1,
  #d2 {
    height: 60px;
    width: 180px;
    font-size: 18px;
  }
  
}

/* Desktops and Laptops */
@media (min-width: 992px) {
  /* Further adjustments for larger screens */
  #b {
    flex-direction: row; /* Display b1 and b2 side by side */
    align-items: flex-start;
  }
  #b1 {
    font-size: 28px;
  }
  #b2 img {
    width: 300px;
    max-width: 100%;
    height: auto;
    margin-top: 0;
  }
 
  #c1,
  #c2 {
    margin-bottom: 0;
  }
  #a{
       background-color: #005487;
       height:27%;
       color: white;
       text-align: center;
    }
}

/* Larger Desktops */
@media (min-width: 1200px) {
  /* Additional styles for very large screens */
  #b1 {
    font-size: 32px;
  }
  #d1,
  #d2 {
    height: 70px;
    width: 200px;
    font-size: 25px;
  }
  #a{
       background-color:  #005487;
       height:260px;
       color: white;
       text-align: center;
    }
}

  </style>

  <body style="font-family:tahoma;background-color:white;">
     <div id="a">
        <span style="font-weight:bold;font-size:80px;display:block;font-family:tahoma"> 
          welcome to <br>  <span style = "font-family: Franklin Gothic;font-size:70px;"> ceyact </span>
        </span>
        <span style="font-weight:bold;font-size:30px;display:block;">
          place where it all connects
        </span>
     </div>
     <div >
                   <a  href="welcome.php" style="text-decoration: none;">
                    <div  id="p" style="display:inline;width:100px;font-size:45px;font-weight:bold;margin-left:3%;">
                      <span style="color:rgb(11, 66, 129);font-weight:bold;font-family:tahoma;" style="text-decoration: none;">About<span>
                    </div> </a>
                    <a  href="welcome1.php" style="text-decoration: none;">
                    <div   id="p" style="display:inline;width:100px;font-size:30px;font-weight:bold;margin-left:3%;">
                    <span style="color:grey;font-weight:bold;font-family:tahoma;" style="text-decoration: none;">Privacy</span>
                    </div></a>
                    <a  href="welcome2.php" style="text-decoration: none;">
                    <div   id="p" style="display:inline;width:100px;font-size:30px;font-weight:bold;margin-left:3%;">
                    <span style="color:grey;font-weight:bold;font-family:tahoma;" style="text-decoration: none;">Creator</span>
                    </div></a>
      <div id="b"> 
                 
                    
                    
        <div id="b1">
          Ceyact  is a digital solution to connect people .         
          Not like other solutions We don't use algorithms to suggest you content.
          You choose what you can see in your screen 
          simply by following what you like.Also you can create groups and join to groups you like.
          All the content in your screen is decided by you and that's the beauty of ceyact.We do not sell or share your data with third parties.Thank you!
        </div>
        <div id="b2">
            <img src="images/rawana.jpeg">
        </div>
      </div>
      </div>
            
      <div style="display:flex;"id="c">
        
        <div style="flex:1;"id="c1">
          <p style="text-align:center;">not a member?</p>
           <button id="d1">Sign up</button>
        </div>
        <div style="flex:1;" id="c2">
             <p style="text-align:center;">already a member?</p>
            <button id="d2"">Log in</button>
        </div>
      </div>

  </body>
  <script>
    var loginButton = document.getElementById('d1');

    loginButton.addEventListener('click', function () {

        window.location.href = 'signup1.php';
    });
  </script>
  <script>
    var loginButton = document.getElementById('d2');

    loginButton.addEventListener('click', function () {

        window.location.href = 'login1.php';
    });
  </script>
</html>