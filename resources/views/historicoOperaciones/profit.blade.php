

@if($profit > 0)
    <div style="width: 100%; height: 100%;" class="bg-success text-white">
        {{ $profit}}
    </div>
@elseif($profit < 0)
<div style="width: 100%; height: 100%;" class="bg-danger text-white">
    {{ $profit}}
</div>
@endif