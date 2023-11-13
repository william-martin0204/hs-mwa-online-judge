<x-site-layout>
    <h1 class="text-4xl font-extrabold my-5">{{$problem->id}} - {{$problem->title}}</h1>

    <div>
        @foreach ($problem->tags as $tag)
            <x-tag-sticker index="{{$tag->id}}" name="{{$tag->name}}" />
        @endforeach
    </div>

    <div>
        <h2 class="text-2xl font-bold my-5">Description</h2>
        <p>{{$problem->description}}</p>

        <x-in-out-area title="Example Input" :value="$problem->example_input" />
        <x-in-out-area title="Example Output" :value="$problem->example_output" />
    </div>

    <h2 class="text-2xl font-bold my-5">Solution</h2>

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
</x-site-layout>
