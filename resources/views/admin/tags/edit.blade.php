<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Edit Tag: {{$tag->name}}</h1>

    <form action={{route('admin.tags.update', $tag->id)}} method="POST" class="w-5/6 max-w-xl mx-auto">
        @csrf
        @method('PUT')

        <x-input-text-field name="name" label="Name" :value="$tag->name"/>

        <x-input-textarea-field name="description" label="Description" :value="$tag->description"/>

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Update</button>
        </div>
    </form>

</x-site-layout>
