<div class="m-2 flex flex-wrap">
    @foreach ($tags as $tag)
        <div class="p-1 m-1 bg-yellow-100 border-2 border-yellow-300 flex whitespace-nowrap items-center">
            <input type="checkbox" name="tags[]" value={{$tag->id}} class="w-4 h-4 mr-1"
                @if (is_null(old('tags')) && in_array($tag->id, $currenttags)) checked
                @elseif (is_array(old('tags')) && (in_array($tag->id, old('tags')))) checked
                {{-- @if (is_array(old('tags')) && (in_array($tag->id, old('tags'))) || in_array($tag->id, $currenttags)) checked --}}
                @endif>
            {{$tag->name}}
        </div>
    @endforeach
</div>
