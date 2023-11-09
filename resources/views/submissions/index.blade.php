<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Submissions</h1>

    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">User</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Language</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Problem</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Code</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $submission)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{$submission->id}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$submission->user->name}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$submission->language}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$submission->problem->title}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{$submission->status}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">See Code</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-site-layout>
