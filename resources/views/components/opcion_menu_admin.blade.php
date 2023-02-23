@props(['modulo','dato'])
<div {{$attributes->merge(['class'=>'col-md-6 col-lg-6 px-md-4 px-lg-4 px-xl-6 px-xxl-10'])}}>
    <div class="card">
        <div class="card-header mx-4 p-3 text-center">
            {{$boton}}
        </div>
        <div class="card-body pt-0 p-3 text-center">
            <h6 class="text-center mb-0">{{$modulo}}</h6>
            <hr class="horizontal dark my-2">
            <span class="text-xs">{{$dato}}</span>
            {{-- <h5 class="mb-0">{{$dato}}</h5> --}}
        </div>
    </div>
</div>
