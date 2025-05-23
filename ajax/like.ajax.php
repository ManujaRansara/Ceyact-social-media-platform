<?php 
  


   //isset($_SESSION['mybook_userid']);
   //$login = new Login();
    if(!isset($_SESSION['mybook_userid'])){
        die;
    }
 
 $query_string = explode("?",$data->link);
 $query_string = end($query_string);

 
 $str = explode("&",$query_string);
 

 foreach($str as $value){
    $value = explode("=",$value);
    $_GET[$value[0]] =$value[1];
 }
 $_GET['id']=addslashes($_GET['id']);
 $_GET['type'] = addslashes($_GET['type']);

     $post = new Post();

    if(isset($_GET['type']) && isset($_GET['id'])){
       if(is_numeric($_GET['id'])){
        $allowed[] = 'post';
        $allowed[] = 'user';
        $allowed[] = 'comment';
          if(in_array($_GET['type'],$allowed)){
            
            $user_class = new User();
            $post->like_post($_GET['id'],$_GET['type'],$_SESSION['mybook_userid']);

            if($_GET['type'] == "user"){

               $user_class->follow_user($_GET['id'],$_GET['type'],$_SESSION['mybook_userid']);
            }
            
          }
       }
       //read likes
       $likes = $post->get_likes($_GET['id'],$_GET['type']);

       
       //collect info

       /////////////////////////////////
       $likes=array();
       $info="";
       $i_liked = 0;
      if(isset($_SESSION['mybook_userid'])){
         
            $DB = new Database();
            //save likes details
           
            $sql = "select likes from likes  where type='post' && contentid='$_GET[id]' limit 1";
            $result = $DB->read($sql);

            if(is_array($result)){

               $likes = json_decode($result[0]['likes'],true);
         
               $user_ids = $arr = array_column($likes,"userid");

               if(in_array($_SESSION['mybook_userid'],$user_ids)){
                  $i_liked = 1;
               }
            }  
      } 
     $like_count= count($likes);
   if($like_count>0){

    

      if($like_count == 1){
            if($i_liked ==1){
            $info .=  "<span style='float:left;color:grey;'> You liked this post </span>";
            }else{
            $info .= "<span style='float:left;color:grey;'> 1 person liked this post </span>";
            }
      }else{
            if($i_liked ==1){
               if(($like_count-1)==1){
                  $info .= "<span style='float:left;color:grey;'>You and " . ($like_count-1) . " person liked this post </span>";
               }else{
                  $info .=  "<span style='float:left;color:grey;'>You and " . ($like_count-1) . " people liked this post </span>";
               }
           
            }else{
               $info .=  "<span style='float:left;color:grey;'> " . $like_count . " people liked this post </span>";
            }
      }
   
   }
    //////////////////////////////

       $obj = (object)[];
       $obj->likes = count($likes);
       $obj->action = "like_post";
       $obj->info = $info;
       $obj->id = "info_$_GET[id]";
       echo json_encode($obj);

   
    }
  
?>   