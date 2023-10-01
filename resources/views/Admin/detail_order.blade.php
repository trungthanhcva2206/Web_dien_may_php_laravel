@extends('Admin.templates.tpl_default', ['pageId'=>'product'])

@section('css')
<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- CSS -->

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/admin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/sidebar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/navbar.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/pr_list.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/css_admin/detail_order.css')}}">



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
						<h3>Order details</h3>
					</div>
                    <a href="{{ route('admin.orders')}}" class="back-link">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <div class="order-detail" style="margin-top: 30px;">
						<table>
							<thead>
								<tr>
									<th>Order id</th>
									<th>Product name</th>
									<th>Img</th>
									<th>Quantity</th>
									<th>Price per product</th>
                                    <th>Total price</th>
								</tr>
							</thead>
              @foreach ($orderDetails as $orderDetail)
							<tbody>
								<tr>
									<td>{{$orderDetail->orders_id}}</td>
									<td>{{ $orderDetail->product_name}}</td>
									<td>@if ($orderDetail->image)
        <img src="./../../../{{ $orderDetail->image->img_link }}" alt="{{ $orderDetail->product_name }} Image">
    @else
        <img src="default_image_url_here" alt="No Image">
    @endif</td>
									<td>
                                        {{ $orderDetail->quantity}}
                                    </td>
                                    <td>
                                        {{ $orderDetail->price}}
                                    </td>
                                    <td>
                                        {{ $orderDetail->total_price}}
                                    </td>
								</tr>
							</tbody>
              @endforeach
						</table>
                        <form action="{{ route('update.status', ['id' => $order->id]) }}" method="post">
                            @csrf
                            @method('POST')

                            @if( $order->status == 1)
                                <span style="background-color: #28a745;
        color: #fff;
        padding: 5px 10px;
        border: none;
        float: right;margin-top:20px">Processed</span>
                            @else
                            <button type="submit" class="button">Approve</button>
                            @endif
                        </form>

					</div>
                    
					
				</div>
			</div>
</main>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/js_admin/navbar_sidebar.js')}}"></script>
<script src="{{ asset('assets/js/js_admin/datatable.js')}}"></script>
@endsection