<div class="flex items-center justify-around">
    <div class="grid xl:grid-cols-4 lg:grid-cols-2">
        @foreach ($contests as $contest)
            <a href="https://codeforces.com/contest/{{$contest['id']}}" target="_blank" class="max-w-sm bg-blue-100 rounded overflow-hidden shadow-lg p-4 my-2">
                <div class="font-bold text-lg mb-2">
                    <p >{{ $contest['name'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
