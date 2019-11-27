<!DOCTYPE html>
<html>
<head>
    <title>Impact Dockwize</title>
    <style type="text/css">
        /* The sidebar menu */
        .sidebar {
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0;
            left: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidebar */
        }

        /* The sidebar links */
        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        /* When you mouse over the navigation links, change their color */
        .sidebar a:hover {
            color: #f1f1f1;
        }

        /* Position and style the close button (top right corner) */
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* The button used to open the sidebar */
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
        #sidebarbutton {
            transition: margin-left .5s; /* If you want a transition effect */
        }

        /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
        }
    </style>

</head>
<body>
<script>
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
document.getElementById("mySidebar").style.width = "150px";
document.getElementById("sidebarbutton").style.marginLeft = "150px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
document.getElementById("mySidebar").style.width = "0";
document.getElementById("sidebarbutton").style.marginLeft = "0";
}
</script>
<div id="sidebarbutton">
    <button class="openbtn" onclick="openNav()">&#9776;</button>
</div>
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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