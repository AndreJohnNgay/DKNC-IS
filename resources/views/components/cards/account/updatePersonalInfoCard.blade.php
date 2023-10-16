<div class="card mb-3">
    <h5 class="card-header">Personal Information</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{{ Auth::user()->first_name }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{{ Auth::user()->last_name }}">
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
        </div>

        <div class="form-group mb-3">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="number" class="form-control" maxlength="10" id="contact_number" name="contact_number"
                value="{{ Auth::user()->contact_number }}">
        </div>

        <div class="form-group mb-3">
            <label for="emergency_contact" class="form-label">Emergency Contact Number</label>
            <input type="number" class="form-control" id="emergency_contact" name="emergency_contact"
                value="{{ Auth::user()->emergency_contact }}">
        </div>
    </div>

    <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-success"><span class="bi bi-pencil-square"></span> Save changes</button>
    </div>
</div>