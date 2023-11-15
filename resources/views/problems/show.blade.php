<x-site-layout>

    <div class="flex items-center">
        <h1 class="text-4xl font-extrabold my-5 mr-5">{{$problem->id}} - {{$problem->title}} </h1>
        @auth
            @if (Auth::user()->submissions->where('status', 'Accepted')->contains('problem_id', $problem->id))
                <i class="fas fa-check fa-lg text-green-500"></i>
            @elseif (Auth::user()->submissions->where('problem_id', $problem->id)->count() > 0)
                <i class="fas fa-times fa-lg text-red-500"></i>
            @endif
        @endauth
    </div>

    <div>
        @foreach ($problem->tags as $tag)
            <x-tag-sticker index="{{$tag->id}}" name="{{$tag->name}}" />
        @endforeach
    </div>

    <div class="my-3 font-bold text-blue-600">
        <a class="m-2 underline" href={{route('submissions.index', ['problem_id' => $problem->id, 'status' => 'Accepted'])}}>All Solutions</a>
        @auth
            <a class="m-2 underline" href={{route('submissions.index', ['problem_id' => $problem->id, 'user_id' => auth()->user()->id])}}>My Submissions</a>
        @endauth
    </div>

    <div>
        <h2 class="text-2xl font-bold my-5">Description</h2>
        <p>{{$problem->description}}</p>

        <x-in-out-area title="Example Input" :value="$problem->example_input" />
        <x-in-out-area title="Example Output" :value="$problem->example_output" />
    </div>

    <h2 class="text-2xl font-bold my-5">Solution</h2>

    @guest
        <div class="my-3 underline font-bold text-blue-600">
            <a href={{route('login')}}>Login to submit a solution</a>
        </div>
    @endguest

    @auth
        <form action={{route('submissions.store')}} method="POST">
            @csrf

            <input type="hidden" name="problem_id" value="{{$problem->id}}">

            <select name="language" id="language" class="border-2 rounded-lg p-2 shadow-sm bg-white font-bold my-3">
                <option value="C++">C++</option>
                <option value="Python">Python</option>
                <option value="Javascript">Javascript</option>
            </select>

            <x-input-textarea-field name="code" label="Your Code Here:" />

            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Submit</button>
        </form>
    @endauth
</x-site-layout>
