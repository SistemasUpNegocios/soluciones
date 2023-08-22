{{-- @php
    $precio = str_replace(",", ".", $price);
@endphp --}}

@if($price <= $sb && $price > $sbc)
    <div style="width: 100%; height: 100%;" class="bg-primary text-white">
        {{ $sbc }}
    </div>
@else
    {{ $sbc }}
@endif