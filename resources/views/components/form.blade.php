<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-2 mb-3 fs-2">{{$title}}</h4>
    <!-- Multi Column with Form Separator -->
        <div class="text-sm-start text-center ps-sm-0">
           {{$button}}
        </div>
    <div class="card mb-4">

        <form class="card-body row" {{$attributes }} method="POST" enctype="multipart/form-data">
            @csrf
            {{$formInput}}



            <div class="pt-4">
                <button type="submit" class="btn text-white me-sm-3 me-1" onclick="this.disabled=true; this.form.submit();"
                style="background-color: #0077b6;">{{$action}}</button>
                <a href="{{ $route }}" type="button" class="btn btn-outline-secondary" style="border-color: #aaa; ">الغاء</a>
            </div>
        </form>
    </div>
</div>
