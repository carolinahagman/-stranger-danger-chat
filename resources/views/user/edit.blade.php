@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm md:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Update Profile') }}
                </header>

                @if (session('success'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8 pb-5" method="POST" action="{{ route('user.update', Auth::user()->id) }}">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Username') }}:
                        </label>

                        <input id="username" type="text" class="form-input w-full @error('username')  border-red-500 @enderror" name="username" value="{{ $user->username }}" autocomplete="username" autofocus>

                        @error('username')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Email') }}:
                        </label>

                        <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ $user->email }}" autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
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