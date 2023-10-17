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
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $user)
            @if($user->archived == 1)
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
                        <form action="{{ route('account.restoreAccount', $user->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-success ms-2">
                                <span class="bi bi-recycle"></span> Restore
                            </button>
                        </form>
                    </div>
                </td>
            <tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>