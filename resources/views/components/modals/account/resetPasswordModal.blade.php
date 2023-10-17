<form action="{{ route('account.resetPassword', $user->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="resetPasswordModal{{ $user->id }}"  data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="resetPasswordModal{{ $user->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="resetPasswordModal{{ $user->id }}Label">Reset Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to reset this account's password?
                </div>
                <div class="modal-footer bg-wheat">
                <button type="submit" class="btn btn-success"><span class="bi bi-pencil-square"></span> Reset</button>
                </div>
            </div>
        </div>
    </div>
</form>
