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
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Admin</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <span>{{ Auth::user()->name }}</span>
        <div class="profile">
            <button class="profilebtn" onclick="profile()"><img src="../{{Auth::user()->img_link}}" style="width: 100%;
	height: 34px;
	border-radius: 50%;
	object-fit: cover;
	box-shadow: 0px 0px 8px #9e9e9e;"></button>
            <div class="profiledown-content" id="myDropdown">
                <a href="{{ route('user.personal_information') }}">Account Information</a>
                <a href="{{ route('user.my_order') }}">My Order</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            </div>
        </div>
    </nav>
</body>
<script src="script.js"></script>

</html>