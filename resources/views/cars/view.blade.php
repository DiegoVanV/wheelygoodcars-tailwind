<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Mijn Auto's</h2>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">User ID</th>
                        <th class="border border-gray-300 px-4 py-2">License Plate</th>
                        <th class="border border-gray-300 px-4 py-2">Brand</th>
                        <th class="border border-gray-300 px-4 py-2">Model</th>
                        <th class="border border-gray-300 px-4 py-2">Price (€)</th>
                        <th class="border border-gray-300 px-4 py-2">Mileage (km)</th>
                        <th class="border border-gray-300 px-4 py-2">Seats</th>
                        <th class="border border-gray-300 px-4 py-2">Doors</th>
                        <th class="border border-gray-300 px-4 py-2">Year</th>
                        <th class="border border-gray-300 px-4 py-2">Weight (kg)</th>
                        <th class="border border-gray-300 px-4 py-2">Color</th>
                        <th class="border border-gray-300 px-4 py-2">Image</th>
                        <th class="border border-gray-300 px-4 py-2">Sold At</th>
                        <th class="border border-gray-300 px-4 py-2">Views</th>
                        <th class="border border-gray-300 px-4 py-2">Created At</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $car->user_id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $car->license_plate }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $car->brand }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $car->model }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-right">€ {{ number_format($car->price, 2) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($car->mileage) }} km</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $car->seats }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $car->doors }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $car->production_year }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($car->weight) }} kg</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ ucfirst($car->color) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="h-16 w-auto mx-auto rounded">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                {{ $car->sold_at ? $car->sold_at->format('d-m-Y') : 'Not Sold' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $car->views }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $car->created_at }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('cars.delete', $car->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-700">
                                        Verwijderen
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
