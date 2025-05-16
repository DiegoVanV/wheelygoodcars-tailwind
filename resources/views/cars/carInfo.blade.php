<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800">{{ $car->brand }} {{ $car->model }}</h2>
        <p class="text-gray-600">Kenteken: <span class="font-bold">{{ $car->license_plate }}</span></p>
        <p>Prijs: €{{ number_format($car->price, 2, ',', '.') }}</p>
        <p>Kilometerstand: {{ $car->mileage }} km</p>
        <p>Bouwjaar: {{ $car->production_year }}</p>
        <p>Kleur: {{ $car->color }}</p>
        <p>Aantal deuren: {{ $car->doors }}</p>
        <p>Aantal zitplaatsen: {{ $car->seats }}</p>
        <p>Gewicht: {{ $car->weight }} kg</p>
        <p>Weergaven: {{ $car->views }}</p>

        @if($car->image)
                        <img src="{{ $car->image_url }}"
                        alt="{{ $car->brand }} {{ $car->model }}"
                        class=" h-48 w-48 object-contain"
                        >
        @endif

        <a href="{{ route('cars.viewMyCars') }}" class="mt-4 block text-blue-500 hover:underline">Terug naar overzicht</a>
    </div>
</x-app-layout>
