<a href={{route(Route::is('admin.*') ? 'admin.tags.show' : 'tags.show', $index)}} class="bg-blue-100 mx-1 p-1 rounded-lg">
    {{$name}}
</a>
