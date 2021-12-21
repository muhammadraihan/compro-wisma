<ul id="js-nav-menu" class="nav-menu">
    <li>
        <a href="{{route('backoffice.dashboard')}}" title="Dashboard" data-filter-tags="dashboard">
            <i class="fal fa-desktop"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{route('room.index')}}" title="Room" data-filter-tags="room">
            <i class="fal fa-bed"></i>
            <span class="nav-link-text">Room</span>
        </a>
    </li>
    <li>
        <a href="{{route('wisma.index')}}" title="Wisma" data-filter-tags="wisma">
            <i class="fal fa-home"></i>
            <span class="nav-link-text">Wisma</span>
        </a>
    </li>
    <li>
        <a href="{{route('gallery.index')}}" title="Gallery" data-filter-tags="gallery">
            <i class="fal fa-file-image"></i>
            <span class="nav-link-text">Gallery</span>
        </a>
    </li>
    <li>
        <a href="{{route('about.index')}}" title="About Us" data-filter-tags="aboutus">
            <i class="fal fa-list-alt"></i>
            <span class="nav-link-text">About Us</span>
        </a>
    </li>
    <li>
        <a href="{{route('sosmed.index')}}" title="Social Media" data-filter-tags="socialmedia">
            <i class="fal fa-address-card"></i>
            <span class="nav-link-text">Social Media</span>
        </a>
    </li>
    @isset($menu)
    @foreach ($menu as $parent_menu)
    <li class="">
        <a href="{{$parent_menu->route_name ? route($parent_menu->route_name): '#'}}"
            title="{{$parent_menu->menu_title ? $parent_menu->menu_title:''}}">
            <i class="{{$parent_menu->icon_class ? $parent_menu->icon_class:''}}"></i>
            <span class="nav-link-text">{{$parent_menu->menu_title ?$parent_menu->menu_title:''}}</span>
        </a>
        @if (count($parent_menu->childs))
        <ul>
            @include('partials.submenu',['submenu' => $parent_menu->childs])
        </ul>
        @endif
    </li>
    @endforeach
    @endisset
</ul>