<?php

class Signup{

   private $error = "";
   private $previous = "";

    public function evaluate($data){
       
        foreach($data as $key => $value ){

           #code...
           

           if(empty($value)){

              $this->error = $this->error . $key . "is empty!<br>";

           }

           if($key == "email"){

              if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
              $this->error = $this->error . "invalid email address!<br>";
              }
              
          } 
          if($key == "first_name"){

            if (is_numeric($value)) {
            $this->error = $this->error . "First name can't be a number.<br>";
            }

            if(strstr($value," ")){
                $this->error=$this->error . "First name can't have spaces.<br>";
            }
            
          } 
          if($key == "last_name"){

            if (is_numeric($value)) {
            $this->error = $this->error . "Last name can't be a number.<br>";
            }

            if(strstr($value," ")){
              $this->error=$this->error . "Last name can't have spaces.<br>";
            }
            
          } 


          if($key == "password1"){
             if(strlen($value)>7){
               $this->previous=$value;
             }else{
               $this->error = $this->error . "Password must be at least 8 characters.<br>";
             }
                
            
          } 

          
          if($key == "password2"){
            if(  $this->previous != $value){

              $this->error = $this->error . "Passwords arent same.<br>";
            }
            
          }

        }

        if($this->error == ""){
           
            $this->create_user($data);

        }else{
                
          return  $this->error;
           
        }

    }

    public function create_userid(){
        
      $lenth = rand(4,19);
      
      $number = ""; 

      for($i=0;$i<$lenth;$i++){
           $new_rand = rand(0,9);

           $number = $number . $new_rand;
      }
      return $number;
  
  }

    public function create_user($data){



      $first_name=ucfirst($data['first_name']);
      $last_name=ucfirst($data['last_name']);
      $gender =  $data['gender'];
      $email =  $data['email'];
      $password =  hash("sha1",$data['password1']);

      //create these
      $url_address =  strtolower($first_name) . "." .  strtolower($last_name) . "." . rand(1,100000);
      $userid = $this->create_userid();

      $query ="insert into users
      (userid,first_name,last_name,gender,email,password,url_address)
      values
      ('$userid','$first_name','$last_name','$gender','$email','$password','$url_address')";
       
      
      $DB =new Database();
      $DB->save($query);
   

    }

   

}