@extends('layout.app')
@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">{{ $title }}</h4>
						</div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <a href="/invoice" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                                <a href="/invoice/print/{{ $data_invoice->id }}" target="_blank" class="btn btn-default ml-auto"><i class="fa fa-print"></i> Print</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Service</th>
                                            <th>Qty</th>
                                            <th>UoM</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                        @foreach($data_invoice_detil as $invoice_detil)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $invoice_detil->service->desc }}</td>
                                            <td>{{ $invoice_detil->qty }}</td>
                                            <td>{{ $invoice_detil->uom->desc }}</td>
                                            <td>Rp {{ number_format($invoice_detil->price) }}</td>
                                            <td>Rp {{ number_format($invoice_detil->total) }}</td>
                                        </tr>
                                        @endforeach  
                                        <tr>
                                            <th colspan="5">Total Payment</th>
                                            <td>
                                                Rp {{ number_format($data_invoice->total) }}
                                            </td>                                
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                        <label>Id</label>
                                        <input id="invoice_id" type="text" name="invoice_id" class="form-control" value="{{ $data_invoice->id }}" readonly required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                        <label>Date</label>
                                        <input id="invoice_date" type="text" name="invoice_date" class="form-control" value="{{ date('d/m/Y',strtotime($data_invoice->invoice_date)) }}" readonly required>
                                    </div>
                                </div>
                            </div>	
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                        <label>Invoice</label>
                                        <div class="input-group">
                                            <input id="customer" type="text" name="customer" class="form-control " placeholder="Fill Customer" value="{{ $data_invoice->customer->id.' - '.$data_invoice->customer->name }}" autoComplete="off" 
                                                style="pointer-events: none" readonly required>
                                            <div class="input-group-apend my-auto">
                                                <a href="#" class="btn btn-link text-dark p-0" type="button" >
                                                    <i class="fa fa-search"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                        <label>Status</label>
                                        <select class="form-control" id="status" name="status" readonly required>
                                            <option value="{{ $data_invoice->status }}">{{ ucwords($data_invoice->status) }}</option>
                                        </select>
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

@endsection
