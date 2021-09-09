@extends('admin.admin_master')
@section('admin')

<div class="content-body" style="min-height: 788px;">
			<div class="container-fluid">
				<!-- Add Project -->
				<div class="modal fade" id="addProjectSidebar">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
							
    
							</div>
							<div class="modal-body">
							
							</div>
						</div>
					</div>
				</div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi <b> {{$user->name}} </b>, Welcome!</h4>
                            <span>Learn Digital Admin</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                       
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">User Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('change.password.update')}}">
                                    @csrf
                                        <div class="form-group">
                                            <label class="info-title">Current Password</label>
                                            <input type="password" id="current_password" name="old_password" class="form-control input-default" >
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">New Password</label>
                                            <input type="password" id="password" name="password" class="form-control input-default" >
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title">Confirm Password</label>
                                            <input type="password" id="password_confirmation" name="confirm_password" class="form-control input-default" >
                                        </div>
                                     
                                          
                                        
                                        <input type="submit" class="btn btn-success" value="Change Password">
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>


@endsection