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
        return view('cars.form-step1');
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

    // View my cars
    public function viewMyCars()
    {
        $user = auth()->user();

        $mycars = Car::where('user_id', $user->id)->get();

        return view('cars.view')->with(['cars' => $mycars]);
    }


    // view all cars
    public function viewAllCars(){
        $cars = Car::all();

        return view('cars.viewAll')->with(['cars' => $cars,]);
    }



    public function deleteCar(Car $car){
        $car->delete();

        return redirect()->route('cars.viewMyCars')->with('success', 'Car succesvol verwijderd!');
    }

    public function searchCar(Request $request) {
        $licensePlate = $request->input('license_plate'); // Haalt ingevoerde kenteken op

        $car = Car::where('license_plate', $licensePlate)->first(); // Zoek auto op kenteken

        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Auto niet gevonden!');
        }

        return redirect()->route('cars.show', ['car' => $car->id]); // Stuur door naar carInfo
    }

    public function show(Car $car) {
        return view('cars.carInfo', ['car' => $car]);
    }

    public function showDetailPage($id)
    {
        $car = Car::findOrFail($id); // Haalt de auto op of geeft een 404-fout
        return view('cars.show', ['car' => $car]);
    }

    public function goToForm(){
        return view('cars.stepone');
    }

    public function postStep1(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'license_plate' => 'required|string|max:10',
        ]);

        // Store the license plate in the session
        session(['form.license_plate' => $validated['license_plate']]);

        // Redirect to step 2
        return redirect()->route('form.step2');
    }

    // Step 2 - Show the information from session
    public function step2()
    {
        // Check if the license plate is in the session
        if (!session()->has('form.license_plate')) {
            return redirect()->route('form.step1')->with('error', 'Please enter a license plate first.');
        }

        return view('cars.steptwo'); // Updated to cars.steptwo
    }



}
