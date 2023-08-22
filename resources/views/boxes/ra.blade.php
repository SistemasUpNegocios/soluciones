{{-- @php
    $precio = str_replace(",", ".", $price);
@endphp --}}

@if($price <= $ra && $price > $rab)
    <div style="width: 100%; height: 100%;" class="bg-primary text-white">
        {{ $ra }}
    </div>
@else
    {{ $ra }}
@endif