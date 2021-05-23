<div class="col d-flex justify-content-center">
    <h2>Student Details</h2>
</div>

<form action="/submit_registration" method="post">
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="first_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="last_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">DOB</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="dob">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Contact No</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="contact_no">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

