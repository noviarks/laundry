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
											<th>Name</th>
											<th>Phone</th>
                                            <th>Address</th>
											<th style="width: 30%">Action</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($data_customer as $row)
										<tr>
											<td>{{ $row->id }}</td>
											<td>{{ $row->name }}</td>
											<td>{{ $row->phone }}</td>
                                            <td>{{ $row->address }}</td>
											<td>
												<a href="#modalUpdate{{ $row->id }}" data-toggle="modal" class="btn btn-primary btn-sm">
													<i class="fa fa-edit"></i> Update
												</a>
												<a href="#modalDelete{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i> Delete
												</a>
												<a href="/customer/print/{{ $row->id }}" target="_blank" class="btn btn-default btn-sm">
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
            <form method="POST" action="/customer/store">
                @csrf
                <div class="modal-body">				
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Name</label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="Fill Name" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Phone</label>
                                <input id="phone" type="number" min="0" name="phone" class="form-control" placeholder="Fill Phone" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                             <div class="form-group form-group-default">
                                <label>Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Fill Address"></textarea>
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

@foreach($data_customer as $row_update)
<div class="modal fade" id="modalUpdate{{ $row_update->id }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h4 class="modal-title">
					<span class="fw-mediumbold">
					Update</span> 
					<span class="fw-light">
						{{ $title }}
					</span>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <form method="POST" action="/customer/update/{{ $row_update->id }}">
                @csrf
                <div class="modal-body">				
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Name</label>
                                <input id="name" type="text" name="name" value="{{ $row_update->name }}" class="form-control" placeholder="Fill Name" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Phone</label>
                                <input id="phone" type="number" min="0" name="phone" value="{{ $row_update->phone }}" class="form-control" placeholder="Fill Phone" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                             <div class="form-group form-group-default">
                                <label>Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Fill Address">{{ $row_update->address }}</textarea>
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

@foreach($data_customer as $row_delete)
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
            <form method="GET" action="/customer/delete/{{ $row_delete->id }}">
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

@endsection