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
							</div>
						</div>
						<div class="card-body">
                            <form method="post" action="/payment-report/export" id="filter">
                            @csrf
                                <div class="row justify-content-center mb-4">
                                    <div class="col-2">
                                        <div class="from-group">
                                            <input type="text" class="form-control" id="min" value="{{ $date1 }}" placeholder="Min Date" name="date1" required>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="from-group">
                                            <input type="text" class="form-control" id="max" value="{{ $date2 }}" placeholder="Max Date" name="date2" required>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="from-group">
                                            <select class="form-control" id="status" name="status" style="height:auto" required>
                                                <option value="All">All</option>
                                                <option value="Done">Done</option>
                                                <option value="Canceled">Canceled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="from-group">
                                            <button type="submit" class="btn btn-dark">
                                                <i class="fa fa-file-excel"></i> Export
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

							<div class="table-responsive">
								<table id="report-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>Id</th>
											<th>Date</th>
                                            <th>Invoice</th>
											<th>Customer</th>
                                            <th>Payment</th>
                                            <th>Return</th>
                                            <th>User</th>
                                            <th>Status</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($data_payment as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{ date('d/m/Y',strtotime($row->payment_date)) }}</td>
                                            <td>{{ ucwords($row->invoice->id) }}</td>
											<td>{{ ucwords($row->invoice->customer->name) }}</td>
                                            <td>{{ $row->customer_payment }}</td>
                                            <td>{{ $row->customer_return }}</td>
											<td>{{ ucwords($row->user->name) }}</td>
                                            <td>{{ ucwords($row->status) }}</td>
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

@endsection

@push('report_script')
<script>
    table = $('#report-row').DataTable({
					order:[]
				});

    $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        var min = $('#min').val();
        var max = $('#max').val();
        var status = $('#status').val();

        var date = data[1] || 0;
        var list_status = data[7] || 0;
        
        var part_min = min.split('/');
        var part_max = max.split('/');
        var part_date = date.split('/');

        var newMin = new Date(part_min[2]+'-'+part_min[1]+'-'+part_min[0]);
        var newMax = new Date(part_max[2]+'-'+part_max[1]+'-'+part_max[0]);
        var newDate = new Date(part_date[2]+'-'+part_date[1]+'-'+part_date[0]);

            console.log(newMin);
            console.log(newMax);
            console.log(status);

            if(status == "All"){
                if (
                    (min.length == 0 && max.length == 0) ||
                    (min.length == 0 && newDate <= newMax) ||
                    (newMin <= newDate && max.length == 0) ||
                    (newMin <= newDate && newDate <= newMax)
                ) {
                    return true;
                }
                return false;

            }else{
                if (
                    (min.length == 0 && max.length == 0 && status == list_status) ||
                    (min.length == 0 && newDate <= newMax && status == list_status) ||
                    (newMin <= newDate && max.length == 0 && status == list_status) ||
                    (newMin <= newDate && newDate <= newMax && status == list_status)
                ) {
                    return true;
                }
                return false;
            }
    }
    );

    $('#min').datepicker({ 
        onChangeMonthYear: function () {
                table.draw(); 
        }, 
        format: "dd/mm/yyyy",
        changeMonth: true, 
        changeYear: true,
        autoclose: true
    });

    $('#max').datepicker({ 
        onChangeMonthYear: function () { 
            table.draw(); 
        },
        format: "dd/mm/yyyy",
        changeMonth: true, 
        changeYear: true,
        autoclose: true
    });

    $('#min,#max,#status').change(function() {
        table.draw();
    });

</script>
@endpush