@props(['modulo','dato'])
<div {{$attributes->merge(['class'=>'col-10 col-sm-6 col-md-5 col-lg-3 col-xl-3 mx-lg-4 px-md-4 px-lg-4 px-xl-4 px-xxl-4'])}}>
    <div class="card bg-gradient-marron-oscuro" {{-- style="background-color: #d2c6c18f;" --}}>
        <div class="card-body pt-0 p-3 text-center">
            {{$boton}}
            <h6 class="text-center text-marron text-gradient mb-0">{{$modulo}}</h6>
            <hr class="horizontal dark my-2">
            <span class="text-xs text-marron text-gradient">{{$dato}}</span>
            <a href="#" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                <i class="fa-solid fa-magnifying-glass" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Image"></i>
            </a>
        </div>
    </div>
</div>

