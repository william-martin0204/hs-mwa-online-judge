<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Create Problem</h1>

    <form action={{route('admin.problems.store')}} method="POST" class="w-5/6 mx-auto">
        @csrf

        <x-input-text-field name="title" label="Title"/>

        <div class="m-2 flex flex-wrap">
            @foreach ($tags as $tag)
                <div class="p-1 m-1 bg-yellow-100 border-2 border-yellow-300 flex whitespace-nowrap items-center">
                    <input type="checkbox" name={{"tags[$tag->id]"}}" class="w-4 h-4 mr-1">
                    <label for={{"tags[$tag->id]"}}>{{$tag->name}}</label>
                </div>
            @endforeach
        </div>

        <x-input-textarea-field name="description" label="Description"/>
        <x-input-textarea-field name="example_input" label="Example Input"/>
        <x-input-textarea-field name="example_output" label="Example Output"/>

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Create</button>
        </div>

    </form>

</x-site-layout>
