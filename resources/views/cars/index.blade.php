<x-app-layout>
    <div class="flex justify-center items-center h-[200px]">
        <form action="{{ route('cars.search') }}" method="POST" class="w-[600px]">
            @csrf
            <div class="flex border border-black rounded-md overflow-hidden">
                <label for="license_plate" class="bg-blue-600 text-white px-4 py-4 flex items-center">NL</label>
                <input type="text" name="license_plate" id="license_plate"
                       class="flex-1 px-4 py-4 bg-yellow-400 text-black text-lg focus:outline-none text-center font-bold"
                       placeholder="Voer kenteken in" required>
                <button type="submit" class="bg-orange-500 text-white px-6 py-4 text-lg">Go!</button>
            </div>
        </form>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-8">
        <div class="flex justify-center items-center h-[200px]">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Alle Auto's</h1>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($cars as $car)
                <div class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg transition-shadow">
                    @if($car->image)
                        <img src="{{ asset('img' . $car->image) }}" alt="Afbeelding van {{ $car->brand }} {{ $car->model }}" class="w-full h-48 object-cover rounded">
                    @endif

                    <h2 class="text-xl font-semibold text-gray-800 mt-4">{{ $car->brand }} {{ $car->model }}</h2>
                    <p class="text-gray-600">€{{ number_format($car->price, 2, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">Bouwjaar: {{ $car->production_year }}</p>
                    <p class="text-sm text-gray-500">KM-stand: {{ $car->mileage }} km</p>

                    <a href="{{ route('cars.show', $car) }}" class="mt-3 inline-block text-blue-500 hover:underline text-sm">Bekijk details</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
