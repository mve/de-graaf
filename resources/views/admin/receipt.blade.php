
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>Faktuur</title>
    <style>
    </style>
</head>
<body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic);
    /** GLOBAL **/

    html, body {
        height: 100%;
        /*background: #002336;*/
        width: 100%;
        margin: 0;
        padding: 0;
        left: 0;
        top: 0;
        font-size: 100%;
    }
    * {
        font-family: "Lato", "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        color: #333447;
        line-height: 1.5;
    }
    /* TYPOGRAPHY */

    h1 {
        font-size: 2.5rem;
    }
    h2 {
        font-size: 2rem;
    }
    h3 {
        font-size: 1.375rem;
    }
    h4 {
        font-size: 1.125rem;
    }
    h5 {
        font-size: 1rem;
    }
    h6 {
        font-size: 0.875rem;
    }
    p {
        font-size: 1.125rem;
        font-weight: 200;
        line-height: 1.8;
    }
    .font-light {
        font-weight: 300;
    }
    .font-regular {
        font-weight: 400;
    }
    .font-heavy {
        font-weight: 700;
    }
    /* POSITIONING */

    .left {
        text-align: left;
    }
    .right {
        float: right;
        text-align: right;
    }
    .center {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
    .justify {
        text-align: justify;
    }
    /** standard padding**/

    .no-padding {
        padding: 0px;
    }
    .standard-padding {
        padding: 20px;
    }
    .standard-padding-right {
        padding-right: 20px;
    }
    .standard-padding-left {
        padding-left: 20px;
    }
    .standard-padding-right {
        padding-left: 20px;
    }
    .btn {
        background-color: DodgerBlue;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
    }

    /* Darker background on mouse-over */
    .btn:hover {
        background-color: RoyalBlue;
    }
    .standard-padding-top {
        padding-top: 20px;
    }
    .standard-padding-bottom {
        padding-bottom: 20px;
    }
    .container {
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }
    .row {
        position: relative;
        width: 100%;
    }
    .row [class^="col"] {
        float: left;
        margin: 0.5rem 2%;
        min-height: 0.125rem;
    }
    .container {
        width: 90%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    .row::after {
        content: "";
        display: table;
        clear: both;
    }
    .hidden-sm {
        display: none;
    }

    .title {
        margin-bottom: 0px;
        padding-bottom: 0px;
        margin-left: 10px;
        margin-right: 10px;
        font-weight: bold;
        border-bottom: 1px solid #8B8B8B;
        margin-bottom: 4px;
    }
    .infoblock {
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 0px;
        padding-top: 0px;
    }
    .titles {
        padding-top: 4px;
        margin-top: 20px;
        background: #DCDCDC;
        font-weight: bold;
    }
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    /** RTL **/

    .rtl {
        direction: rtl;
        font-family: "Lato", Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }
    .rtl table {
        text-align: right;
    }
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .eqWrap {
        display: flex;
    }
    .eq {
        padding: 10px;
    }
    .item:nth-of-type(odd) {
        background: #F9F9F9;
    }
    .item:nth-of-type(even) {
        background: #fff;
    }
    .equalHW {
        flex: 1;
    }
    .equalHM {
        width: 32%;
    }
    .equalHMR {
        width: 32%;
        margin-bottom: 2%;
    }
    table.table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    .table th, .table td {
        text-align: left;
        padding: 0.25em;
    }
    .table tr {
        border-bottom: 1px solid #DDD;
    }
    button:hover {
        box-shadow: 0 0 4px rgba(3, 3, 3, 0.8);
        opacity: 0.9;
    }
</style>

    <div class="container">
        <div class="row">
            <div class="equalHWrap eqWrap top">
                @if(!$isPdf)
                    <a href="/beheer/reserveringen"><button class="btn"> back</button></a>
                <a href="/beheer/reservering/nota/download/{{$receipt->id}}"><button class="btn"> Download</button></a>
                @endif
                <div class="equalHW eq contact-info-block">
                    <span id="AccountEmail">infomaildegraaf@gmail.nl</span><br>
                    <span id="AccountPhone">047 226 47 280</span>
                </div>
                <div class="equalHW eq title-block">
                    <h2 class="right no-padding" id="InvoiceSumExVat" style="margin:0px;">FACTUUR</h2>
                </div>
            </div>
            <div class="row" style="margin-top:20px;">

                <div class="row">
                    <div class="equalHWrap eqWrap">
                        <div class="equalHW eq infoblock to-block">
                            <span id="CustomerName"><b>Restaurant de Graaf</b></span><br>
                            <span id="CustomerName"><b>Maastricht</b></span><br>
                            <span id="CustomerName"><b>1234BB, JF-kennedylaan 32</b></span><br>

                        </div>
                    </div>
                </div>
                <table class="table">
                    <tr class="titles">
                        <th>Aantal</th>
                        <th>Naam</th>
                        <th>Prijs</th>
                        <th>Totaal</th>
                    </tr>
                    @php $total= 0 @endphp
                    @foreach($receipt->orders as $order)
                    <tr class="item">
                        <td><span id="ProuductName">{{$order->quantity}}<span></span></span></td>
                        <td><span id="ProductNumUnits"><span>{{$order->product->name}}</span></span></td>
                        <td><span id="ProductUnit"><span>€{{$order->product->price}}</span></span></td>
                        <td><span id="ProductUnitPrice">€{{$order->quantity*$order->product->price}}</span></td>
                                @php $total+=$order->quantity*$order->product->price @endphp

                    </tr>
                        @endforeach



                </table>
            </div>
            <div class="row">
                <div class="equalHWrap eqWrap">
                    <div class="equalHW eq">
                        <table class="right">
                            <tr>
                                <td><span style="display:inline-block;margin-right:10px;"><strong>Subtotaal:</strong></span></td>
                                <td><span id="InvoceTotalVat">€{{$total}}</span> <br></td>
                            </tr>
                            <tr>
                                @php $totalbtw = $total*0.21 @endphp
                                <td><span style="display:inline-block;margin-right:10px;"><strong>Te betalen BTW:</strong></span></td>
                                <td><span id="ProductCost">€{{$totalbtw}}</span> </td>
                            </tr>
                            <tr>
                                <td><span style="display:inline-block;margin-right:10px;"><strong>Totaalprijs:</strong></span></td>
                                <td><span id="ProductCost">€{{$total+$totalbtw}}</span> </td>
                            </tr>
                            <tr>
                                <td><span style="display:inline-block;margin-right:10px;"><strong>Betaald:</strong></span></td>
                                <td><span id="ProductCost">€{{$receipt->amount_recieved}}</span> </td>
                            </tr>
                            <tr>
                                <td><span style="display:inline-block;margin-right:10px;"><strong>Nog te voldoen:</strong></span></td>
                                <td><span id="ProductCost">€{{$total+$totalbtw-$receipt->amount_recieved}}</span> </td>
                            </tr>
                            <tr>
                                <td><span style="display:inline-block;margin-right:10px;"><strong>Betaalwijze:</strong></span></td>
                                <td><span id="ProductCost">{{$receipt->payment}}</span> </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
