@extends('Admin.templates.tpl_default', ['pageId'=>'product'])

@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/pr_list.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/detail_pr.css')}}">



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
						<h3>Product Detail</h3>
					</div>
                    <a href="{{ route('admin.product')}}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
					<div class="product-details">
                        <div class="product-image">
                        @if ($product->images->count() > 0)
                            <img src="./../../../{{ $product->images->first()->img_link }}" alt="">
                        @else
                            <img src="default_image_url_here" alt="No Image">
                        @endif
                        </div>
                        <div class="product-info">
                            <div class="info-row">
								<span class="info-label">ID:</span>
                                <span class="pr_id">{{ $product->id }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Name:</span>
                                <span class="pr_id">{{ $product->product_name }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Categories Name:</span>
                                <span class="pr_id">{{ $categoryName }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Quantity:</span>
                                <span class="pr_id">{{ $product->quantity }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Price:</span>
                                <span class="pr_id">{{ $product->price }} $</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Feature:</span>
                                <span class="pr_id">{{ $product->featured }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Current at:</span>
                                <span class="pr_id">{{ $product->current_at }}</span>
                                
                            </div>
                            <div class="info-row">
								<span class="info-label">Description:</span>
                                <span class="pr_id">{{ $product->description }}</span>
                                
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