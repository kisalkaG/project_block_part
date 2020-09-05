<?php

     require_once('connection.php');

  
     function InsertRecord()
     {          
         global $con;
         $UserName = $_POST['UName'];
         $UserEmail = $_POST['UEmail'];         
         
         $query = "insert into friend_list (UserName, UserEmail,is_blocked) values('$UserName','$UserEmail','false')";        
         $result = mysqli_query($con,$query);        
        
         if($result)
         {            
             echo 'Your Record Has Been Saved In The Database';
         }
         else
         {            
             echo 'Please Check Your Query';
         }
     }

     function display_record()
     {         
         global $con;
         $value = "";
         $value='<div class="container"><table class="table table-bordered">
                    <tr>
                        <td> User id </td>
                        <td> User User </td>
                        <td> User Email </td>                        
                        <td> Block </td>                      
                    </tr>';
        $query = "SELECT id,UserName,UserEmail,is_blocked FROM friend_list";
                
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            if($row['is_blocked']==1)
            {
                $value.=  '<tr>
                <td> '.$row['id'].' </td>
                <td> '.$row['UserName'].' </td>
                <td> '.$row['UserEmail'].' </td>                            
               
                <td> <button class="btn btn-danger" id="btn_block" data-id2='.$row['id'].'>Unblock</button> </td>                    
            </tr>';
            }else{
                $value.=  '<tr>
                <td> '.$row['id'].' </td>
                <td> '.$row['UserName'].' </td>
                <td> '.$row['UserEmail'].' </td>                            
               
                <td> <button class="btn btn-success" id="btn_block" data-id2='.$row['id'].'>Block</button> </td>                    
            </tr>';  
            };
           
           
        }

        $value.='</table></div>';
           echo $value;
        // echo json_encode(['status'=>'success','html'=>$value]);
     }

     function get_record()
     {
         global $con;
         $UserID = $_POST['UserID'];
         $query = "select * from friend_list where id='$UserID'";
         $result = mysqli_query($con,$query);
         
         $User_data = array();
         while($row=mysqli_fetch_assoc($result))         
         {             
            $User_data[0]=$row['id'];
             $User_data[1]=$row['UserName'];
             $User_data[2]=$row['UserEmail'];          
         }
         echo json_encode($User_data);
          
     }       

     function block_record()
     {
        // "<pre>";
        // print_r($_POST);
        //  die();
        //  "</pre>";

         global $con;
         $result= '';
         $block_id = $_POST['block_id'];
         $loged_in_user_id = $_POST['loged_in_user_id'];

         //check is user already blocked
         $select_query = "select * from friend_list where id='$block_id'";
         $select_result = mysqli_query($con,$select_query);
         $row = mysqli_fetch_assoc($select_result);

         if($row['is_blocked']==1)
         {
            $query = "update friend_list set is_blocked=false where id=' $block_id'";
            $result = mysqli_query($con,$query);

            if($result)
                {
                    echo 'Record Has Been Unblocked';
                }
                else
                {
                    echo 'Please Check Your Query';
                }
         }else
         {
            $query = "update friend_list set is_blocked=true where id=' $block_id'";
            $result = mysqli_query($con,$query);

            if($result)
                {
                    echo 'Record Has Been Blocked';
                }
                else
                {
                    echo 'Please Check Your Query';
                }
         }          

         

     }

     
?>