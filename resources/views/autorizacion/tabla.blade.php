@if ($condicional)



    <table class="table table-striped table-bordered nowrap text-center" id="autorizacion">
        <thead>

            <tr>
                <th>PAIR</th>
                <th>SWAP SHORT</th>
                <th>SWAP LONG</th>
                <th>LOTAGE</th>
                <th>ACCIONES</th>
               
            </tr>
        </thead>
        <tbody>
            @php
               
                
                $i = 0;
                $monedas = [
                    'EURUSD' => $EURUSD,
                    'GBPUSD' => $GBPUSD,
                    'AUDUSD' => $AUDUSD,
                    'NZDUSD' => $NZDUSD,
                    'USDCAD' => $USDCAD,
                    'USDCHF' => $USDCHF,
                    'USDJPY' => $USDJPY,
                    'EURGBP' => $EURGBP,
                    'EURAUD' => $EURAUD,
                    'EURNZD' => $EURNZD,
                    'GBPAUD' => $GBPAUD,
                    'GBPNZD' => $GBPNZD,
                    'AUDNZD' => $AUDNZD,
                    'EURCAD' => $EURCAD,
                    'EURCHF' => $EURCHF,
                    'EURJPY' => $EURJPY,
                    'GBPCAD' => $GBPCAD,
                    'GBPCHF' => $GBPCHF,
                    'GBPJPY' => $GBPJPY,
                    'AUDCAD' => $AUDCAD,
                    'AUDCHF' => $AUDCHF,
                    'AUDJPY' => $AUDJPY,
                    'NZDCAD' => $NZDCAD,
                    'NZDCHF' => $NZDCHF,
                    'NZDJPY' => $NZDJPY,
                    'CADCHF' => $CADCHF,
                    'CADJPY' => $CADJPY,
                    'CHFJPY' => $CHFJPY,
                ];
                
            @endphp
                    

            @foreach ($autorizaciones8a as $autorizacion)
            @php
            //     if ($autorizacion->action == 0) {
            //         $btnclassnothing = 'btn btn-success';
            //     }
            // if ($autorizacion->action == 1) {
            //         $btnclassbuy = 'btn btn-success';
            //     }
            //     if ($autorizacion->action == 2) {
            //         $btnclasssell = 'btn btn-success';
            //     }
            // if ($autorizacion->action == 3) {
            //         $btnclassbuy_sell = 'btn btn-primary';
            //     }
            //     else{
                
            //         $btnclassnothing = 'btn btn-secondary';
            //         $btnclassbuy = 'btn btn-secondary';
            //         $btnclasssell = 'btn btn-secondary';
            //         $btnclassbuy_sell = 'btn btn-secondary';
            //     } 
        @endphp
                <tr>
                    <td data-priority="0" scope="col">{{ $autorizacion->symbol }}</td>

                    @foreach ($monedas as $key => $value)
                        @if ($key == $autorizacion->symbol)
                            @php
                                $i++;

                                $swapshort = str_replace(",", ".", $value[0]->swapshort);
                               $swaplong = str_replace(",", ".", $value[0]->swaplong);
                            @endphp
                            <td data-priority="0" scope="col">{{ number_format($swapshort,2) }}</td>
                            <td data-priority="0" scope="col">{{ number_format($swaplong,2) }}</td>
                        @endif
                    @endforeach
                    <td data-priority="0" scope="col">{{ $autorizacion->lotage }}</td>


                    <td>
                      
                        <a href="" data-id="{{ $autorizacion->id }}" type="button"
                            title="{{ $autorizacion->id }}" class="btn {{ $autorizacion->action == 0 ? 'btn-success' : 'btn-secondary' }} btn-sm btn-icon nothing" id="nothing">N</a>
                        <a href="" data-id="{{ $autorizacion->id }}" type="button"
                            title="{{ $autorizacion->id }}" class="btn {{ $autorizacion->action == 1 ? 'btn-success' : 'btn-secondary' }} btn-sm btn-icon buy" id="buy">C</a>

                        <a href="" data-id="{{ $autorizacion->id }}" type="button"
                            title="{{ $autorizacion->id }}" class="btn {{ $autorizacion->action == 2 ? 'btn-success' : 'btn-secondary' }} btn-sm btn-icon sell" id="sell">V</a>

                        <a href="" data-id="{{ $autorizacion->id }}" type="button"
                            title="{{ $autorizacion->id }}" class="btn {{ $autorizacion->action == 3 ? 'btn-success' : 'btn-secondary' }} btn-sm btn-icon buy_sell" id="buy_sell">CyV</a>

                    </td>

                 
                    
                </tr>

                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="#fff" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
            <use xlink:href="#info-fill" />
        </svg>
        <div>
            No se encontró ningún registro
        </div>
    </div>
@endif
