@extends('layouts.app')

@section('content')
  <div class="m-auto w-4/5 py-24">
      <div class="text-center">
          <h1 class="text-5xl uppercase bold">
              Cars
          </h1>
      </div>

      @if (Auth::user())
      <div class="pt-10">
         
              

            <header class="font-bold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <a href="/home">Dashboard</a> | <a href="/cars/create">Add New Car</a> | <a href="/cars">About US</a>
            </header>

          
      </div>

      @else
        <p class="py-12 italic">
            Please login to add a new car
        </p>
      @endif
      <div class="w-5/6 py-10">

         @foreach ($cars as $car)
              <div class="m-auto">
             @if (Auth::user())
                 <div class="float-right">
                      <a
                      class="border-b-2 pb-2 border-solid italic text-gray-600"
                      href="/cars/{{ $car->id }}/edit">
                          Edit &rarr;
                      </a>
                      <br>
                      <br>
                      <form action="/cars/{{ $car->id }}" method="POST">
                          @csrf
                           @method('delete')
                          <button
                              type="submit"
                              class="border-b-2 pb-2 border-solid italic text-red-600">
                              Delete &rarr;
                          </button>
                      </form>
                  </div> 
             @endif   
              <span class="uppercase text-black-500 font-bold text-4xl italic">
                  <a href="/cars/{{ $car->id }}">
                  {{ $car->name }}
                  </a>
              </span>
                  <br>
                  <br>
                  <h2 class="text-gray-700 text-xl">
                    {{ $car->founded }}
                  </h2>
                  <p class="text-lg text-gray-700 py-6">
                      {{ $car->description }}
                  </p>
                  <hr class="mt-4 mb-10">
              </div>
          @endforeach
      </div>
  </div>
@endsection

