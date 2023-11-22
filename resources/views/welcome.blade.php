<x-site-layout title="Pro-coder Realm Online Judge">

    <h2 class="text-2xl font-extrabold text-center my-5">Try these problems</h2>

    <div class="flex items-center justify-around">
        <div class="grid xl:grid-cols-4 lg:grid-cols-2">
            @foreach ($problems as $problem)
                <a href="{{ route('problems.show', $problem) }}" class="max-w-sm rounded overflow-hidden shadow-lg p-4">
                    <div class="font-bold text-lg mb-2">
                        <p >{{ $problem->id }}-{{ Str::limit($problem->title, 30) }}</p>
                    </div>

                    <div class="flex flex-col space-between">
                        <p class="text-gray-700 text-base">{{ Str::limit($problem->description, 200) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <h2 class="text-2xl font-extrabold text-center my-5">Top 10 users</h2>

    <div class="my-5 flex justify-center">
        <table class="border-collapse">
            <thead>
                <tr>
                    <th class="border border-gray-700">Rank</th>
                    <th class="border border-gray-700">User</th>
                    <th class="border border-gray-700">Solved</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sorted_users as $user)
                    <tr>
                        <td class="border border-gray-700 text-center">{{$loop->index + 1}}</td>
                        <td class="border border-gray-700 underline font-bold"><a href={{route('profile.show', $user)}}>{{$user->name}}</a></td>
                        <td class="border border-gray-700 text-center">{{$user->accepted_problems_count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-site-layout>
