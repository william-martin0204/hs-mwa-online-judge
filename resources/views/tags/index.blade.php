<x-site-layout title="Tags">

    <div class="mb-3">
        {{$tags->links()}}
    </div>

    <ul class="grid lg:grid-cols-2 md:grid-cols-1 gap-4">
        @foreach ($tags as $tag)

        <li class="block p-2 shadow-xl bg-white rounded-lg">
            <a href={{route('tags.show', $tag)}} class="h-full block">
                <p class="text-xl font-bold">{{ $tag->name }}</p>
                <p class="font-bold">{{ $tag->problems->count() }} problems</p>
                <p class="text-gray-500">{{ $tag->description }}</p>
            </a>
        </li>

        @endforeach
    </ul>

</x-site-layout>
