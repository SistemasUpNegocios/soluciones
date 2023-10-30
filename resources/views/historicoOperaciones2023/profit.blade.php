



@if($profit > 0)

    <div style="width: 100%; height: 100%;" class="bg-success text-white">

        {{ number_format($profit,2) }}

    </div>

@elseif($profit < 0)

<div style="width: 100%; height: 100%;" class="bg-danger text-white">

    {{ number_format($profit,2) }}

</div>

@endif