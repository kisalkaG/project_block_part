$(document).ready(function () {
    Insert_record();
    view_record();
    block_record();
})

function Insert_record() {
    $(document).on('click', '#btn_register', function () {
        var User = $('#UserName').val();
        var Email = $('#UserEmail').val();

        if (User == "" || Email == "") {
            $('#message').html('Please Fill In The Blanks');
        }
        else {
            $.ajax(
                {
                    url: 'insert.php',
                    method: 'post',
                    data: { UName: User, UEmail: Email },
                    success: function (data) {

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

    $(document).on('click', '#btn_close', function () {
        $('form').trigger('reset');
        $('#message').html('');
    })
}

function view_record() {

    $.ajax(
        {
            url: 'view.php',
            method: 'post',
            success: function (data) {

            }

        }
    )
}

function block_record() {
    $(document).on('click', '#btn_block', function () {
        var block_id = $(this).attr('data-id2');
        var loged_in_user_id = 2;//here we need to pass loged user id    
        $('#block').modal('show');

        $(document).on('click', '#btn_block_record', function () {
            $.ajax(
                {
                    url: 'block.php',
                    method: 'post',
                    data: { block_id: block_id, loged_in_user_id: loged_in_user_id },
                    success: function (data) {                                               
                        $('#block-message').html(data).hide(2000);
                        location.reload();
                        view_record();
                    }
                })
        })
    })
}