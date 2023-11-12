<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Create Tag</h1>

    <form action={{route('admin.tags.store')}} method="POST" class="w-5/6 max-w-xl mx-auto">
        @csrf

        <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border-2 rounded-lg p-2">
        </div>

        <div class="flex flex-col">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="border-2 rounded-lg p-2"></textarea>
        </div>

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Create</button>
        </div>

    </form>

</x-site-layout>
