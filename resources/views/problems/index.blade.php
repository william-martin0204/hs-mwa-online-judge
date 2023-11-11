<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Problems</h1>

    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Problem</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Tags</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($problems as $problem)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">N/A</td>
                        <td class="py-4 px-6 border-b border-grey-light underline font-bold">
                            <a href="{{route('problems.show', $problem->id)}}">{{$problem->id}} - {{$problem->title}}</a>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">

                            @foreach ($problem->tags as $tag)
                                <span class="bg-blue-100 mx-1 p-1 rounded-lg">
                                    {{$tag->name}}
                                </span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-site-layout>
