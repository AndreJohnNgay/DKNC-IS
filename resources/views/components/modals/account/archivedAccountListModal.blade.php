<div class="modal fade" id="archivedAccountListModal" tabindex="-1"
    aria-labelledby="archivedAccountListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-wheat">
                <h1 class="modal-title fs-5" id="archivedAccountListModalLabel">Restore Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('components.tables.archivedAccountsTable')
            </div>
        </div>
    </div>
</div>
