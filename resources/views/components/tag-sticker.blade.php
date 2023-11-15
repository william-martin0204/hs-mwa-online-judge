<a href={{route(Route::is('admin.*') ? 'admin.tags.show' : 'tags.show', $tag)}} class="bg-blue-100 mx-1 p-1 rounded-lg">
    {{$tag->name}}
</a>
