<!DOCTYPE html>
<html>
<head>
    <title>Impact Dockwize</title>
    <style type="text/css">
        /* The sidebar menu */
        .sidebar {
            height: 100%; /* 100% Full-height */
            width: 250; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0;
            left: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
        }

        /* The sidebar links */
        .sidebar a {
            padding: 8px 8px 8px 8px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
        }

        /* When you mouse over the navigation links, change their color */
        .sidebar a:hover {
            color: #f1f1f1;
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
        }
    </style>

</head>
<body>
<div class="sidebar">
    <a href="{{ url('/home') }}">Dashboard</a>
    <a href="{{ url('/input') }}">Input</a>
    <a href="{{ url('/output') }}">Output</a>
    <a href="{{ url('/admin') }}">Admin</a>
    <a href="{{ url('/searching') }}">History</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
</div>
</body>
</html>