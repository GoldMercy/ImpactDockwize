<!DOCTYPE html>
<html>
<head>
    <title>Impact Dockwize</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }

        #sidebar{
            top: 0px;
            z-index: 1001;
            position: fixed;
            width: 200px;
            height: 100%;
            background-color: black;
            left: -200px;
            transition: all 500ms linear;
        }

        #sidebar.active{
            left:0px;
        }

        #sidebar ul li{
            color: rgba(230,230,230,0.9);
            list-style: none;
            padding: 15px 10px;
            border-bottom: 1px solid rgba(100,100,100,0.3);
        }

        #sidebar .toggle-btn{
            position: absolute;
            left: 230px;
            top: 20px;
        }

        #sidebar .toggle-btn span{
            display: block;
            width: 30px;
            height: 5px;
            background: #151719;
            margin: 5px 0px;
        }

        #sidebar body,html {
            margin: 0;
            font-family: sans-serif;
        }

        #sidebar ul {
            padding: 0;
            width: 100%;
        }

        #sidebar a {
            outline: none;
            text-decoration: none;
            display: inline-block;
            text-align: center;

            line-height: 1;
            background: linear-gradient(to right, #6666ff, #0099ff , #00ff00, #ff3399, #6666ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: rainbow_animation 6s ease-in-out infinite;
            background-size: 400% 100%;
        }

        @keyframes rainbow_animation {
            0%, 100% {
                background-position: 0 0;
            }

            50% {
                background-position: 100% 0;
            }
        }


    </style>
    <script type="text/javascript">
        function toggleSidebar(){
            document.getElementById("sidebar").classList.toggle('active');
        }
    </script>
</head>
<body>

<div id="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()"><a>
            <span></span>

            <span></span>

            <span></span>
        </a>
    </div>
    <ul id="buttons">
        <li><a class="rainbow_text_animated" href="{{ url('/home') }}">Dashboard</a></li>
        <li><a class="sidebar" href="{{ url('/input') }}">Input</a></li>
        <li><a class="sidebar" href="{{ url('/output') }}">Output</a></li>
        <li><a class="sidebar" href="{{ url('/admin') }}">Admin</a></li>
        <li><a class="sidebar" href="{{ url('/searching') }}">History</a></li>
        <li><a class="sidebar" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
</body>
</html>