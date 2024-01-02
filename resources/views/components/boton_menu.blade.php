@props(['nombreIcono'=>'','nombre'=>''])
<button {{$attributes->merge(['class'=>'btn btn-sm col-1 mx-3 mb-0'])}}>
    <i class="{{$nombreIcono}} text-sm d-flex justify-content-center opacity-10" aria-hidden="true"></i>
    {{$nombre}}
</button>

