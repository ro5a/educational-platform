@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <p class="mb-0"> {{ session()->get('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <p class="mb-0"> {{ session()->get('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
