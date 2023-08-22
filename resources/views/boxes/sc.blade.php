{{-- @php
    $precio = str_replace(",", ".", $price);
@endphp --}}

@if($price <= $sbc && $price > $sc)
    <div style="width: 100%; height: 100%;" class="bg-primary text-white">
        {{ $sc }}
    </div>
@else
    {{ $sc }}
@endif