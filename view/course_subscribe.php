<div class="col d-flex justify-content-center">
    <h2>Student Course Registration</h2>
</div>

<form  method="post" action="/subscribe_course" class="form-card">
   <div class="row subscribe">
      <div class="col-sm-5">
         <div class="form-group"> 
            <label class="form-control-label px-3">Student<span class="text-danger"> *</span></label> 
            <select name="student_id[]" class="form-control">
            <?php
               foreach($student as $s){
                   echo '<option value="'.$s['id'].'">'.$s['first_name'].' '.$s['last_name'].'</option>';
               }
               ?>                            
            </select>
         </div>
      </div>
      <div class="col-sm-5">
         <div class="form-group"> 
            <label class="form-control-label px-3">Course<span class="text-danger"> *</span></label> 
            <select name="course_id[]" class="form-control">
            <?php
               foreach($course as $c){
                   echo '<option value="'.$c['id'].'">'.$c['course_name'].'</option>';
               }
               ?>  
            </select>                        
         </div>
      </div>
      <div class="col-sm-2 add_btn">
         <a class="btn btn-primary add" style="margin: auto; height: 35px; margin-top: 33px;" href="javascript:;"><i class="fa fa-plus"></i></a>    
      </div>
   </div>
   <div class="test"></div>

   <div class="row justify-content-between text-left">
      <div class="form-group col-sm-2" style="margin-left: 424px;"> 
         <button class="btn btn-info">Submit</button>                          
      </div>
   </div>
</form>