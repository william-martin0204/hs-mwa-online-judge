<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Problems</h1>

    <x-success-message />

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
            <a href={{route('admin.problems.show', $problem->id)}} class="underline">
                {{$problem->id}} - {{$problem->title}}
            </a>

            <div>
                <a href={{route('admin.problems.edit', $problem->id)}} class="underline">Edit</a>
                &nbsp;|&nbsp;
                <form action={{route('admin.problems.destroy', $problem->id)}} method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="underline font-bold">Delete</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

</x-site-layout>
