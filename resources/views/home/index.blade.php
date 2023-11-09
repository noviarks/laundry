@extends('layout.app')
@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">{{ $title }}</h4>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-users"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Users</p>
										<h4 class="card-title">{{ $users }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-info bubble-shadow-small">
										<i class="far fa-id-card"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Customers</p>
										<h4 class="card-title">{{ $customers }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="fas fa-file-invoice-dollar"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Paid {{ date('M Y') }}</p>
										<h4 class="card-title">{{ $invoices_paid }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="fas fa-file-invoice"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Unpaid {{ date('M Y') }}</p>
										<h4 class="card-title">{{ $invoices_unpaid }}</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Done Progress</h4>
						</div>
                        <div class="card-body">
							<div class="table-responsive">
								<table id="done-progress" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th style="width:7%">No</th>
                                            <th>Invoice</th>
                                            <th>Customer</th>
                                            <th>Progress</th>
										</tr>
									</thead>
									<tbody>
										@php
											$no = 1;
										@endphp

                                        @foreach($customer_progress as $row)
											@if($row->progress->desc == "Done")
											<tr>
												<td>{{ $no++ }}</td>
												<td>{{ $row->invoice->id }}</td>
												<td>{{ $row->invoice->customer->name }}</td>
												<td>{{ $row->progress->desc }}</td>
											</tr>
											@endif
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

@endsection

@push('home_script')
<script type="text/javascript">    
    $(document).ready(function(){
        $('#done-progress').DataTable({
            order:[],
            pageLength: 5,
            bLengthChange: false
        });
    });
</script>
@endpush