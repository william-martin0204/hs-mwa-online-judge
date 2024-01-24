<x-site-layout title="Contacts">
    <div class="container-fluid">

        {{ $contacts->links() }}

        <div class="row">
            <div class="bg-white overflow-auto">
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Email</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Message</th>
                            <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->name }}</td>
                                <td class="py-4 px-6 border-b border-grey-light underline font-bold"><a href="mailto:{{$contact->email}}">{{ $contact->email }}</a></td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->message }}</td>
                                <td class="py-4 px-6 border-b border-grey-light">{{ $contact->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-site-layout>
