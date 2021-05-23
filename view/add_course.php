<div class="col d-flex justify-content-center">
    <h2>Course Details</h2>
</div>

<form action="/save_course" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Course Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="course_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Course Details</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description"></textarea>
        </div>
    </div>      
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>