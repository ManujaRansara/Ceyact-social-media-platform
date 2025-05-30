<?php


class Image{

  public function generate_filename($lenght){

    
    $array = array(0,1,2,3,4,5,6,7,8,9,'A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z');
    $text = "";

    for($x = 0;$x < $lenght; $x++){

       $random = rand(0,61);
       $text.=$array[$random];

    } 
    return $text;

  }

   //resize the image
  public function resize_image($original_file_name,$resized_file_name,$max_width,$max_height){
     

    if(file_exists($original_file_name)){
        
        $original_image = imagecreatefromjpeg($original_file_name);
        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);
        
        if($original_height > $original_width){

              // make width equal to max width;
              $ratio = $max_width / $original_width;

              $new_width = $max_width;
              $new_height = $original_height * $ratio;
 
        }else{
               // make width equal to max width;
              $ratio = $max_height / $original_height;

              $new_height = $max_height;
              $new_width = $original_height * $ratio;

        }
    }
     //adjust incase max width and height are different
     if($max_width != $max_height){
         
         if($max_height > $max_width){

                if($max_height > $new_height){
                   
                   $adjusment = ($max_height / $new_height);

                }else{
                   $adjusment = ($new_height / $max_height);
                }
              $new_width = $new_width * $adjusment;
              $new_height = $new_height * $adjusment;
            
         }else{

          
          if($max_width > $new_width){
                   
            $adjusment = ($max_width / $new_width);

           }else{
            $adjusment = ($new_width / $max_width);
           }
           $new_width = $new_width * $adjusment;
           $new_height = $new_height * $adjusment;

            
         }

     }

    $new_image= imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $original_image , 0 , 0 , 0 , 0 , $new_width , $new_height , $original_width , $original_height);

     imagedestroy($original_image);

    imagejpeg($new_image,$resized_file_name,90);
    imagedestroy($new_image);
  }



  public function crop_image($original_file_name,$cropped_file_name,$max_width,$max_height){
     

    if(file_exists($original_file_name)){
        
        $original_image = imagecreatefromjpeg($original_file_name);
        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);
        
        if($original_height > $original_width){

              // make width equal to max width;
              $ratio = $max_width / $original_width;

              $new_width = $max_width;
              $new_height = $original_height * $ratio;
 
        }else{
               // make width equal to max width;
              $ratio = $max_height / $original_height;

              $new_height = $max_height;
              $new_width = $original_height * $ratio;

        }
    }
     //adjust incase max width and height are different
     if($max_width != $max_height){
         
         if($max_height > $max_width){

                if($max_height > $new_height){
                   
                   $adjusment = ($max_height / $new_height);

                }else{
                   $adjusment = ($new_height / $max_height);
                }
              $new_width = $new_width * $adjusment;
              $new_height = $new_height * $adjusment;
            
         }else{

          
          if($max_width > $new_width){
                   
            $adjusment = ($max_width / $new_width);

           }else{
            $adjusment = ($new_width / $max_width);
           }
           $new_width = $new_width * $adjusment;
           $new_height = $new_height * $adjusment;

            
         }

     }

              $new_image= imagecreatetruecolor($new_width, $new_height);
              imagecopyresampled($new_image, $original_image , 0 , 0 , 0 , 0 , $new_width , $new_height , $original_width , $original_height);

     imagedestroy($original_image);

     if($max_width != $max_height){

          if($max_width > $max_height){

            $diff = ($new_height - $max_height);
            if($diff < 0){
              $diff = $diff * -1;
            }
            
            $y = round($diff /2);
            $x = 0;

          }else{

            $diff = ($new_width - $max_height);
            if($diff < 0){
              $diff = $diff * -1;
            }
            $x = round($diff /2);
            $y = 0;

          }

     }else{

          if($new_height > $new_width){

            $diff = ($new_height - $new_width);
            $y = round($diff /2);
            $x = 0;

          }else{

            $diff = ($new_width - $new_height);
            $x = round($diff /2);
            $y = 0;

          }
      }

    $new_cropped_image =  imagecreatetruecolor($max_width, $max_height);
    imagecopyresampled($new_cropped_image, $new_image , 0 , 0 , $x , $y , $max_width , $max_height , $max_width , $max_height);

    imagedestroy($new_image);

    imagejpeg($new_cropped_image,$cropped_file_name,90);
    imagedestroy($new_cropped_image);
  }

   //create thumbmail for cover image
  public function get_thumb_cover($filename){

        $thumbnail = $filename . "_cover_thumb.jpg";
        if(file_exists($thumbnail)){
           return $thumbnail;
        }
        $this->crop_image($filename,$thumbnail,1366,488);

        if(file_exists($thumbnail)){
            return $thumbnail;
        }else{
           return $filename;
        }

  }

    //create thumbmail for profile image
    public function get_thumb_profile($filename){

      $thumbnail = $filename . "_profile_thumb.jpg";
      if(file_exists($thumbnail)){
         return $thumbnail;
      }
      $this->crop_image($filename,$thumbnail,800,800);

      if(file_exists($thumbnail)){
          return $thumbnail;
      }else{
         return $filename;
      }
    }

     //create thumbmail for post image
    public function get_thumb_post($filename){

          $thumbnail = $filename . "_post_thumb.jpg";
          if(file_exists($thumbnail)){
            return $thumbnail;
          }
          $this->crop_image($filename,$thumbnail,550,550);

          if(file_exists($thumbnail)){
              return $thumbnail;
          }else{
            return $filename;
          }

   }

}


?>