<table class="table table-striped table-bordered nowrap text-center" id="status">
    <thead>
        <tr>
            <th>PAIR</th>
            <th>MARKET</th>
            <th>DIRECTION</th>
            <th>SHOT</th>
            <th>FECHA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td data-priority="0" scope="col">EURUSD</td>
            <td data-priority="0" scope="col">{{$eurusd->market}}</td>
            <td data-priority="0" scope="col">{{$eurusd->direction}}</td>
            <td data-priority="0" scope="col">{{$eurusd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($eurusd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">GBPUSD</td>
            <td data-priority="0" scope="col">{{$gbpusd->market}}</td>
            <td data-priority="0" scope="col">{{$gbpusd->direction}}</td>
            <td data-priority="0" scope="col">{{$gbpusd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($gbpusd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">AUDUSD</td>
            <td data-priority="0" scope="col">{{$audusd->market}}</td>
            <td data-priority="0" scope="col">{{$audusd->direction}}</td>
            <td data-priority="0" scope="col">{{$audusd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($audusd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">NZDUSD</td>
            <td data-priority="0" scope="col">{{$nzdusd->market}}</td>
            <td data-priority="0" scope="col">{{$nzdusd->direction}}</td>
            <td data-priority="0" scope="col">{{$nzdusd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($nzdusd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">USDCAD</td>
            <td data-priority="0" scope="col">{{$usdcad->market}}</td>
            <td data-priority="0" scope="col">{{$usdcad->direction}}</td>
            <td data-priority="0" scope="col">{{$usdcad->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($usdcad->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">USDCHF</td>
            <td data-priority="0" scope="col">{{$usdchf->market}}</td>
            <td data-priority="0" scope="col">{{$usdchf->direction}}</td>
            <td data-priority="0" scope="col">{{$usdchf->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($usdchf->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">USDJPY</td>
            <td data-priority="0" scope="col">{{$usdjpy->market}}</td>
            <td data-priority="0" scope="col">{{$usdjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$usdjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($usdjpy->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">EURGBP</td>
            <td data-priority="0" scope="col">{{$eurgbp->market}}</td>
            <td data-priority="0" scope="col">{{$eurgbp->direction}}</td>
            <td data-priority="0" scope="col">{{$eurgbp->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($eurgbp->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">EURAUD</td>
            <td data-priority="0" scope="col">{{$euraud->market}}</td>
            <td data-priority="0" scope="col">{{$euraud->direction}}</td>
            <td data-priority="0" scope="col">{{$euraud->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($euraud->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">EURNZD</td>
            <td data-priority="0" scope="col">{{$eurnzd->market}}</td>
            <td data-priority="0" scope="col">{{$eurnzd->direction}}</td>
            <td data-priority="0" scope="col">{{$eurnzd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($eurnzd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">GBPAUD</td>
            <td data-priority="0" scope="col">{{$gbpaud->market}}</td>
            <td data-priority="0" scope="col">{{$gbpaud->direction}}</td>
            <td data-priority="0" scope="col">{{$gbpaud->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($gbpaud->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">GBPNZD</td>
            <td data-priority="0" scope="col">{{$gbpnzd->market}}</td>
            <td data-priority="0" scope="col">{{$gbpnzd->direction}}</td>
            <td data-priority="0" scope="col">{{$gbpnzd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($gbpnzd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">AUDNZD</td>
            <td data-priority="0" scope="col">{{$audnzd->market}}</td>
            <td data-priority="0" scope="col">{{$audnzd->direction}}</td>
            <td data-priority="0" scope="col">{{$audnzd->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($audnzd->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">EURCAD</td>
            <td data-priority="0" scope="col">{{$eurcad->market}}</td>
            <td data-priority="0" scope="col">{{$eurcad->direction}}</td>
            <td data-priority="0" scope="col">{{$eurcad->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($eurcad->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">EURCHF</td>
            <td data-priority="0" scope="col">{{$eurchf->market}}</td>
            <td data-priority="0" scope="col">{{$eurchf->direction}}</td>
            <td data-priority="0" scope="col">{{$eurchf->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($eurchf->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">EURJPY</td>
            <td data-priority="0" scope="col">{{$eurjpy->market}}</td>
            <td data-priority="0" scope="col">{{$eurjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$eurjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($eurjpy->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">GBPCAD</td>
            <td data-priority="0" scope="col">{{$gbpcad->market}}</td>
            <td data-priority="0" scope="col">{{$gbpcad->direction}}</td>
            <td data-priority="0" scope="col">{{$gbpcad->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($gbpcad->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">GBPCHF</td>
            <td data-priority="0" scope="col">{{$gbpchf->market}}</td>
            <td data-priority="0" scope="col">{{$gbpchf->direction}}</td>
            <td data-priority="0" scope="col">{{$gbpchf->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($gbpchf->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">GBPJPY</td>
            <td data-priority="0" scope="col">{{$gbpjpy->market}}</td>
            <td data-priority="0" scope="col">{{$gbpjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$gbpjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($gbpjpy->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">AUDCAD</td>
            <td data-priority="0" scope="col">{{$audcad->market}}</td>
            <td data-priority="0" scope="col">{{$audcad->direction}}</td>
            <td data-priority="0" scope="col">{{$audcad->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($audcad->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">AUDCHF</td>
            <td data-priority="0" scope="col">{{$audchf->market}}</td>
            <td data-priority="0" scope="col">{{$audchf->direction}}</td>
            <td data-priority="0" scope="col">{{$audchf->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($audchf->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">AUDJPY</td>
            <td data-priority="0" scope="col">{{$audjpy->market}}</td>
            <td data-priority="0" scope="col">{{$audjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$audjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($audjpy->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">NZDCAD</td>
            <td data-priority="0" scope="col">{{$nzdcad->market}}</td>
            <td data-priority="0" scope="col">{{$nzdcad->direction}}</td>
            <td data-priority="0" scope="col">{{$nzdcad->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($nzdcad->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">NZDCHF</td>
            <td data-priority="0" scope="col">{{$nzdchf->market}}</td>
            <td data-priority="0" scope="col">{{$nzdchf->direction}}</td>
            <td data-priority="0" scope="col">{{$nzdchf->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($nzdchf->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">NZDJPY</td>
            <td data-priority="0" scope="col">{{$nzdjpy->market}}</td>
            <td data-priority="0" scope="col">{{$nzdjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$nzdjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($nzdjpy->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">CADCHF</td>
            <td data-priority="0" scope="col">{{$cadchf->market}}</td>
            <td data-priority="0" scope="col">{{$cadchf->direction}}</td>
            <td data-priority="0" scope="col">{{$cadchf->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($cadchf->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">CADJPY</td>
            <td data-priority="0" scope="col">{{$cadjpy->market}}</td>
            <td data-priority="0" scope="col">{{$cadjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$cadjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($cadjpy->fecha)->diffForHumans())}}</td>
        </tr>
        <tr>
            <td data-priority="0" scope="col">CHFJPY</td>
            <td data-priority="0" scope="col">{{$chfjpy->market}}</td>
            <td data-priority="0" scope="col">{{$chfjpy->direction}}</td>
            <td data-priority="0" scope="col">{{$chfjpy->shot}}</td>
            <td data-priority="0" scope="col">{{ucfirst(Carbon\Carbon::parse($chfjpy->fecha)->diffForHumans())}}</td>
        </tr>
    </tbody>
</table>