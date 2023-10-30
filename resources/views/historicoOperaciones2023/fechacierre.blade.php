{{ 
    // Muestra datos con fecha y hora
    // ucfirst(Carbon\Carbon::parse($time_close)->formatLocalized('%x %T'))
    
    // Muestra datos con fecha
     ucfirst(Carbon\Carbon::parse($time_close)->format('d/m/Y'))
}}