<a href="#" class="apertura" data-moneda="{{ $moneda }}" data-type="{{ $type }}" data-valor="{{ $valor }}" data-sl="{{ $sl }}" data-tp="{{ $tp }}" data-profit="{{ $profit }}" data-risk="{{ $risk }}" title="aperturar">
    <span 
        class="
            badge 
            @if ($ratio < 3)
                bg-danger    
            @elseif ($ratio >= 3 && $ratio < 4)
                bg-warning 
            @elseif ($ratio >= 4 && $ratio < 5)
                bg-success 
            @elseif ($ratio >= 5)
                bg-primary 
            @endif            
            py-2 px-3">
            {{ $ratio }}
    </span>
</a>