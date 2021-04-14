@extends('layouts.app')




@section('content')

    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm">

                <header
                    class="flex justify-between font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    <p>Welcome {{ Auth::user()->username }}!</p> <a href="/home/chats/new">start new chat</a>

                </header>


                <div class="w-full p-6">
                    @foreach ($chats as $chat)
                        <a href="/home/chats/{{ $chat->id }}"
                            class="p-6 mb-3 max-w-sm mx-auto bg-white rounded-xl shadow-md flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12" src="http://cdn.onlinewebfonts.com/svg/img_397748.png"
                                    alt="ChitChat Logo">
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-blue-400 mb-2">
                                    {{ $chat->users->where('id', '!=', Auth::user()->id)->first()->username }}
                                </h2>
                                <p class="text-gray-500 font-bold text-sm italic">
                                    @if (count($chat->messages))
                                        {{ $chat->messages->last()->user->username }}

                                    @else
                                    @endif

                                </p>
                                <p class="text-gray-400 italic">
                                    @if (count($chat->messages))

                                        {{ implode(' ', array_slice(explode(' ', $chat->messages->last()->message), 0, 5)) }}
                                    @endif

                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

            </section>

    </main>
@endsection
