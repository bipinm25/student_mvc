<div class="col d-flex justify-content-center">
    <h2>Student Course Registration</h2>
</div>


<form  method="post" action="/subscribe_course" class="form-card">
                    <div class="row justify-content-between text-left">

                        <div class="form-group col-sm-5 flex-column d-flex"> 
                        <label class="form-control-label px-3">Student<span class="text-danger"> *</span></label> 
                        <select name="student_id[]" class="form-control">
                            <option value="1">stud1</option>
                            <option value="2">stud2</option>
                        </select>
                        </div>
                        <div class="form-group col-sm-5 flex-column d-flex"> 
                        <label class="form-control-label px-3">Course<span class="text-danger"> *</span></label> 
                        <select name="course_id[]" class="form-control">
                            <option value="1">course1</option>
                            <option value="2">course1</option>
                            <option value="3">course3</option>
                            <option value="4">course4</option>
                        </select>                        
                        </div>   
                        <button onclick="alert()" class="btn btn-deafult">Add</button>   

                        <div class="form-group col-sm-2 flex-column d-flex"> 
                        <button class="btn btn-info">Submit</button>                          
                        </div>                           
                    </div>
                                 
</form>