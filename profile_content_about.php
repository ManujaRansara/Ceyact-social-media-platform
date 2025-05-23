<div  style = "min-height:400px;width:80%;background-color:white;margin:auto;text-align:center;">
<div style='margin-top:2%;'>
<div style = "padding: 30px;max-width:50%;display:inline-block;">
<form method='post' enctype='multipart/form-data'>

        
       
           
       
  
<?php 

  $settings_class =  new Settings();

  $settings = $settings_class->get_settings($_SESSION['mybook_userid']);

  if(is_array($settings)){
   
    echo"<br><span style='font-size:24px;font-weight:bold;'>About me:</span><br>
         <div name='about' id='textbox' style='height:200px; border:none;font-size:22px;'>".htmlspecialchars($settings['about'])."</div>";

  }
  
?>

</form> 
</div>

</div>
</div>