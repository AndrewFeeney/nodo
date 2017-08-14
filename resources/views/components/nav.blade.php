<nav class="navbar">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ config('app.url') }}">
            <strong> NODO </strong>
        </a>

        <div class="navbar-burger burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
            <div class="navbar-item has-dropdown is-hoverable">
                @if(Auth::check())
                    <a class="navbar-link is-active" href="#">
                        Tasks
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item is-active" href="{{ route('task.index') }}">
                            All Tasks
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    @if(Auth::guest())
                        <p class="control">
                            <a
                                class="button"
                                href="{{ route('login') }}"
                                class="button navbar-item"
                            >
                                <span class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </span>
                                <span>
                                    Login
                                </span>
                            </a>
                        </p>
                        <p class="control">
                            <a
                                class="button is-primary"
                                href="{{ route('register') }}"
                                class="button navbar-item"
                            >
                                <span class="icon">
                                    <i class="fa fa-user-plus"></i>
                                </span>
                                <span>Register</span>
                            </a>
                        </p>
                    @else
                        <p class="control">
                            <a class="button is-default" href="{{ route('logout') }}"
                               onclick="
                               event.preventDefault();
                               document.getElementById('logout-form').submit();
                               ">
                                <span class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </span>
                                <span>
                                    Logout
                                </span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
