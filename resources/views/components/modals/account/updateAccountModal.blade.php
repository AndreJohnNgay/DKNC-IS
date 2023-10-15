@foreach($users as $user)
<form action="{{ route('account.update', $user->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="updateAccountModal{{ $user->id }}" tabindex="-1" aria-labelledby="updateAccountModal{{ $user->id }}Label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="updateAccountModal{{ $user->id }}Label">Update Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="{{ $user->first_name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $user->last_name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" id="role" name="role">
                            @if($user->role == 'employee')
                            <option value="employee" selected>Employee</option>
                            <option value="owner">Owner</option>
                            @elseif($user->role == 'owner')
                            <option value="employee">Employee</option>
                            <option value="owner" selected>Owner</option>
                            @endif
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="form-group mb-3">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="number" class="form-control" id="contact_number" name="contact_number">
                    </div>

                    <div class="form-group mb-3">
                        <label for="emergency_contact" class="form-label">Emergency Contact Number</label>
                        <input type="number" class="form-control" id="emergency_contact" name="emergency_contact">
                    </div>
                </div>

                <div class="modal-footer bg-wheat">
                    <button type="submit" class="btn btn-success"><span class="bi bi-pencil-square"></span> Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach