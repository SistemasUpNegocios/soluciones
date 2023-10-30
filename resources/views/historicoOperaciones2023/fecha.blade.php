{{ 
    // Muestra datos con fecha y hora
    // ucfirst(Carbon\Carbon::parse($time_open)->formatLocalized('%x %T'))
    
    // Muestra datos con fecha
     ucfirst(Carbon\Carbon::parse($time_open)->format('d/m/Y'))
}}