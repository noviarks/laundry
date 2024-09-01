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
                        <form method="POST" action="/invoice/store">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    
                                    <a href="/invoice" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                                    <button type="button" class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                        <i class="fa fa-plus"></i>
                                        Add List
                                    </button>
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
                                                <th style="width: 20%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $no = 1;
                                            $total_payment  = 0;
                                        @endphp
                                        @if(session('list'))
                                            @foreach(session('list') as $row)
                                                @php
                                                    $total_price  = $row['qty'] * $row['price'];
                                                    $total_payment+= $total_price;
                                                @endphp
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row['service_desc'] }}</td>
                                                <td>{{ $row['qty'] }}</td>
                                                <td>{{ $row['uom_desc'] }}</td>
                                                <td>Rp {{ number_format($row['price']) }}</td>
                                                <td>Rp {{ number_format($total_price) }}</td>
                                                <td>
                                                    <a href="#modalUpdate{{ $row['id'] }}" data-toggle="modal" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-edit"></i> Update
                                                    </a>
                                                    <a href="#modalDelete{{ $row['id'] }}" data-toggle="modal" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif    
                                            <tr>
                                                <th colspan="5">Total Payment</th>
                                                <td>
                                                    Rp {{ number_format($total_payment) }}
                                                    <input type="hidden" id="total_payment" name="total_payment" value="{{ $total_payment }}">
                                                </td>    
                                                <td></td>                              
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                            <label>Id</label>
                                            <input id="invoice_id" type="text" name="invoice_id" class="form-control" value="{{ $id }}" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                            <label>Date</label>
                                            <input id="invoice_date" type="text" name="invoice_date" class="form-control" value="{{ date('d/m/Y') }}" readonly required>
                                        </div>
                                    </div>
                                </div>	
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Customer</label>
                                            <div class="input-group">
                                                <input id="customer" type="text" name="customer" class="form-control " placeholder="Fill Customer" autoComplete="off" 
                                                    style="pointer-events: none" required>
                                                <div class="input-group-apend my-auto">
                                                    <a href="#modalSearchCustomer" data-toggle="modal"  class="btn btn-link text-dark p-0" type="button" >
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
                                                <option value="unpaid">Unpaid</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-footer">
                                <div class="d-flex align-items-right mt-4">
                                    <button type="submit" class="btn btn-primary ml-auto"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </form>
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
					Add</span> 
					<span class="fw-light">
						List
					</span>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form method="POST" action="/invoice/add-list">
                @csrf
                <div class="modal-body">				
                    <div class="row add-list">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default" id="form-service">
                                <label>Service</label>
                                <select class="form-control select-service" id="service_id" name="service_id" required>
                                    <option value="" hidden>-- Choose Service --</option>
                                    @foreach($data_service as $service)
                                    <option value="{{ $service->id }}">{{ $service->desc }}</option>
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

@if(session('list'))
    @foreach(session('list') as $row_update)
    <div class="modal fade" id="modalUpdate{{ $row_update['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">
                        Update </span> 
                        <span class="fw-light">
                            List
                        </span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="/invoice/update-list">
                    @csrf
                    <div class="modal-body">				
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default" id="form-service" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                    <label>Service</label>
                                    <select class="form-control service" id="service_id" name="service_id" readonly required>
                                        <option value="{{ $row_update['service_id'] }}">{{ $row_update['service_desc'] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12" id="form-qty">
                                <div class="form-group form-group-default">
                                    <label>Qty</label>
                                    <input id="qty" type="number" min="0" name="qty" value="{{ $row_update['qty'] }}" class="form-control" placeholder="Fill Qty" required>
                                </div>
                            </div>
                            <div class="col-sm-12" id="form-uom">
                                <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;pointer-events: none">
                                    <label>UoM</label>
                                    <select class="form-control" id="uom" name="uom" readonly required>
                                        <option value="{{ $row_update['uom_id'] }}">{{ $row_update['uom_desc'] }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12" id="form-price">
                                <div class="form-group form-group-default" style="background: #e8e8e8!important;border-color:#e8e8e8!important;">
                                    <label>Price (Rp)</label>
                                    <input id="price" type="number" min="0"  name="price" class="form-control" value="{{ $row_update['price'] }}" readonly required>
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
    @endforeach
@endif

@if(session('list'))
    @foreach(session('list') as $row_delete)
    <div class="modal fade" id="modalDelete{{ $row_delete['id'] }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header no-bd">
                    <h4 class="modal-title">
                        <span class="fw-mediumbold">
                        Delete</span> 
                        <span class="fw-light">
                            List
                        </span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="GET" action="/invoice/delete-list/{{ $row_delete['id'] }}">
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
@endif

<div class="modal fade bd-example-modal-lg" id="modalSearchCustomer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h4 class="modal-title">
                    <span class="fw-mediumbold">
                    Search</span> 
                    <span class="fw-light">
                        Customer
                    </span>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">		
                <div class="table-responsive">
                    <table id="add-customer" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_customer as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-default choose-customer" data-params="{{ $customer->id.' - '.$customer->name }}">
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

@push('invoice_script')
<script type="text/javascript">    
    $(document).ready(function(){
        $('#add-customer').DataTable({
            order:[],
            pageLength: 5,
            bLengthChange: false
        });

        $(".select-service").on('change',function(){
            var service_id = $("#service_id").val();

            $('#form-qty,#form-uom,#form-price').remove();
            $.ajax({
                headers : {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                type    : "POST",
                url     : "/invoice/get-service-detil",
                data    : "service_id="+service_id,
                cache   : false,
                success : function(data){
                    
                    $(".add-list").append(data);
                }
            });
        });

        $('#add-customer tbody').on('click', '.choose-customer', function () {
            var data = $(this).data('params');
            $('#customer').val(data);
            $('#modalSearchCustomer').modal('toggle');
        });

        $(".locked").keydown(function(e){
            e.preventDefault();
        });
    });
</script>
@endpush