<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"></span> {{ $tableName }}
    </h4>
    <x-messages><x-slot name='type'>info</x-slot></x-messages>

    <div class="card">
        <h5 class="card-header">{{ $button }}</h5>
        <div class="d-flex justify-content-center">
            {{ $pagination }}
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    {{ $tableHead }}
                </thead>
                <tbody class="table-border-bottom-0">
                    {{ $tableBody }}

                </tbody>
            </table>
        </div>
    </div>

    <hr class="my-5">

</div>
