<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">{{$user->name}}</h1>

    <div class="flex justify-center">
        @if ($user->media->isEmpty())
            <div class="bg-blue-400 w-40 h-40 text-white bold text-7xl grid items-center justify-items-center rounded-full">
                {{$user->name[0]}}
            </div>
        @else
            <div class="border-2 border-blue-300 rounded-full">
                <img class="rounded-full h-40 w-40 m-auto" src="{{$user->media->first()->getUrl()}}" alt="{{$user->name}}">
            </div>
        @endif
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
