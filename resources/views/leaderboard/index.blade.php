<x-site-layout title="Leaderboard">

    <div class="max-w-4xl m-auto">
        <div class="mb-3">
            {{$sorted_users->links()}}
        </div>

        <div class="bg-white overflow-auto">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr>
                        <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Rank</th>
                        <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">User</th>
                        <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Solved Problems</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sorted_users as $user)
                        <tr class="hover:bg-grey-lighter">
                            <td class="text-center py-4 px-6 border-b border-grey-light">{{$user->rank}}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                <a href="{{route('profile.show', $user)}}" class="font-bold underline">
                                    {{$user->name}}
                                </a>
                            </td>
                            <td class="text-center py-4 px-6 border-b border-grey-light">{{$user->accepted_problems_count}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-site-layout>

