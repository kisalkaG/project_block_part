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
               
                <td> <button class="btn btn-primary" id="btn_block" data-id2='.$row['id'].'>Block</button> </td>                    
            </tr>';
            }else{
                $value.=  '<tr>
                <td> '.$row['id'].' </td>
                <td> '.$row['UserName'].' </td>
                <td> '.$row['UserEmail'].' </td>                            
               
                <td> <button class="btn btn-danger" id="btn_block" data-id2='.$row['id'].'>Block</button> </td>                    
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
        "<pre>";
        print_r($_POST);
         die();
         "</pre>";

         global $con;
         $Block_ID = $_POST['B_ID'];
         $Block_ID2 = $_POST['B_ID2'];
         $query = "update friend_list set is_blocked=true where id=' $Block_ID'";
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

     function display_record2()
     {
         
         global $con;
         $value = "";
         $value='<div class="container"><table class="table table-bordered">
                    <tr>
                        <td> User id </td>
                        <td> User User </td>
                        <td> User Email </td>
                                            
                    </tr>';
        $query = "select * from friend_list";
        $result = mysqli_query($con,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $value.=  '<tr>
                            <td> '.$row['id'].' </td>
                            <td> '.$row['UserName'].' </td>
                            <td> '.$row['UserEmail'].' </td>
                            
                        </tr>';
        }

        $value.='</table></div>';
           echo $value;
        
      }

?>