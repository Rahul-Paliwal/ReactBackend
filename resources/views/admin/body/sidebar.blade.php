@php 
$id=Auth::user()->id;
$user=App\Models\User::find($id); 
@endphp
<div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					<img src="{{(!empty($user->profile_photo_path))?url('upload/user_image/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="">
					<a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
					<h5 class="mb-0 fs-20 text-black "><span class="font-w400">Hello,</span> {{$user->name}}</h5>
					<p class="mb-0 fs-14 font-w400">{{$user->email}}</p>
				</div>
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-144-layout"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('dashboard')}}">Dashboard</a></li>
						</ul>

                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-077-menu-1"></i> 
							<span class="nav-text">User Profile</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('user.profile')}}">User Profile</a></li>
                            <li><a href="{{route('change.password')}}">Change Password</a></li>
						</ul>

                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-061-puzzle"></i>
							<span class="nav-text">Information</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.information')}}">Add Information</a></li>
                            <li><a href="{{route('manage.information')}}">Manage Information</a></li>
						</ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-003-diamond"></i>
							<span class="nav-text">Services</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.service')}}">Add Services</a></li>
                            <li><a href="{{route('manage.service')}}">Manage Services</a></li>
						</ul>

                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-053-heart"></i>
							<span class="nav-text">Projects</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.project')}}">Add Projects</a></li>
                            <li><a href="{{route('manage.project')}}">Manage projects</a></li>
						</ul>

                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Courses</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.course')}}">Add Courses</a></li>
                            <li><a href="{{route('manage.course')}}">Manage Courses</a></li>
						</ul>

                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-044-file"></i>
							<span class="nav-text">Home Page</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.home')}}">Add HomeContent</a></li>
                            <li><a href="{{route('manage.home')}}">Manage HomeContent</a></li>
						</ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
							<span class="nav-text">Client Review</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.clientreview')}}">Add ClientReview</a></li>
                            <li><a href="{{route('manage.clientreview')}}">Manage ClientReview</a></li>
						</ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-049-copy"></i>
							<span class="nav-text">Footer</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.footer')}}">Add Footer Content</a></li>
                            <li><a href="{{route('manage.footer')}}">Manage Footer Content</a></li>
						</ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-061-puzzle"></i>
							<span class="nav-text">Chart</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{route('add.chart')}}">Add Chart Content</a></li>
                            <li><a href="{{route('manage.chart')}}">Manage Chart Content</a></li>
						</ul>
                    </li>
                   
                </ul>
				<div class="copyright">
					<p><strong>© Learn Digital Admin Dashboard</strong>  2021 All Rights Reserved</p>
					<p class="fs-12">Made by <span class="heart"></span> <b>Learn Digital</b></p>
				</div>
			</div>
        </div>
