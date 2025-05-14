<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Mijn Auto's</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-4">
            @foreach ($cars as $car)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    <!-- Afbeelding -->
                    <div class="h-40 bg-gray-200 flex items-center justify-center">
                        <img src="{{ asset('image.jpg') }}" alt="Car Image" class="object-cover h-full w-full">
                    </div>

                    <!-- Inhoud -->
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <!-- Kenteken gestyled -->
                        <div class="flex items-center justify-center mb-3 border border-black rounded-md overflow-hidden w-full max-w-[200px] mx-auto">
                            <span class="bg-blue-600 text-white px-3 py-1">NL</span>
                            <span class="flex-1 text-center bg-yellow-400 text-black font-bold py-1">{{ $car->license_plate }}</span>
                        </div>

                        <!-- Auto-info -->
                        <div class="space-y-1 text-sm text-gray-700 text-center">
                            <p><span class="font-semibold">Merk:</span> {{ $car->brand }}</p>
                            <p><span class="font-semibold">Prijs:</span> €{{ number_format($car->price, 0, ',', '.') }}</p>
                            <p><span class="font-semibold">Kilometers:</span> {{ number_format($car->mileage, 0, ',', '.') }} km</p>
                            <p><span class="font-semibold">Weergave:</span> {{ number_format($car->views, 0, ',', '.') }}</p>

                        </div>

                        <!-- Knoppen -->
                        <div class="mt-4 space-y-2">
                            <a href="{{ route('cars.show', $car->id) }}"
                               class="block text-center bg-orange-500 hover:bg-orange-600 text-white font-medium py-2 px-4 rounded transition">
                                Bekijk details
                            </a>

                            <form action="{{ route('cars.delete', $car->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded transition">
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


                            {{-- <tr class="hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2">{{ $car->license_plate }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $car->brand }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">€ {{ number_format($car->price, 2) }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($car->mileage) }} km</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <form action="{{ route('cars.delete', $car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-700">
                                Verwijderen
                            </button>
                        </form>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-primary">Bekijk details</a>
                    </td>
                </tr> --}}
    </div>
</x-app-layout>
