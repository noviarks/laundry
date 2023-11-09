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
								<a href="/invoice/create" class="btn btn-success btn-round ml-auto">
									<i class="fa fa-plus"></i>
									Create
								</a>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
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
                                        @foreach($data_invoice as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{ date('d/m/Y',strtotime($row->invoice_date)) }}</td>
											<td>{{ ucwords($row->customer->name) }}</td>
											<td>{{ ucwords($row->user->name) }}</td>
											<td>{{ ucwords($row->total) }}</td>
											<td class="text-center text-white">
												@if($row->status == "paid")
												<div class="bg-success">
												@elseif($row->status == "unpaid")
												<div class="bg-warning">
												@else
												<div class="bg-danger">
												@endif
												{{ ucwords($row->status) }}
												</div>
												
											</td>
											<td>
												<a href="/invoice/detil/{{ $row->id }}" class="btn btn-primary btn-sm">
													<i class="fa fa-list"></i> Detil
												</a>
												@if($row->status == 'unpaid')
												<a href="#modalCancel{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-sm">
													<i class="fa fa-times"></i> Cancel
												</a>
												@endif
												<a href="/invoice/print/{{ $row->id }}" target="_blank" class="btn btn-default btn-sm">
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

@foreach($data_invoice as $row_cancel)
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
            <form method="GET" action="/invoice/cancel/{{ $row_cancel->id }}">
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

@endsection