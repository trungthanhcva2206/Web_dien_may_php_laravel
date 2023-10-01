@extends('Admin.templates.tpl_default', ['pageId'=>'user_admin'])
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
						<h3>Admin Users</h3>
					</div>
					<button id="add-button">
						<i class="fa-solid fa-plus"></i><a href="{{ route('admin.user_add')}}"> Add new admin</a>
					</button>
					<table id="tb">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
                                <th>Gender</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>Action</th>								
							</tr>
						</thead>
						<tbody>
						@foreach ($user_admin as $admin)
							<tr>
								<td>
									<p>{{ $admin->id }}</p>
								</td>
                                <td>
                                    <p>
									{{ $admin->name }}
                                    </p>
                                </td>
                                <td>
                                    <p>
									{{ $admin-> gender}}
                                    </p>
                                </td>
                                <td>
                                    <p>
									{{ $admin->level }}
                                    </p>
                                </td>
                                <td>
                                    <p>
									{{ $admin->email }}
                                    </p>
                                </td>
								<td>
									<a href="/admin/user_admin/edit/{{$admin->id}}">
									<button class="edit-button">
										<i class="fa-solid fa-pen-to-square"></i>
									 </button>
									 </a>
									<button class="detail-button" onclick="show_detail({{ $admin->id }})">
									      <i class="fa-solid fa-info"></i>
								    </button>
									<form action="/admin/user_admin_detail/delete/{{$admin->id}}" method="POST" onsubmit="return ConfirmDelete( this )">
									@method('DELETE')
									@csrf
										<button class="delete-button" >
											<i class="fa-solid fa-trash"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
</main>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="{{ asset('assets/js/js_admin/datatable.js')}}"></script>

<script>
	function show_detail(id) {
		var url = "{{ route('detail_user_admin', ['id' => ':id']) }}";
		url = url.replace(':id', id);
		window.location.href = url;
	}


</script>

@endsection