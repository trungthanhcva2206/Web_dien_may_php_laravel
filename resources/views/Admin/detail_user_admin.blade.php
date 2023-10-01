@extends('Admin.templates.tpl_default', ['pageId'=>'detail_admin'])

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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/detail_user_admin.css')}}">



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
		
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Admin Detail</h3>
					</div>
                    <a href="{{ route('admin.user_admin')}}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
					<div class="product-details">
                        <div class="product-image">
                            <img src="./../../../{{$user_admin->img_link }}" alt="">
                        </div>
                        <div class="product-info">
                            <div class="info-row">
								<span class="info-label">ID:</span>
                                <span class="pr_id">{{ $user_admin->id }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Name:</span>
                                <span class="pr_id">{{ $user_admin->name }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Gender:</span>
                                <span class="pr_id">{{ $user_admin->gender }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Date_of_birth:</span>
                                <span class="pr_id">{{ $user_admin->date_of_birth }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Email:</span>
                                <span class="pr_id">{{ $user_admin->email }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Address:</span>
                                <span class="pr_id">{{ $user_admin->address }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Phone:</span>
                                <span class="pr_id">{{ $user_admin->phone }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Level:</span>
                                <span class="pr_id">{{ $user_admin->level }}</span>
                                
                            </div>
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