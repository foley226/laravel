    @extends('layouts.app')


    @section('content')


        <header class="font-bold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <a href="/home">Dashboard</a> | <a href="/cars/create">Add New Car</a> | <a href="/cars">Cars List</a>
            </header>
    
            <div class="text-center">
                <h1 class="text-5xl uppercase bold">
                    {{ $car->name }}
                </h1>
                
                <p class="text-lg text-gray-700 py-6">
                    No headquarters for this item
                </p>
            </div>
            <div class="py-10 text-center">
                <div class="m-auto">
                    <span class="uppercase text-black-500 font-bold text-4xl italic">
                        Founded: {{ $car->founded }}
                    </span>
                        <br>
                        <br>
                        <p class="text-lg text-gray-700 py-6">
                            Description:{{ $car->description }}
                        </p>
                        <ul>
                            <p class="text-lg text-gray-700 py-6">
                                Models:
                            </p>

                            @forelse($car->carModels as $model)
                                <li class="inline italic text-gray-600 px-1 py-6">
                                    {{ $model['model_name'] }}
                                </li>
                            @empty
                                <h2>No models of this item</h2>
                            @endforelse
                        </ul>
                        <hr class="mt-4 mb-10">
                    </div>
            </div>
        </div>



        @endsection
