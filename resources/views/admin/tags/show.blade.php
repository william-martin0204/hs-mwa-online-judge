<x-site-layout>
    <h1 class="text-4xl font-extrabold my-5">Tag: {{$tag->name}}</h1>

    <h2 class="text-2xl font-bold my-5">Description</h2>
    <p>{{$tag->description}}</p>

    <div class="my-4">
        <a href={{route('admin.tags.edit', $tag)}}>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                Edit
            </button>
        </a>
        <form action={{route('admin.tags.destroy', $tag)}} method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Delete</button>
        </form>
        {{-- <a href={{route('admin.tags.destroy', $tag->id)}}>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                Delete
            </button>
        </a> --}}
    </div>

</x-site-layout>
