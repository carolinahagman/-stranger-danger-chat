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
                    <div> {{ $chat->users->where('id', '!=', Auth::user()->id)->first()->username }}</div>
                </header>

                <div class="w-full p-6">
                    @foreach ($chat->messages as $message)
                        <div class="mb-5">
                            <h4 class="font-bold ">{{ $message->user->username }}</h4>
                            {{ $message->message }}
                        </div>

                    @endforeach
                </div>
                <form action="/home/chats/{{ $chat->id }}/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    <input class=" border-solid border-2 border-black" type="text" name="message" id="message">
                    <button type="submit">Send</button>
                </form>
            </section>

    </main>


@endsection
