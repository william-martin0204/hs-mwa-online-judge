<x-site-layout>
    <h1 class="text-4xl font-extrabold my-5">{{$problem->id}} - {{$problem->title}}</h1>

    <div>
        @foreach ($problem->tags as $tag)
            <span class="bg-blue-100 mx-1 p-1 rounded-lg">
                {{$tag->name}}
            </span>
        @endforeach
    </div>

    <div>
        <h2 class="text-2xl font-bold my-5">Description</h2>
        <p>{{$problem->description}}</p>

        <h2 class="text-2xl font-bold my-5">Example Input</h2>
        <p>{{$problem->example_input}}</p>

        <h2 class="text-2xl font-bold my-5">Example Output</h2>
        <p>{{$problem->example_output}}</p>
    </div>
</x-site-layout>
