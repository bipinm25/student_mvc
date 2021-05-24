<script>
   $('.delete').on('click', function(e){
       var id = $(this).data('id');
       if(confirm("Do you want to delete the student")){       
            $.ajax({
                url:'/delete_student',
                method:'post',
                dataType: 'json',
                data : { 'id' : id},            
            }).done(function(res){
                if(res.success){
                    window.location = '/';
                }
            });
       }

   });
</script>