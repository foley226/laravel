<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Headquarter;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

         //   $cars = Car::all()->toArray();

            $cars = Car::all()->toJson();
            $cars = json_decode($cars);

            // var_dump($cars);
            return view('cars.index', [
                'cars' => $cars
            ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    /*    $car = new Car;
        $car->name = $request->input('name');
        $car->founded = $request->input('founded');
        $car->description = $request->input('description');
        $car->save(); */

        // this code below will not work unless you mass assign: name, founded and description
        // you can mass assign by going to your model, as doing the following...
        // $protected $fillable = ['name, 'founded', 'description'];

        $request->validate([
           'name' => 'required|unique:cars',
           'founded'=> 'required|integer|min:0|max:2021',
            'description' => 'required'
        ]);


        $car = Car::create([
        'name' => $request->input('name'),
        'founded' => $request->input('founded'),
        'description' => $request->input('description'),
        'user_id' => auth()->user()->id
      ]);

        return redirect('/cars');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $car = Car::find($id);

        // $car = Car::find($id)->first(); this if you are specifically targeting the first id



        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::where('id', $id)
        ->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Car $car)
    {

        $car->delete();

        return redirect('/cars');
    }
}
