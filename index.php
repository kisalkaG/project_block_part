

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/myjs.js"></script>
    
    
    <title>Ajax project with php</title>
</head>
<body class="badge-warning">
    <div class="row">
        <div class="col">
           <div class="card mt-5">
               <div class="card-title ml-5 my-2">
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Registration">Add New User</button>
               </div>
               <div class="card-body">
               <p id="Delete-message" class="text-dark"></p>
               <div id="table"></div>
               </div>
           </div>
        </div>
    </div>
    <div class="row">
    <?php
     require_once('view.php');   
     
    ?>
    </div>

    <div class="modal" id="Registration">
       <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
             <h3 class="text-dark">Registration Form</h3>
          </div>
          <div class="modal-body">
          <p id="message" class="text-dark"></p>
             <form>
               <input type="text" class="form-control my-2" placeholder="User Name" id="UserName">
               <input type="email" class="form-control my-2" placeholder="User Email" id="UserEmail">
             </form>
          </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btn_register">Register Now</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
             </div>
          </div>
       </div>
    </div>


    
    

    <div class="modal" id="block">
       <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
             <h3 class="text-dark">Block/Unblock Record</h3>
          </div>
          <div class="modal-body">
          <p id="block-message" class="text-dark"></p>
          <input type="hidden" class="form-control my-2" placeholder="User Email" id="Up_Block_ID">  
          <p>Do you want to Block/Unblock the Record?</p>
                <button type="button" class="btn btn-success" id="btn_block_record">Block/Unblock</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_close">Close</button>
          </div>
             
          </div>
       </div>
    </div>
    
</body>
</html>