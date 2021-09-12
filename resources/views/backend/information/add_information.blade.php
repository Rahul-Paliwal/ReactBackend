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
     
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                       
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{route('store.information')}}">
                                    @csrf
                                        <div class="form-group">
                                            <label class="info-title">About Information</label>
                                                 <textarea class="form-control" name="about" id="summernote1"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Refund Policy</label>
                                        <textarea class="form-control" name="refund" id="summernote2"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="info-title">Trems & Condition</label>
                                            <textarea class="form-control" name="terms" id="summernote3"></textarea>
                                        </div>    

                                        <div class="form-group">
                                            <label class="info-title">Privacy & Policy</label>
                                            <textarea class="form-control" name="privacy" id="summernote4"></textarea>
                                        </div>    
                                        
                                        <input type="submit" class="btn btn-success" value="Add Information">
                                    </form>
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
<script>
$('#summernote1').summernote({
        height: 200
    });
</script>

<script type="text/javascript">
    $('#summernote2').summernote({
        height: 200
    });
</script>

<script type="text/javascript">
    $('#summernote3').summernote({
        height: 200
    });
</script>

<script type="text/javascript">
    $('#summernote4').summernote({
        height: 200
    });
</script>

@endsection