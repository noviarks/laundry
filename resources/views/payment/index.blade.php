@extends('layout.app')
@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">{{ $title }}</h4>
								<button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
									<i class="fa fa-plus"></i>
									Create
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Id</th>
											<th>Date</th>
                                            <th>Invoice</th>
											<th>Customer</th>
                                            <th>Total Payment</th>
                                            <th>Payment</th>
                                            <th>Return</th>
                                            <th>User</th>
                                            <th class="text-center">Status</th>
											<th style="width: 20%">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($data_payment as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{ date('d/m/Y',strtotime($row->payment_date)) }}</td>
                                            <td>{{ ucwords($row->invoice->id) }}</td>
											<td>{{ ucwords($row->invoice->customer->name) }}</td>
                                            <td>{{ $row->invoice->total }}</td>
                                            <td>{{ $row->customer_payment }}</td>
                                            <td>{{ $row->customer_return }}</td>
											<td>{{ ucwords($row->user->name) }}</td>
                                            <td class="text-center text-white">
												@if($row->status == "done")
												<div class="bg-success">
												@else
												<div class="bg-danger">
												@endif
												{{ ucwords($row->status) }}
												</div>
												
											</td>
											<td>
                                                @if($row->status == "done")
												<a href="#modalCancel{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-sm">
													<i class="fa fa-times"></i> Cancel
												</a>
                                                @endif
												<a href="/payment/print/{{ $row->id }}" target="_blank" class="btn btn-default btn-sm">
													<i class="fa fa-print"></i> Print
												</a>
											</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h4 class="modal-title">
					<span class="fw-mediumbold">
					Create</span> 
					<span class="fw-light">
						{{ $title }}
					</span>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form method="POST" action="/payment/store">
                @csrf
                <div class="modal-body">				
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                <label>Date</label>
                                <input id="payment_date" type="text" name="payment_date" class="form-control" value="{{ date('d/m/Y') }}" readonly required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Invoice</label>
                                <div class="input-group">
                                    <input id="invoice" type="text" name="invoice" class="form-control locked" placeholder="Fill Invoice" autoComplete="off" 
                                        style="pointer-events: none" required>
                                    <div class="input-group-apend my-auto" >
                                        <a href="#modalSearchInvoice" data-toggle="modal"  class="btn btn-link text-dark p-0" type="button" >
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                <label>Total Payment (Rp)</label>
                                <input id="total_payment" type="number" min="0" name="total_payment" class="form-control locked" placeholder="0" readonly required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Customer Payment (Rp)</label>
                                <input id="customer_payment" type="number" min="0" name="customer_payment" class="form-control" placeholder="0" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                <label>Customer Return (Rp)</label>
                                <input id="customer_return" type="number" min="0" name="customer_return" class="form-control" placeholder="0" readonly required>
                            </div>
                        </div>
                    </div>			
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </form>
		</div>
	</div>
</div>

@foreach($data_payment as $row_cancel)
<div class="modal fade" id="modalCancel{{ $row_cancel->id }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h4 class="modal-title">
					<span class="fw-mediumbold">
					Delete</span> 
					<span class="fw-light">
						{{ $title }}
					</span>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form method="GET" action="/payment/cancel/{{ $row_cancel->id }}">
                @csrf
                <div class="modal-body">		
                    <div class="form-group pl-0">
                        <h5>Are You Sure Want To Cancel This ?</h5>
                    </div>		
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> No</button>
                </div>
            </form>
		</div>
	</div>
</div>
@endforeach

<div class="modal fade bd-example-modal-lg" id="modalSearchInvoice" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h4 class="modal-title">
                    <span class="fw-mediumbold">
                    Search</span> 
                    <span class="fw-light">
                        Invoice
                    </span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">		
                <div class="table-responsive">
                    <table id="add-invoice" class="display table table-striped table-hover" >
                        <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>Total Payment</th>
                                    <th class="text-center">Status</th>
                                    <th style="width: 30%">Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($data_invoice as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ date('d/m/Y',strtotime($invoice->invoice_date)) }}</td>
                                <td>{{ ucwords($invoice->customer->name) }}</td>
                                <td>{{ ucwords($invoice->user->name) }}</td>
                                <td>{{ ucwords($invoice->total) }}</td>
                                <td class="text-center text-white">
                                    @if($invoice->status == "paid")
                                    <div class="bg-success text-white">
                                    @elseif($invoice->status == "unpaid")
                                    <div class="bg-warning">
                                    @else
                                    <div class="bg-danger text-white">
                                    @endif
                                    {{ ucwords($invoice->status) }}
                                    </div>
                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default choose-invoice" 
                                        data-invoice="{{ $invoice->id.' - '.$invoice->customer->name }}" 
                                        data-payment={{ $invoice->total }}>
                                        <i class="fa fa-list"></i> Choose
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>		
            </div>
        </div>
    </div>
</div>
@endsection

@push('payment_script')
<script type="text/javascript">    
    $(document).ready(function(){
        $('#add-invoice').DataTable({
            order:[],
            pageLength: 5,
            bLengthChange: false
        });

        $('#add-invoice tbody').on('click', '.choose-invoice', function () {
            var invoice = $(this).data('invoice');
            var payment = $(this).data('payment');

            $('#invoice').val(invoice);
            $('#total_payment').val(payment);
            $('#modalSearchInvoice').modal('toggle');
        });

        $("#total_payment, #customer_payment, #customer_return").keyup(function(){
            var total_payment       = $("#total_payment").val();
            var customer_payment    = $("#customer_payment").val();
            var customer_return     = parseInt(customer_payment) - parseInt(total_payment);
            $("#customer_return").val(customer_return);
        });
    });
</script>
@endpush