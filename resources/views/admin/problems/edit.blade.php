<x-site-layout title="{{$problem->id}} - {{$problem->title}}">

    <form action={{route('admin.problems.update', $problem)}} method="POST" enctype="multipart/form-data" class="w-5/6 mx-auto">
        @csrf
        @method('PUT')

        <x-input-text-field name="title" label="Title" :value="$problem->title"/>
        <x-tag-selector :tags="$tags" :currenttags="$problem->tags"/>
        <x-input-field-rich-text name="description" label="Description" :value="$problem->description"/>
        <x-input-textarea-field name="example_input" label="Example Input" :value="$problem->example_input"/>
        <x-input-textarea-field name="example_output" label="Example Output" :value="$problem->example_output"/>

        <x-input-file name="input_testcases" label="Input Testcases" />
        <x-input-file name="output_testcases" label="Output Testcases" />

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Update</button>
        </div>

    </form>

</x-site-layout>
