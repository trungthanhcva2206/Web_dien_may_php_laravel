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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/add_pr.css')}}">



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
						<h3>Detail Product</h3>
					</div>
                    <a href="#" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
					<div id="container">
                        <h1>Add New Product</h1>
                        <form action=""  method="post" enctype="multipart/form-data">
                            
                            <label for="id">ID:</label>
                            <input type="text" id="id" name="id" required>
                    
                            <label for="name">Name:</label>
                            <input type="name" id="name" name="name" required>
                    
                            <label for="cate">Categories ID:</label>
                            <input type="cate" id="cate" name="cate" required>
                    
                            <label for="quantity">Quantity:</label>
                            <input type="quantity" id="quantity" name="quantity" required>
                    
                            <label for="day">Current At:</label>
                            <input type="date" id="current" name="current" required>                            

                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea> 

                          
                    
                            <label for="avatar">Product Image:</label>
                            <input type="file" id="img_link" name="img_link" accept="image/*" required>
                            <img id="preview" src="#" alt="img_link" style="max-width: 200px; display: none;">
                    
                    
                    
                    
                            <input type="submit" name="btn_create" value="Save">
                    
                        </form>
                    </div>
                    
                    
					
				</div>
			</div>
</main>
@endsection

@section('js')

<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
@endsection