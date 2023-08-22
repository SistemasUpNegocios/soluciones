{{-- @php
    $precio = str_replace(",", ".", $price);
@endphp --}}

@if($price <= $rb && $price > $sb)
    <div style="width: 100%; height: 100%;" class="bg-primary text-white">
        {{ $rb }}
    </div>
@else
    {{ $rb }}
@endif