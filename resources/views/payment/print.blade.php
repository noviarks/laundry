<html>
    <head>
        <title>{{ $title }}</title>
        <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon"/>
        <style>
            @media print {
                #print {
                    display: none;
                }
            }
            #tabel
            {
            font-size:15px;
            border-collapse:collapse;
            }
            #tabel  td
            {
            padding-left:5px;
            border: 1px solid black;
            }

            hr { 
                display: block;
                margin-top: 0.5em;
                margin-bottom: 0.5em;
                margin-left: auto;
                margin-right: auto;
                border-style: inset;
                border-width: 1px;
            }

            #print{
                padding: 0.6rem 1rem;
                font-size: 13px;
                opacity: 1;
                border-radius: 3px;
                color: #fff;
                background-color: #343a40;
                border-color: #343a40;
            }

        </style>
    </head>
    <body style='font-family:tahoma; font-size:8pt;'>
        <center>
            <table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border = '0'>
                <td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
                    <b>LAUNDRY</b></br>Jl. Raya Bypass Krian No. 33, Sidoarjo</span></br>
                    <span style='font-size:14pt;'>Telp. : (0321) 6865431</span><hr>
                    <span style='font-size:12pt'>Id: {{ $data_payment->id }} Time: {{ date('d/m/Y H:m',strtotime($data_payment->created_at)) }} 
                    </span><hr>
                </td>
            </table>
            

            <table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>
                <tr>
                    <td style='text-align:left;' width='10%'>Service</td>
                    <td style='text-align:center;' width='5%'>Qty</td>
                    <td style='text-align:center;' width='5%'>UoM</td>
                    <td style='text-align:right;' width='10%'>Price</td>
                    <td style='text-align:right;' width='15%'>Total Price</td>
                    <tr>
                        <td colspan='5'><hr></td>
                    </tr>
                </tr>
                @foreach($data_invoice_detil as $detail)
                <tr align='center'>
                    <td style='vertical-align:top;text-align:left;'>{{ $detail->service->desc }}</td>
                    <td style='vertical-align:top;text-align:center'>{{ $detail->qty }}</td>
                    <td style='vertical-align:top; text-align:center;'>{{ $detail->uom->desc }}</td>
                    <td style='vertical-align:top; text-align:right;'>{{ $detail->price }}</td>
                    <td style='text-align:right; vertical-align:top'>{{ $detail->total }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan='5'><hr></td>
                </tr>
                <tr>
                    <td colspan = '4'>
                        <div style='text-align:right'>Total Payment : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt;'>{{ number_format($data_invoice->total) }}</td>
                </tr>
                <tr>
                    <td colspan = '4'>
                        <div style='text-align:right; color:black'>Payment : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'>{{ number_format($data_payment->customer_payment) }}</td>
                </tr>
                <tr>
                    <td colspan = '4'>
                        <div style='text-align:right; color:black'>Return : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'>{{ number_format($data_payment->customer_return) }}</td> 
                </tr>
                <tr>
                    <td colspan='5'><hr></td>
                </tr>
            </table>
            
            <table style='width:350; font-size:12pt;margin-top:20px;' cellspacing='2'>
                <tr></br>
                    <td align='center'>****** THANK YOU ******</br></td>
                </tr>
            </table>
                
            <table style='width:350; font-size:12pt;margin-top:10px;' cellspacing='2'>
                <tr></br>
                    <td align='center'>
                        <button id="print" type="button" onClick="window.print();">Print</button></br>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>