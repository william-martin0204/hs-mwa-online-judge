<!-- Dropdown Nav -->
<nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">

    @foreach ($menu_items as $item)

        @if (request()->routeIs($item['route']))
            <a href={{ route($item['route']) }} class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                {{ $item['label'] }}
            </a>
        @else
            <a href={{ route($item['route']) }} class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                {{ $item['label'] }}
            </a>
        @endif

    @endforeach

    {{-- <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-tachometer-alt mr-3"></i>
        Welcome
    </a>
    <a href="blank.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
        <i class="fas fa-sticky-note mr-3"></i>
        Problems
    </a>
    <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-table mr-3"></i>
        Submissions
    </a>


    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-user mr-3"></i>
        My Account
    </a>
    <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
        <i class="fas fa-sign-out-alt mr-3"></i>
        Sign Out
    </a> --}}
</nav>
