<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">




</head>

<body>
    <section id="sidebar">
        <a href="{{ route('admin.home') }}" class="brand">
            <i class="fa-regular fa-user io"></i>
            <span class="text">Admin</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ route('admin.home') }}" onclick="changeText();">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user_admin') }}" onclick="product();">
                    <i class='bx bx-user'></i>
                    <span class="text">Admin Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.product')}}" onclick="product();">
                    <i class='bx bxs-shopping-bag'></i>
                    <span class="text">Product</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.cate')}}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}">
                    <i class='bx bxs-cart-alt'></i>
                    <span class="text">Order</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.comment')}}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Comment</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.feedBack')}}">
                    <i class='bx bxs-message-rounded-dots'></i>
                    <span class="text">Feedback</span>
                </a>
            </li>
            
        </ul>
        <ul class="side-menu">
            <li>
                <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-decoration:none">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <script src="script.js"></script>
</body>

</html>