<nav :class="isOpen ? '': 'hidden'" class="text-white text-base font-semibold pt-3">

    @foreach ($menu_items as $item)

        @if (request()->routeIs($item['route']))
            <a href={{ route($item['route']) }} class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                {{ $item['label'] }}
            </a>
        @elseif ($item['route'] == 'logout')
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="cursor-pointer flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ $item['label'] }}
                </div>
            </form>
        @else
            <a href={{ route($item['route']) }} class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item">
                {{ $item['label'] }}
            </a>
        @endif

    @endforeach
</nav>
