<?php

class Login{

   private $error = "";


 
    public function evaluate($data){


      $email =  addslashes($data['email']);
      $password =  hash("sha1",addslashes($data['password']));

  

      $query ="select * from users where email = '$email' limit 1 ";
     
      $DB =new Database();
      $result = $DB->read($query);
      
      if($result){

         $row = $result[0];

         if($password == $row['password']){

             //create session data 
            $_SESSION['mybook_userid']= $row['userid'];

          }else{
             $this->error .= "wrong email or password.<br>";
          }

      }else{

        $this->error .= "wrong email or password.<br>";
      
      }

         return $this->error;

     

    }

    public function check_login($id){
    
      if( is_numeric($id)){

            $query ="select * from users where userid = '$id' limit 1 ";
         
            $DB =new Database();
            $result = $DB->read($query);
            
            if($result){
               $user_data = $result[0];
               return $user_data;

            }else{
            
               header("Location: welcome.php");
               die;

            }   
 
        }else{
            header("Location: welcome.php");
           die;
                     
         }

    }

   

}