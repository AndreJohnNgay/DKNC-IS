<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Address</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Emergency Contact</th>
                <th scope="col">Email Address</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->contact_number }}</td>
                <td>{{ $user->emergency_contact }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-success ms-2" data-bs-toggle="modal"
                            data-bs-target="#updateAccountModal{{ $user->id }}">
                            <span class="bi bi-pencil-square"></span> Update
                        </button>
                        <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                            data-bs-target="#deleteAccountModal{{ $user->id }}"><span class="bi bi-trash3-fill"></span>
                            Delete
                        </button>
                    </div>
                </td>
            <tr>
                @endforeach
        </tbody>
    </table>
</div>