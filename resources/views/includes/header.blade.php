<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Blocks</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{-- <a class="dropdown-item" href="/">View Blocks</a> --}}
                            <a class="dropdown-item" href="/viewblock/block1">View Block1</a>
                            <a class="dropdown-item" href="/viewblock/block2">View Block2</a>
                        </div>
                    </li>
                    @else
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">View Blocks</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            {{-- <a class="dropdown-item" href="/">View Blocks</a> --}}
                            <a class="dropdown-item" href="/viewblock/block1">View Block1</a>
                            <a class="dropdown-item" href="/viewblock/block2">View Block2</a>
                        </div>
                    </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit Blocks</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/editblock/block1">Edit Block1</a>
                                <a class="dropdown-item" href="/editblock/block2">Edit Block2</a>
                            </div>
                        </li>
                    @endguest

                    <li class="nav-item">
                        <a class="nav-link" href="/view-employees">View Employees</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add / Edit</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/">Dashboard</a>
                                <a class="dropdown-item" href="/addemployees">Add Employees</a>
                                <a class="dropdown-item" href="/addcompany">Add Group</a>
                                <a class="dropdown-item" href="/adddepartment">Add Department</a>
                                <a class="dropdown-item" href="/addmachine">Add Machine</a>
                                {{-- <a class="dropdown-item" href="/">Edit Blocks</a> --}}
                                <a class="dropdown-item" href="/manageblocks">Manage Blocks</a>
                                <a class="dropdown-item" href="/addusers">View Admin Users</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header> 