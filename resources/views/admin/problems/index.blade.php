<x-site-layout title="Problems">

    <x-success-message />

    <x-search-bar placeholder="Search problem by title or id..." />

    <div class="mb-3">
        {{$problems->links()}}
    </div>

    <div class="mb-5">
        <a href={{route('admin.problems.create')}}>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                Create Problem
            </button>
        </a>
    </div>

    <ul class="grid lg:grid-cols-2 md:grid-cols-2 gap-x-3">
        @foreach ($problems as $problem)
        <li class="bg-white my-2 p-2 font-bold shadow-md flex place-content-between">
            <a href={{route('admin.problems.show', $problem)}} class="underline">
                {{$problem->id}} - {{$problem->title}}
            </a>

            <div>
                <a href={{route('admin.problems.edit', $problem)}} class="underline">Edit</a>
                &nbsp;|&nbsp;
                <form action={{route('admin.problems.destroy', $problem)}} method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="underline font-bold">Delete</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

</x-site-layout>
