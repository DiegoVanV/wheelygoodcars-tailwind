<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    public function index(){
        return view('cars.index');
    }

    public function main(){
        return view('cars.main');
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

    public function viewMyCars(){
        $user = auth()->user();
        $cars = Car::all();

        return view('cars.view')->with(['cars' => $cars,]);
    }

    public function deleteCar(Car $car){
        $car->delete();

        return redirect()->route('cars.viewMyCars')->with('success', 'Car succesvol verwijderd!');
    }
}
