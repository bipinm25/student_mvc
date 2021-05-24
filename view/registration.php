<div class="col d-flex justify-content-center">
    <h2>Student Details</h2>
</div>

<form action="/submit_registration" method="post">
<input type="hidden" value="<?=$student->id ?? 0?>" name="student_id"/>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">First Name*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control mandotry" value="<?=$student->first_name ?? ''?>" name="first_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Last Name*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control mandotry" value="<?=$student->last_name ?? ''?>" name="last_name">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">DOB</label>
        <div class="col-sm-10">
            <input type="text" class="form-control datepicker" value="<?=date('d-m-Y', strtotime(empty($student->dob ?? '')?date('Y-m-d') : $student->dob))?>" name="dob" autocomplete="off">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Contact No*</label>
        <div class="col-sm-10">
            <input type="text" class="form-control mandotry" value="<?=$student->contact_no ?? ''?>"  name="contact_no">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary submit">Submit</button>
        </div>
    </div>
</form>

