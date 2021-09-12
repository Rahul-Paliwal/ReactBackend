@extends('admin.admin_master')
@section('admin')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

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
                                <h4 class="card-title">Add Home Content </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">

        <form method="post" action="{{ route('store.home') }}" enctype="multipart/form-data">
        	@csrf

            <div class="form-group">
                <label class="info-title">Home Title </label>
                <input type="text" name="home_title" class="form-control input-default "  >
                @error('home_title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label class="info-title">Home Sub Title </label>
                <input type="text" name="home_subtitle" class="form-control input-default "  >
                @error('home_subtitle')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label class="info-title">Home Description </label>
                <textarea class="form-control" name="home_description" id="summernote"></textarea>
            </div>


            <div class="form-group">
                <label class="info-title">Total Users </label>
                <input type="text" name="total_users" class="form-control input-default "  >
                @error('total_users')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="info-title">Total Course </label>
                <input type="text" name="total_course" class="form-control input-default "  >
                @error('total_course')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label class="info-title">Total Review </label>
                <input type="text" name="total_review" class="form-control input-default "  >
                @error('total_review')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <div class="form-group">
                <label class="info-title">Total Project </label>
                <input type="text" name="total_project" class="form-control input-default "  >
                @error('total_project')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

           <div class="form-group">
                <label class="info-title">Video Description </label>
                <textarea class="form-control" name="video_description" id="summernote2"></textarea>
            </div>

            <div class="form-group">
                <label class="info-title">Video URL  </label>
                <input type="text" name="video_url" class="form-control input-default "  >
                @error('video_url')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>


           <input type="submit" class="btn btn-success" value="Add Home Content">

        </form>
    </div>
                            </div>
                        </div>
					</div>







                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



 <!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 200
    });
</script>

<script type="text/javascript">
    $('#summernote2').summernote({
        height: 200
    });
</script>

@endsection