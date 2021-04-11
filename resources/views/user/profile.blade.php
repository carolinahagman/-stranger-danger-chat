@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm md:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ $user->username }}'s Profile
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

                <div class="py-5">
                    <div class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                        <div class="flex flex-wrap flex-row">
                            <p class="text-gray-900 font-medium">Username:</p>
                            <p class="text-gray-700 italic pl-2">{{ $user->username }}</p>
                        </div>

                        <div class="flex flex-wrap flex-row">
                            <p class="text-gray-900 font-medium">Email:</p>
                            <p class="text-gray-700 italic pl-2">{{ $user->email }}</p>
                        </div>

                        <div class="flex flex-wrap flex-row">
                            <p class="text-gray-900 font-medium">Member since:</p>
                            <p class="text-gray-700 italic pl-2">{{ $user->created_at }}</p>
                        </div>

                        <div class="flex flex-wrap pt-5">
                            <a href="{{ route('user.edit', Auth::user()->id) }}" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-center text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                                {{ __('Edit Profile') }}
                            </a>
                        </div>
                        <div class="flex flex-wrap">
                            <a href="{{ route('password.edit') }}" class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-center text-gray-100 bg-indigo-600 hover:bg-indigo-700 sm:py-4">
                                {{ __('Change Password') }}
                            </a>
                        </div>
                        <form class="flex flex-wrap flex-col justify-center items-center" method="POST" action="{{ route('deleteuser', $user->id) }}">
                            @csrf
                            <input class="text-gray-700 w-64 appearance-none border rounded-lg py-2 text-center text-sm mb-2" type="text" name="username" placeholder="Enter username to comfirm deletion">
                            @error('username')
                            <p class="text-red-500 text-xs italic mb-2">
                                {{ $message }}
                            </p>
                            @enderror
                            <button class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-center text-gray-100 bg-red-500 hover:bg-red-700 sm:py-4" type="username">Delete Account</button>
                        </form>
                    </div>
                </div>

                <div class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ $user->username }}'s Current Chats
                </div>

                <div class="py-5">
                    <div class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8">
                        <div class="flex flex-wrap flex-row">
                            <p class="text-black">Chat 1:</p>
                            <p class="text-green-700 italic pl-2">1337haxx0r</p>
                        </div>

                        <div class="flex flex-wrap flex-row">
                            <p class="text-black">Chat 2:</p>
                            <p class="text-red-700 italic pl-2">neverOnline</p>
                        </div>

                        <div class="flex flex-wrap flex-row">
                            <p class="text-black">Chat 3:</p>
                            <p class="text-green-700 italic pl-2">Player</p>
                        </div>

                        <div class="flex flex-wrap flex-row">
                            <p class="text-black">Chat 4:</p>
                            <p class="text-green-700 italic pl-2">é@£©é∂8f901uj</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>
@endsection