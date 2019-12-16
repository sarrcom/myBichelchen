<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="/user"><strong>myBichelchen</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">

            <!-- If User is Admin -->
            @if (isset($Admin))
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
                        <a class="nav-link" href="/user/overview">{{ __('navbar.overview') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/messages">{{ __('navbar.messages') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/homework">{{ __('navbar.homework') }}</a>
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
                            <a class="dropdown-item" href="#">Class: {{ $klass->name }} Grade: {{ $klass->grade }}</a>
                        @endforeach
                    </div>
                </div>
            @elseif (isset($user) && $user->role=='Guardian')
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="/user/overview">{{ __('navbar.overview') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/messages">{{ __('navbar.messages') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/homework">{{ __('navbar.homework') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Sign Out</a>
                    </li>
                </ul>
            <!-- /If User is Admin -->

            <!-- If User is Teacher -->
            @elseif (isset($user) && $user->role=='Teacher')
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="/user">{{ __('navbar.overview') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/messages">{{ __('navbar.messages') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/homework">{{ __('navbar.homework') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/user">{{$user->first_name}} {{$user->last_name}}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout">Sign Out</a>
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
                            <a class="dropdown-item" href="#">Class: {{ $klass->name }} Grade: {{ $klass->grade }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- /If User is Teacher -->

                <!-- If User is Guardian -->
                @elseif (isset($user) && $user->role=='Guardian')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="/user">{{ __('navbar.overview') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/messages">{{ __('navbar.messages') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/homework">{{ __('navbar.homework') }}</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/user">{{$user->first_name}} {{$user->last_name}}</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/logout">Sign Out</a>
                        </li>
                    </ul>
                    <!-- Drop down menu for Guardian -->
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
                <!-- /If User is Guardian -->

                <!-- If User is Maison Relais -->
                @elseif (isset($user) && $user->role=='MaRe')
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="/user">{{ __('navbar.overview') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/messages">{{ __('navbar.messages') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/homework">{{ __('navbar.homework') }}</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/user">{{$user->first_name}} {{$user->last_name}}</a>
                        </li>
                        <li>
                            <a class="nav-link" href="/logout">Sign Out</a>
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
                <!-- /If User is Maison Relais -->

                <!-- No one is signed in -->
                @else
                    <ul class="navbar-nav mr-auto">
                        <!-- http://www.supremeschoolsupply.com/school-slogan-ideas/ -->
                    <a class="navbar-brand" href="#"><strong>the future begins here</strong></a>
                    </ul>
                    <div>
                        <button class="btn btn-outline-white waves-effect waves-light btn-rounded" type="button" data-toggle="modal" aria-haspopup="true" data-target="#elegantModalForm">Sign In
                        </button>
                    </div>
                @endif
        </div>
    </div>
</nav>
