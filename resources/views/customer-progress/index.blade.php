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
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Progress</th>
                                            <th>User</th>
											<th style="width: 20%">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($data_customer_progress as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{ $row->invoice->id }}</td>
                                            <td>{{ $row->invoice->customer->name }}</td>
                                            <td>{{ $row->progress->desc }}</td>
                                            <td>{{ ucwords($row->user->name) }}</td>
											<td>
												<a href="#modalDelete{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i> Delete
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
            <form method="POST" action="/customer-progress/store">
                @csrf
                <div class="modal-body">				
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Invoice</label>
                                <div class="input-group">
                                    <input id="invoice" type="text" name="invoice" class="form-control" placeholder="Fill Invoice" 
                                        autoComplete="off"  style="pointer-events: none" required>
                                    <div class="input-group-apend my-auto">
                                        <a href="#modalSearchInvoice" data-toggle="modal"  class="btn btn-link text-dark p-0" type="button" >
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Progress</label>
                                <select class="form-control" id="progress" name="progress" required>
                                    <option value="" hidden>-- Choose Progress --</option>
                                    @foreach($data_progress as $progress)
                                    <option value="{{ $progress->id }}">{{  $progress->desc }}</option>
                                    @endforeach
                                </select>
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

@foreach($data_customer_progress as $row_delete)
<div class="modal fade" id="modalDelete{{ $row_delete->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
            <form method="GET" action="/customer-progress/delete/{{ $row_delete->id }}">
                @csrf
                <div class="modal-body">		
                    <div class="form-group pl-0">
                        <h5>Are You Sure Want To Delete This ?</h5>
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
                                    <button type="button" class="btn btn-sm btn-default choose-invoice" data-params="{{ $invoice->id.' - '.$invoice->customer->name }}">
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

@push('customer_progress_script')
<script type="text/javascript">    
    $(document).ready(function(){
        $('#add-invoice').DataTable({
            order:[],
            pageLength: 5,
            bLengthChange: false
        });

        $('#add-invoice tbody').on('click', '.choose-invoice', function () {
            var data = $(this).data('params');
            $('#invoice').val(data);
            $('#modalSearchInvoice').modal('toggle');
        });
    });
</script>
@endpush