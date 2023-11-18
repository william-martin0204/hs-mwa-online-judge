<x-site-layout title="Submission ID: {{$submission->id}}">

    <h2 class="text-xl text">Problem:
        <a href="{{route('problems.show', $submission->problem)}}" class="font-bold underline">
            {{$submission->problem->id}} - {{$submission->problem->title}}
        </a>
    </h2>

    <div class="text-xl mt-3 text bg-{{$submission->status == 'Accepted' ? 'green' : 'red'}}-500 rounded-lg font-bold text-white inline-block p-1">
        {{$submission->status}}
    </div>

    <h2 class="text-xl text">User:
        <a href="{{route('profile.show', $submission->user)}}" class="font-bold underline">
            {{$submission->user->name}}
        </a>
    </h2>

    <div class="text-l mt-3 text bg-purple-500 rounded-lg font-bold text-white inline-block p-1">{{$submission->language}}</div>

    <x-in-out-area title="Code" :value="$submission->code"></x-in-out-area>
</x-site-layout>
