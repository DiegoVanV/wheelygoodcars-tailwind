<x-app-layout>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-2xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6">Nieuw aanbod</h1>
        <form action="{{ route('cars.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="flex border border-black rounded-md overflow-hidden">
                <label for="license_plate" class="bg-blue-600 text-white px-4 py-4 flex items-center">NL</label>
                <input type="text" name="license_plate" id="license_plate"
                       class="flex-1 px-4 py-4 bg-yellow-400 text-black text-lg focus:outline-none text-center font-bold"
                       placeholder="Voer kenteken in" value="{{ session('form.license_plate') }}" required>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3">
                    <label for="brand" class="font-semibold">Merk</label>
                    <input type="text" name="brand" value="{{ old('brand') }}" required class="w-full px-4 py-3 border rounded-md bg-gray-100"/>
                </div>

                <div class="col-span-3">
                    <label for="model" class="font-semibold">Model</label>
                    <input type="text" name="model" value="{{ old('model') }}" required class="w-full px-4 py-3 border rounded-md bg-gray-100"/>
                </div>

                <div>
                    <label for="seats" class="font-semibold">Zitplaatsen</label>
                    <input type="number" name="seats" value="{{ old('seats') }}" min="1" required class="w-full px-4 py-3 border rounded-md bg-gray-100 text-start"/>
                </div>

                <div>
                    <label for="doors" class="font-semibold">Aantal deuren</label>
                    <input type="number" name="doors" value="{{ old('doors') }}" min="1" required class="w-full px-4 py-3 border rounded-md bg-gray-100 text-start"/>
                </div>

                <div>
                    <label for="weight" class="font-semibold">Massa rijklaar</label>
                    <input type="number" name="weight" value="{{ old('weight') }}" required class="w-full px-4 py-3 border rounded-md bg-gray-100 text-start"/>
                </div>

                <div class="col-span-1">
                    <label for="production_year" class="font-semibold">Jaar van productie</label>
                    <input type="number" name="production_year" value="{{ old('production_year') }}" min="1900" max="{{ date('Y') }}" required class="w-full px-4 py-3 border rounded-md bg-gray-100 text-start"/>
                </div>

                <div class="col-span-1">
                    <label for="color" class="font-semibold">Kleur</label>
                    <input type="text" name="color" value="{{ old('color') }}" required class="w-full px-4 py-3 border rounded-md bg-gray-100 text-start"/>
                </div>

                <div class="col-span-3">
                    <label for="mileage" class="font-semibold">Kilometerstand</label>
                    <div class="flex items-center">
                        <input type="number" name="mileage" value="{{ old('mileage') }}" min="0" required class="w-full px-4 py-3 border rounded-l-md bg-gray-100 text-start"/>
                        <span class="px-4 py-3 border-t border-b border-r rounded-r-md bg-gray-200">km</span>
                    </div>
                </div>

                <div class="col-span-3">
                    <label for="price" class="font-semibold">Vraagprijs</label>
                    <div class="flex items-center">
                        <span class="px-4 py-3 bg-gray-200 border border-r-0 rounded-l-md">€</span>
                        <input type="number" name="price" value="{{ old('price') }}" min="0" step="0.01" required class="w-full px-4 py-3 border rounded-r-md bg-gray-100 text-center"/>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full py-4 bg-orange-600 text-white font-semibold rounded-md text-lg hover:bg-orange-700 transition">Aanbod afronden</button>
        </form>
    </div>
</x-app-layout>
