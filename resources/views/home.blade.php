@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">

            <header class="flex justify-between font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            <div> {{ Auth::user()->username}}</div> <button>start new chat</button>
           
            </header>

            <div class="w-full p-6">

            <!-- foreach chat -->
            <a href="" class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
            <div class="flex-shrink-0">
                <img class="h-12 w-12" src="http://cdn.onlinewebfonts.com/svg/img_397748.png" alt="ChitChat Logo">
            </div>
       @foreach     
            <div>
                <div class="text-xl font-medium text-black">username</div>
                <!-- show latest message  -->
                <p class="text-gray-400">the latest message</p>
            </div>
            @endforeach
            </a>
        </div>
          
        </section>
    
</main>
@endsection
