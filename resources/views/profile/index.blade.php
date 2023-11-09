@extends('layout.app')
@section('content')

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">{{ $title }}</h4>
							</div>
						</div>
                        <form method="POST" action="/profile/update/{{ $data_profile->id }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input id="name" type="text" name="name" value="{{ $data_profile->name }}" class="form-control" placeholder="Fill Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-0">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input id="email" type="email" name="email" value="{{ $data_profile->email }}" class="form-control" placeholder="Fill Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input id="password" type="password" name="password" class="form-control" placeholder="Update Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-right">
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

@endsection