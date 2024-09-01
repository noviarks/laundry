<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <style>
        body{
            -webkit-print-color-adjust:exact !important;
            print-color-adjust:exact !important;
        }
        
        @media print {
            #print {
                display: none;
            }
        }
        
        .card{
            width: 9cm;
            height: 5.5cm;
            background-image: linear-gradient(to right top, #36a3f7, #8cb6fa, #beccfb, #e3e4fc, #ffffff);
        }

        .card-header{
            background: none;
            border-bottom: none;
        }

        hr{
            border: 2px solid #000;
        }

  </style>
</head>
<body> 
 
<div class="container p-0 m-0">
 
    <div class="card">
        <div class="card-header text-center p-0">
            <h2>{{ $title }}</h2>
            <h5>Card Member</h5>
        </div>
        <div class="card-body p-2">
            <form>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label pr-0">ID</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" value="{{ $data_customer->id }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label pr-0">Name</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" value="{{ $data_customer->name }}">
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center mt-2">
            <button id="print" type="button" class="btn btn-dark" onClick="window.print();">Print</button>
        </div>
    </div>
  </div>
</div>

</body>
</html>
