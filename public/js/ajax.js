$(function(){
    $('form[name="create"]').submit(function(event){
        event.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "post",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
                if(response.success == true){
                    window.location.href = window.index_route;
                    $('#message').removeClass('d-none').html(response.message);
                }else{
                    $('#message').removeClass('d-none').html(response.message);
                }   
            }
        }) 
    });

    $('form[name="destroy"]').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'delete',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
                if(response.success === true){
                    window.location.href = window.index_route;
                    $('#message').removeClass('d-none').html(response.message);
                }else{
                    $('#message').removeClass('d-none').html(response.message);
                }
            }
        });
    });

    $('form[name="formEdit"]').submit(function(e){
        e.preventDefault();
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'PUT',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response){
                if(response.success == true){
                    window.location.href = window.index_route;
                    $('#message').removeClass('d-none').html(response.message);
                }else{
                    $('#message').removeClass('d-none').html(response.message);
                }

            }
        });
    });
});

