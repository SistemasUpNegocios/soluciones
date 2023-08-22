{{-- @php
    $precio = str_replace(",", ".", $price);
@endphp --}}

@if($price <= $rab && $price > $rb)
    <div style="width: 100%; height: 100%;" class="bg-primary text-white">
        {{ $rab }}
    </div>
@else
    {{ $rab }}
@endif