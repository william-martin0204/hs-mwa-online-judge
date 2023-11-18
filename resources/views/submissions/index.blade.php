<x-site-layout title="Submissions">

    <div class="mb-3">
        {{$submissions->links()}}
    </div>

    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">User</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Language</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Problem</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                    <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Code</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $submission)
                    <tr class="hover:bg-grey-lighter">
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{$submission->id}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="{{route('profile.show', $submission->user)}}" class="font-bold underline">
                                {{$submission->user->name}}
                            </a>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$submission->language}}</td>
                        <td class="py-4 px-6 border-b border-grey-light underline font-bold">
                            <a href="{{route('problems.show', $submission->problem)}}">{{$submission->problem->id}} - {{$submission->problem->title}}</a>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light font-bold text-{{$submission->status == 'Accepted' ? 'green' : 'red'}}-500">
                            {{$submission->status}}
                        </td>
                        <td class="text-center py-4 px-6 border-b border-grey-light font-bold">
                            @if (auth()->check() && (auth()->user()->id == $submission->user_id || auth()->user()->is_admin))
                                <a class="underline" href="{{route('submissions.show', $submission->id)}}">See Code</a>
                            @else
                                ----
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-site-layout>
