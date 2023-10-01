@extends('Admin.templates.tpl_default', ['pageId'=>'add_admin'])
@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/user_admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/add_user_admin.css')}}">



@endsection


@section('content')
<main>
<div class="head-title">
				<div class="left">
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<p id="myText"></p>
						</li>
					</ul>
				</div>
</div>
<div>
    <div>
        <div class="head">
			<h3>Add Admin</h3>
		</div>
        <a href="{{ route('admin.user_admin')}}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="account-detail">
				<div class="billing-detail">					
					<form class="checkout-form" action="{{ route('admin.user_add_2') }}" method="POST" enctype="multipart/form-data">
                        @csrf
							<div class="form-inline">
								<div class="form-group">
									<label>Full Name</label>
									<input type="text" id="fname" name="fname" >
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" id="email" name="email" >
								</div>
                                <div class="form-group">
									<label>Password</label>
									<input type="password" id="password" name="password" minlength="6" maxlength="100">
								</div>
							</div>
							<div class="form-inline">
								<div class="form-group">
									<label>Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
							</div>
							<div class="form-group">
								<label>Address</label>
								<textarea style="resize:none" id="address" name="address" rows="3"></textarea>
							</div>
							<div class="form-inline">					
                            <div class="form-group">
                                <label for="date">Date of Birth</label>
                                <input type="date" id="date" name="date" class="form-control">
                            </div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" id="phone" name="phone" minlength="10" maxlength="10">
								</div>
							</div>
                            <div class="txt_field">
                                <h5>Ảnh mô tả</h5>
                                <input type="file" name="img_link" style="width:300px; height:50px">
                            </div>
							<div class="form-group">
								<label></label>
								<input type="submit" id="update" name="update" value="Add">
							</div>
						</form>		
					</div>
				</div>
    </div>
</div>
</main>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="{{ asset('assets/js/js_admin/datatable.js')}}"></script>
@endsection