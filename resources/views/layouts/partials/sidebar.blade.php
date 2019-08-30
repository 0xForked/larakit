<div class="side-left">
    <div class="shortcut">
        <div class="emblemapp">
            <img src="{{ asset('images/emblemapp.png') }}" height="29" alt="">
        </div>
        <div class="menus">
            <div class="item-menu {{ (Request::segment(2) == '') ? '' : 'inactive' }}">
                <a href="{{ route('dash.home') }}">
                    <p class="icon-item-menu">
                        <i class="fab fa-delicious"></i>
                    </p>
                </a>
            </div>


            <div class="item-menu {{ (Request::segment(2) == 'messages') ? '' : 'inactive' }}">
                <a href="{{ route('dash.messages') }}">
                    <p class="icon-item-menu">
                        <i class="far fa-envelope"></i>
                    </p>
                </a>
            </div>

            <div class="item-menu {{ (Request::segment(2) == 'contacts') ? '' : 'inactive' }}">
                <a href="{{ route('dash.contacts') }}">
                    <p class="icon-item-menu">
                        <i class="fas fa-users"></i>
                    </p>
                </a>
            </div>

            <div class="item-menu {{ (Request::segment(2) == 'settings') ? '' : 'inactive' }}">
                <a href="{{ route('dash.settings') }}">
                    <p class="icon-item-menu">
                        <i class="fas fa-cogs"></i>
                    </p>
                </a>
            </div>

            <div class="item-menu {{ (Request::segment(2) == 'account') ? '' : 'inactive' }}">
                <a href="{{ route('dash.account') }}">
                    <p class="icon-item-menu">
                        <i class="far fa-user"></i>
                    </p>
                </a>
            </div>

            <div class="item-menu inactive">
                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <p class="icon-item-menu">
                        <i class="fas fa-power-off"></i>
                    </p>
                </a>
            </div>
        </div>
    </div>
    <div class="admin-profile">
        <div class="admin-picture">
            <img src="{{ asset('images/admin_picture.png') }}" alt="">
        </div>
        <p class="admin-name">
            {{ Auth::user()->name }} <span class="caret"></span>
        </p>
        <p class="admin-level">
            Super Admin
        </p>
        <ul class="admin-menus">
            <a href="{{ route('dash.home') }}">
                <li class="{{ (Request::segment(2) == '') ? 'active-link' : '' }}">
                    My Dashboard
                </li>
            </a>

            <a href="{{ route('dash.messages') }}">
                <li class="{{ (Request::segment(2) == 'messages') ? 'active-link' : '' }}">
                    SMS
                </li>
            </a>

            <a href="{{ route('dash.contacts') }}">
                <li class="{{ (Request::segment(2) == 'contacts') ? 'active-link' : '' }}">
                    Contacts
                </li>
            </a>

            <a href="{{ route('dash.settings') }}">
                <li class="{{ (Request::segment(2) == 'settings') ? 'active-link' : '' }}">
                    Settings
                </li>
            </a>

            <a href="{{ route('dash.account') }}">
                <li class="{{ (Request::segment(2) == 'account') ? 'active-link' : '' }}">
                    My Account
                </li>
            </a>
            <a
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                <li style="padding-top: 120px;">
                    {{ __('Log Out') }}
                </li>
            </a>
        </ul>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
