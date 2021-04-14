@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm md:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Change Password') }}
                </header>

                @if (session('success'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3" role="alert">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="text-sm border border-t-8 rounded text-red-700 border-red-600 bg-red-100 px-3" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 pb-5" method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="currentPassword" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Current Password') }}:
                        </label>

                        <input id="currentPassword" type="password" class="text-gray-700 appearance-none border rounded-lg
                                        py-2 text-center text-sm mb-2 w-full @error('currentPassword') border-red-500 @enderror" name="currentPassword" autocomplete="new-password">

                        @error('currentPassword')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="newPassword" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('New Password') }}:
                        </label>

                        <input id="newPassword" type="password" class="text-gray-700 appearance-none border rounded-lg
                                        py-2 text-center text-sm mb-2 w-full @error('newPassword') border-red-500 @enderror" name="newPassword" autocomplete="new-password">

                        @error('newPassword')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm New Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="text-gray-700 appearance-none border rounded-lg
                                py-2 text-center text-sm mb-2 w-full" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Save Changes') }}
                        </button>
                    </div>

                    <div class="flex flex-wrap">
                        <a href="{{ route('user.profile', Auth::user()->id) }}" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-center text-gray-100 bg-indigo-600 hover:bg-indigo-700 sm:py-4">{{ __('Go Back') }}</a>
                    </div>
                </form>

            </section>
        </div>
    </div>
</main>
@endsection