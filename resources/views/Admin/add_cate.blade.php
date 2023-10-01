@extends('Admin.templates.tpl_default', ['pageId'=>'add_cate'])
@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/cate.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/add_cate.css')}}">



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
			<h3>Add Category</h3>
		</div>
        <a href="{{ route('admin.cate')}}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="account-detail">
				<div class="billing-detail">					
					<form class="checkout-form" action="{{ route('admin.cate_add_2') }}" method="POST" enctype="multipart/form-data">
                        @csrf
								<div class="form-group">
									<label>Category Name:</label>
									<input type="text" id="fname" name="fname" >
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