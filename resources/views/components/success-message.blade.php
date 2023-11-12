@if (session()->has('success_notification'))
    <div class="p-2 bg-green-50 border border-green-200 text-green-500 mb-4 rounded">
        {{ session()->get('success_notification') }}
    </div>
@endif
