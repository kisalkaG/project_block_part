$(document).ready(function()
{
    Insert_record(); 
    view_record();
    get_record();      
    block_record();
    view_record2();
    
})

function Insert_record()
{
     $(document).on('click','#btn_register',function()
     {        
         var User = $('#UserName').val();
         var Email = $('#UserEmail').val();
         
         if(User == "" || Email == "")
         {
             $('#message').html('Please Fill In The Blanks');
         }
         else
         {
             $.ajax(
                 {
                     url : 'insert.php',
                     method : 'post',
                     data : {UName:User,UEmail:Email},
                     success : function(data)
                     {                      
                         $('#message').html(data);
                         $('#Registration').modal('hide');
                         $('form').trigger('reset');
                         location.reload();
                         view_record();
                     }

                 }
             )
         }
     })

     $(document).on('click','#btn_close',function()
     {
        $('form').trigger('reset');
        $('#message').html('');
     })
}

function view_record()
{
    
    $.ajax(
        {
            url: 'view.php',
            method: 'post',            
            success: function(data)
            {
                // console.log(data);
                // alert(1);
                // data = $.parseJSON(data);
                // if(data.status=='success')
                // {
                //     $('#table').html(data.html);                    
                // }
            }

        }
    )
}

function get_record()
{
    $(document).on('click','#btn_edit',function()
    {
        var ID = $(this).attr('data-id');
        
        $.ajax(
            {
                url: 'get_data.php',
                method:'post',
                data:{UserID:ID},
                dataType:'JSON',
                success:function(data)
                {
                    console.log(data);
                    $('#Up_User_ID').val(data[0]);
                    $('#Up_UserName').val(data[1]);
                    $('#Up_UserEmail').val(data[2]);
                    $('#Update').modal('show');
                }
            }
        )
    })
}

function block_record()
{
   
    $(document).on('click','#btn_block',function()
    {               
        var Block_ID = $(this).attr('data-id2');
        var Block_ID2 = 2;//here we need to pass loged user id    
        $('#block').modal('show');       

        $(document).on('click','#btn_block_record',function()
        {            
            $.ajax (
                {
                    url : 'block.php',
                    method : 'post',
                    data : {B_ID:Block_ID,B_ID2:Block_ID2},
                    success: function(data)
                    {                       
                        $('#block-message').html(data).hide(5000);
                        location.reload();
                        view_record();
                    }
                })
        })
    })    
}