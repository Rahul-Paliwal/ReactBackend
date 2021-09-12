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


                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Project </h4>
                                <a href="{{route('add.project')}}" class="btn btn-info">Add Project <span class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th><strong>Project Name </strong></th>
                                                <th><strong>Project Description</strong></th>
                                                <th><strong>Project Img One</strong></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                    @foreach($projects as $item)									 
                                <tr>


                                    <td> {{ $item->project_name  }}  </td>
                                    <td>{{ Str::limit($item->project_description, 25, '..') }} </td>
                                    <td> <img src="{{ asset($item->img_one) }}" style="width: 70px; height: 57px;"> </td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('edit.project',$item->id) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('delete.project',$item->id) }}">Delete</a>
                                            </div>
                                        </div>
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




@endsection 