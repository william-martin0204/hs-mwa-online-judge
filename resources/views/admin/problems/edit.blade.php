<x-site-layout>
    <h1 class="text-4xl font-extrabold my-5">{{$problem->id}} - {{$problem->title}}</h1>

    <form action={{route('admin.problems.update', $problem)}} method="POST" class="w-5/6 mx-auto">
        @csrf
        @method('PUT')

        <x-input-text-field name="title" label="Title" :value="$problem->title"/>
        <x-tag-selector :tags="$tags" :currenttags="$problem->tags"/>
        <x-input-textarea-field name="description" label="Description" :value="$problem->description"/>
        <x-input-textarea-field name="example_input" label="Example Input" :value="$problem->example_input"/>
        <x-input-textarea-field name="example_output" label="Example Output" :value="$problem->example_output"/>

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Update</button>
        </div>

    </form>

</x-site-layout>
