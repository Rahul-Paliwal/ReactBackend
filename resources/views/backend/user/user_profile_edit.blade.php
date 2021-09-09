@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <h4>Hi <b> {{$user->name}} </b>, welcome back!</h4>
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
                                <h4 class="card-title">User Profile Update</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('user.profile.store')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control input-default" name="name" value="{{$user->name}}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control input-default" name="email" value="{{$user->email}}">
                                        </div> 
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="profile_photo_path" class="custom-file-input" id="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img id="showImg" src="{{(!empty($user->profile_photo_path))?url('upload/user_image/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" style="width: 100px; height: 100px;" alt="">
                                        </div>     
                                        
                                        <input type="submit" class="btn btn-success" value="Update Profile">
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                    $('#showImg').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection