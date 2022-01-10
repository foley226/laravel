@extends('layouts.app')



@section('content')
        <div class="m-auto w-4/8 py-24">
            <div class="text-center">
                <h1 class="text-5xl uppercase bold">
                    Create Car
                </h1>
            </div>
        </div>
            <!------- input form -------->
            <div class="flex justify-center pt-20">
                <form action="/cars" method="POST">
                    @csrf
                    <div class="block">
                        <input
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-80 italic
                            placeholder-gray-400"
                            name="name"
                            placeholder="Brand name...">

                        <input
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-80 italic
                            placeholder-gray-400"
                            name="founded"
                            placeholder="Year founded...">

                        <input
                            type="text"
                            class="block shadow-5xl mb-10 p-2 w-80 italic
                            placeholder-gray-400"
                            name="description"
                            placeholder="Description...">

                    </div>
                    <button class="bg-red-500 text-white block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                            Submit
                    </button>
                </form>
            </div>
        </div>
    @if($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 list-none">
                        {{ $error }}
                </li>
            @endforeach
        </div>
    @endif
    @endsection
