<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        return view('cars.index');
    }

    public function store(Request $request)
{
    $newCar = new Car();
    $newCar->user_id = auth()->id();
    $newCar->license_plate = $request->license_plate;
    $newCar->brand = $request->brand;
    $newCar->model = $request->model;
    $newCar->price = $request->price;
    $newCar->mileage = $request->mileage;
    $newCar->seats = $request->seats;
    $newCar->doors = $request->doors;
    $newCar->production_year = $request->production_year;
    $newCar->weight = $request->weight;
    $newCar->color = $request->color;
    $newCar->sold_at = $request->sold_at;
    $newCar->views = 0;
    $newCar->save();

    return redirect()->route('cars.index')->with('success', 'Auto succesvol toegevoegd!');
}

}
