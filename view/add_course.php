<div class="col d-flex justify-content-center">
    <h2>Course Details</h2>
</div>

<form action="/save_course" method="post">
<input type="hidden" value="<?=$course->id ?? 0?>" name="course_id"/>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Course Name*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control mandotry" value="<?=$course->course_name ?? ''?>" name="course_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Course Details</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description"><?=$course->course_details ?? 0?></textarea>
        </div>
    </div>      
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary submit">Submit</button>
        </div>
    </div>
</form>