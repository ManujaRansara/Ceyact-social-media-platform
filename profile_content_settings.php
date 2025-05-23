<div  style = "min-height:400px;width:80%;background-color:white;margin:auto;text-align:center;">
<div style='margin-top:2%;'>
<div style = "padding: 30px;max-width:50%;display:inline-block;">
<form method='post' enctype='multipart/form-data'>

        
       
           
       
  
<?php 

  $settings_class =  new Settings();

  $settings = $settings_class->get_settings($_SESSION['mybook_userid']);

  if(is_array($settings)){
    echo"<input type = 'text' id='textbox' name='first_name' value='".htmlspecialchars($settings['first_name'])."' placeholder='First name'>";
    echo"<input type = 'text' id='textbox' name='last_name'value='".htmlspecialchars($settings['last_name'])."'placeholder='Last name'>";
  
    echo"<select id='textbox' name='email' style=''>
           <option>".htmlspecialchars($settings['gender'])."</option>
           <option>Male</option>
           <option>Female</option>
           </select>";
  
  
   
    echo"<input type = 'password' id='textbox' name='password'  value='".htmlspecialchars($settings['password'])."' placeholder='Password'>";
    echo"<input type ='password' id='textbox' name='password2' value='".htmlspecialchars($settings['password'])."'  placeholder='Password'>";
    echo"<br>About me:<br>
         <textarea name='about' id='g' style='height:200px;'>".htmlspecialchars($settings['about'])."</textarea>";
    echo"<button  id='u' style='margin:auto;'>Save</button>";
  }
  
?>

</form> 
</div>

</div>
</div>