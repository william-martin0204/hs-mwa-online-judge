<x-site-layout>
    <h2 class="text-2xl font-extrabold text my-5">Submission ID: {{$submission->id}}</h2>
    <h2 class="text-xl text">Problem:
        <a href="{{route('problems.show', $submission->problem->id)}}" class="font-bold underline">
            {{$submission->problem->id}} - {{$submission->problem->title}}
        </a>
    </h2>

    <div class="text-xl mt-3 text bg-{{$submission->status == 'Accepted' ? 'green' : 'red'}}-500 rounded-lg font-bold text-white inline-block p-1">
        {{$submission->status}}
    </div>

    <h2 class="text-xl text">User: {{$submission->user->name}}</h2>

    <div class="text-l mt-3 text bg-purple-500 rounded-lg font-bold text-white inline-block p-1">{{$submission->language}}</div>

    <div class="my-5 bg-white border-2 border-black rounded-lg p-5">
        <code>
            {{$submission->code}}
        </code>
    </div>
</x-site-layout>
