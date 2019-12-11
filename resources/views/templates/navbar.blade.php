<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="#"><strong>myBichelchen</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
            @if (isset($admin))
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">{{ __('navbar.overview') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ __('navbar.messages') }}</a>
                    </li>
                </ul>
                    @elseif (isset($user) && $user->role=='Teacher')
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">
                                <a class="nav-link" href="#">{{ __('navbar.overview') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('navbar.messages') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('navbar.homework') }}</a>
                            </li>
                        </ul>
                        <!-- Drop down menu for Teachers -->
                        <div class="dropdown">
                            <button class="btn btn-outline-white dropdown-toggle btn-rounded" type="button" id="dropdownMenu6" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Class
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu6">
                                @foreach ($user->klasses as $klass)
                                    <a class="dropdown-item" href="#">{{ $klass->name }} {{ $klass->grade }}</a>
                                @endforeach
                            </div>
                        </div>
                            @elseif (isset($user) && $user->role=='Guardian')
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="#">{{ __('navbar.overview') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">{{ __('navbar.messages') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">{{ __('navbar.homework') }}</a>
                                    </li>
                                </ul>
                                <!-- Drop down menu for Parents -->
                                <div class="dropdown">
                                    <button class="btn btn-outline-white dropdown-toggle btn-rounded" type="button" id="dropdownMenu6" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Child
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu6">
                                    @foreach ($user->students as $student)
                                        <a class="dropdown-item" href="#">{{ $student->first_name }} {{ $student->last_name }}</a>
                                    @endforeach
                                    </div>
                                </div>
                                    @elseif (isset($user) && $user->role=='MaRe')
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="#">{{ __('navbar.overview') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">{{ __('navbar.messages') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">{{ __('navbar.homework') }}</a>
                                            </li>
                                        </ul>
                                        <!-- Drop down menu for MaRe -->
                                        <div class="dropdown">
                                            <button class="btn btn-outline-white dropdown-toggle btn-rounded" type="button" id="dropdownMenu6" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Child
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu6">
                                            @foreach ($user->students as $student)
                                                <a class="dropdown-item" href="#">{{ $student->first_name }} {{ $student->last_name }}</a>
                                            @endforeach
                                            </div>
                                        </div>
                                            @endif
        </div>
    </div>
</nav>
