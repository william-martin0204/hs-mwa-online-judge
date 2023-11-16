<x-site-layout>

    <h1 class="text-4xl font-extrabold text-center my-5">Problems</h1>

    <div class="mb-3">
        {{$problems->links()}}
    </div>

    <div class="bg-white overflow-auto">
        <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Problem</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Tags</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($problems as $problem)
                    <tr class="hover:bg-grey-lighter">
                        <td class="text-center py-4 px-6 border-b border-grey-light">
                            @auth
                                @if (Auth::user()->submissions->where('status', 'Accepted')->contains('problem_id', $problem->id))
                                    <i class="fas fa-check text-green-500"></i>
                                @elseif (Auth::user()->submissions->where('problem_id', $problem->id)->count() > 0)
                                    <i class="fas fa-times text-red-500"></i>
                                @endif
                            @endauth
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light underline font-bold">
                            <a href="{{route('problems.show', $problem)}}">{{$problem->id}} - {{$problem->title}}</a>
                        </td>
                        <td class="py-4 px-6 border-b border-grey-light">

                            @foreach ($problem->tags as $tag)
                                <x-tag-sticker :tag="$tag" />
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-site-layout>
