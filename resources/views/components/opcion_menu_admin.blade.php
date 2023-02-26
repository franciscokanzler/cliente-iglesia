@props(['modulo','dato'])
<div {{$attributes->merge(['class'=>'col-10 col-sm-6 col-md-5 col-lg-3 col-xl-3 mx-lg-4 px-md-4 px-lg-4 px-xl-4 px-xxl-4'])}}>
    <div class="card" style="background-color: #d2c6c18f;">
        <div class="card-header mx-4 p-3 text-center" style="background-color: #e3dcd9;">
            {{$boton}}
        </div>
        <div class="card-body pt-0 p-3 text-center">
            <h6 class="text-center mb-0">{{$modulo}}</h6>
            <hr class="horizontal dark my-2">
            <span class="text-xs">{{$dato}}</span>
            {{-- <h5 class="mb-0">{{$dato}}</h5> --}}
            <a href="#" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                <i class="fa-solid fa-magnifying-glass" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
            </a>
        </div>
    </div>
</div>

