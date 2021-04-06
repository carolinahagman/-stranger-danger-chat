@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm md:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Edit Profile
            </header>

            <div class="w-full p-6">
                <p class="text-gray-700">Welcome {{ $user->username }}!</p>

                <form action="" method="" enctype="multipart/form-data">
                    <label class="block mt-5">
                        <span>Email:</span>
                        <input class="border-gray-400 border-2 py-2 pl-2 rounded-md" type="email" name="email" id="email" value="{{ $user->email }}">
                    </label>
                    <button class="bg-blue-600 hover:bg-blue-400 py-4 w-32 rounded-full text-white mt-5" type="submit">Update</button>
                </form>
            </div>
        </section>
    </div>
</main>
@endsection