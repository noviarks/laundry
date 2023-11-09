<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title></title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
        <link rel="icon" href="/assets/img/icon.ico" type="image/x-icon"/>
        
        <!-- Fonts and icons -->
        <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Open+Sans:300,400,600,700"]},
                custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!-- CSS Files -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/azzara.min.css">
        <style>
            .table tbody tr.no-border td {
                border: none;
            }
            @media print {
                #print {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <div class="content">
            <div class="page-inner p-0">
                <div class="row justify-content-center">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-invoice">
                                    <div class="card-header text-center">
                                        <div class="invoice-header">
                                            <h1 class="invoice-title">
                                                <strong>{{ $title }}</strong>
                                            </h1>
                                            <h2 class="invoice-title">
                                               Laundry
                                            </h2>
                                        </div>
                                        <div class="invoice-desc">
                                            Jln Raya Bypass Krian No.33 Sidoarjo<br/>
                                            Telp 0321090928
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 info-invoice">
                                                <h5 class="sub"><strong>Date</strong></h5>
                                                <p>{{ date('d/m/Y',strtotime($data_invoice->invoice_date)) }}</p>
                                            </div>
                                            <div class="col-md-4 info-invoice">
                                                <h5 class="sub"><strong>Invoice ID</strong></h5>
                                                <p>{{ $data_invoice->id }}</p>
                                            </div>
                                            <div class="col-md-4 info-invoice">
                                                <h5 class="sub"><strong>Invoice To</strong></h5>
                                                <p>
                                                {{ $data_invoice->customer->name }}<br/>{{ $data_invoice->customer->address }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="invoice-detail">
                                                    <div class="invoice-top">
                                                        <h3 class="title"><strong>Order Service</strong></h3>
                                                    </div>
                                                    <div class="invoice-item">
                                                        <div class="table-responsive">
                                                            <table class="table table-border">
                                                                <thead>
                                                                    <tr>
                                                                        <td class="text-center"  style="width: 10%"><strong>No</strong></td>
                                                                        <td class="text-center"><strong>Service</strong></td>
                                                                        <td class="text-center"><strong>Qty</strong></td>
                                                                        <td class="text-center"><strong>UoM</strong></td>
                                                                        <td class="text-center"><strong>Price</strong></td>
                                                                        <td class="text-right"><strong>Total Price</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $no = 1;
                                                                    @endphp

                                                                    @foreach($data_invoice_detil as $row)
                                                                    <tr>
                                                                        <td  class="text-center" style="width: 10%">{{ $no++ }}</td>
                                                                        <td class="text-center">{{ $row->service->desc }}</td>
                                                                        <td class="text-center">{{ $row->qty }}</td>
                                                                        <td class="text-center">{{ $row->uom->desc }}</td>
                                                                        <td class="text-center">{{ $row->price }}</td>
                                                                        <td class="text-right">{{ $row->total }}</td>
                                                                    </tr>
                                                                    @endforeach

                                                                    <tr class="no-border">
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td class="text-center"><strong>Total Payment</strong></td>
                                                                        <td class="text-right">{{ $data_invoice->total }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>	
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-12">
                                            <p><i>*) Bring This Invoice To Take Your Laundry</i></p>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <div class="col-12">
                                                <button id="print" type="button" class="btn btn-dark ml-auto" onClick="window.print();">Print</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>