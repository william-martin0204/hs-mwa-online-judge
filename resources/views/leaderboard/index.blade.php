<x-site-layout>
    <h1 class="text-4xl font-extrabold text-center my-5">Leaderboard</h1>

    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Rank</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">User</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Solved Problems</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sorted_users as $user)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{$loop->index + 1}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$user->name}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$user->accepted_problems_count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-site-layout>

