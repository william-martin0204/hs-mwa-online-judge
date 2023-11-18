<x-site-layout title="{{$user->name}} - Rank: {{$rank}}">

    <div class="flex justify-center">
        <div class="border-2 border-blue-300 rounded-full">
            <img class="rounded-full h-40 w-40 m-auto" src="{{$user->getAvatar()}}" alt="{{$user->name}}">
        </div>
    </div>

    @if (auth()->user()->id == $user->id)
        <div class="flex justify-center mt-3">
            <a href={{route('profile.edit')}} class="bg-blue-500 text-white font-bold p-2 rounded-lg shadow-md">Edit Profile</a>
        </div>
    @endif

    <h2 class="text-2xl font-bold my-5">Solved Problems:
        {{$user->submissions->where('status', 'Accepted')->groupBy('problem_id')->count()}}
    </h2>

    <h2 class="text-2xl font-bold my-5">Total Submissions:
        <a class="text-blue-500 underline" href={{route('submissions.index', ['user_id' => $user->id])}}>{{$user->submissions->count()}}</a>
    </h2>

    <h2 class="text-2xl font-bold my-5">Accepted submissions:
        <a class="text-blue-500 underline" href={{route('submissions.index', ['user_id' => $user->id, 'status' => 'Accepted'])}}>
            {{$user->submissions->where('status', 'Accepted')->count()}}
        </a>
    </h2>
</x-site-layout>
