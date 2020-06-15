<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('admin/assets/images/logo.png') }}" width="180" alt="Aero"></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info justify-content-center">
                    {{-- <a class="image" href="profile.html"><img src="{{ asset('admin/assets/images/profile_av.jpg') }}" alt="User"></a> --}}
                    <div class="detail">
                        <h4>{{ Auth::user()->name }}</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="{{ route('admin-dashboard') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li><a href="{{ route('admin-profile') }}"><i class="zmdi zmdi-account"></i><span>Our Profile</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>CMS</span></a>
                <ul class="ml-menu">
                    <li><a href="{{ route('home-page') }}">Homepage</a></li>
                    <li><a href="{{ route('about-page') }}">About Us</a></li>
                    <li><a href="{{ route('faq.index') }}">Faqs</a></li>
                    <li><a href="{{ route('contact-page') }}">Contact Us</a></li>   
                    <li><a href="{{ route('social-links') }}">Social Links</a></li>                   
                </ul>
            </li>
            <li><a href="javascript:void(0);"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="zmdi zmdi-account"></i><span>Logout</span></a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </div>
</aside>