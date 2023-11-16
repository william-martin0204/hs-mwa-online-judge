<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="cursor-pointer relative border-2 border-blue-300 realtive text-white font-bold w-40 h-40 rounded-full overflow-hidden bg-blue-400 focus:outline-none">
            @if (auth()->user()->media->count() > 0)
                <img src="{{auth()->user()->media->first()->getUrl()}}" alt="{{auth()->user()->name[0]}}" />
            @else
                <div class="w-full h-full top-0 grid items-center justify-items-center font-bold text-7xl select-none">
                    {{auth()->user()->name[0]}}
                </div>
            @endif
            <div class="absolute w-full h-full top-0 opacity-0 hover:opacity-100 grid items-center justify-items-center" style="background-color: rgba(159, 159, 159, 0.42)">
                <i class="fas fa-edit text-4xl text-white"></i>
            </div>
        </div>

        <x-input-text-field name="name" label="Name" :value="$user->name" />

        <div>
            <x-input-text-field name="email" label="Email" :value="$user->email" type='email' />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
