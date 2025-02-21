<x-app-layout>
    <div class="flex justify-center items-center h-[600px]">
        <form action="{{ route('cars.store') }}" method="POST" class="w-[600px] ">
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
</x-app-layout>
