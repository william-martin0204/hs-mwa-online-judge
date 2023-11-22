@auth
    @if (!auth()->user()->email_verified_at)
        <a class="font-bold underline" href="{{route('verification.notice')}}">
            <div class="bg-red-200 p-4 border-2 border-red-500">
                Please verify your email
            </div>
        </a>
    @endif
@endauth
