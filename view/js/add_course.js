<script>
    
$(".submit").on('click', function(event){
        event.preventDefault();
        var msg = '';
        $('.mandotry').each(function(){
            $(this).removeClass('is-invalid');
            if($(this).val().trim() == ''){
                $(this).addClass('is-invalid');
                msg += $(this).parent().parent().find('label').text()+' is required\n';
            }
        });       

        if(msg.length != 0){
          alert(msg);
        }else{
            $('form').submit();
        }        
    });
</script>