<x-site-layout title="Tag: {{$tag->name}}">

    <h2 class="text-2xl font-bold my-5">Description</h2>
        <p>{{$tag->description}}</p>

    <h2 class="text-2xl font-bold my-5">Problems: {{$tag->problems->count()}}</h2>

    <div>
        @foreach ($tag->problems as $problem)
            <a class="font-bold underline" href="{{route('problems.show', $problem)}}">
                {{$problem->id}} - {{$problem->title}}
            </a>
            <br>
        @endforeach
    </div>

</x-site-layout>
