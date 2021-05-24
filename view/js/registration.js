<script>
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
    });

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

        var dob = $('input[name="dob"]').val();
        var dobobj = dob.split('-');
        var d = new Date(dobobj[2], dobobj[1], dobobj[0]);
        if(d == 'Invalid Date'){
            msg += 'Invalid Date in DOB';
        }

        var phone = $('input[name="contact_no"]').val();
        if(phone.length > 0){
            let valid = /^[0-9]+$/.test(phone)
            if(!valid){
                msg += 'Not a valid contact number';                
            }
        }

        if(msg.length != 0){
          alert(msg);
        }else{
            $('form').submit();
        }        
    });
</script>

