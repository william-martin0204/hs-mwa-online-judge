<div class="flex items-center justify-around">
    @if($loading)
        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"></div>
    @else
        <div class="grid xl:grid-cols-4 lg:grid-cols-2">
            @foreach ($contests as $contest)
                <a href="https://codeforces.com/contest/{{$contest['id']}}" target="_blank" class="max-w-sm bg-blue-100 rounded overflow-hidden shadow-lg p-4 my-2">
                    <div class="font-bold text-lg mb-2">
                        <p >{{ $contest['name'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
