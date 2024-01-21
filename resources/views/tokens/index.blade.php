<x-site_layout title="Your API Tokens">

    @if (session('success_token'))
        <div class="bg-green-500 text-white p-4 mb-4">
            Your new token is: <strong>{{ session('success_token') }}</strong>. Please copy it now, you won't be able to see it again.
        </div>

    @endif

    <form class="flex items-center" autocomplete="off" action="{{route('tokens.store')}}" method="POST">
        @csrf
        <div class="relative w-1/2 m-2">
            <input type="text" name="name" value="{{request()->input('search')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name your new token">
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-bold text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create
        </button>
    </form>

    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse">
            <thead>
                <tr>
                    <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                    <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Created</th>
                    <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tokens as $token)
                    <tr>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $token['name'] }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $token['created_at'] }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">
                            <form action="{{ route('tokens.destroy', $token['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-site_layout>
