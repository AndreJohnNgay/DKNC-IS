<form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="modal fade" id="updateProfileModal{{ Auth::user()->id }}" tabindex="-1"
        aria-labelledby="updateProfileModal{{ Auth::user()->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-wheat">
                    <h1 class="modal-title fs-5" id="updateProfileModal{{ Auth::user()->id }}Label">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-linen">
                    <form action="{{ route('account.update', Auth::user()->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @include('components.cards.account.updatePersonalInfoCard')
                    </form>

                    <form action="{{ route('account.updatePassword', Auth::user()->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        @include('components.cards.account.updatePasswordCard')
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>