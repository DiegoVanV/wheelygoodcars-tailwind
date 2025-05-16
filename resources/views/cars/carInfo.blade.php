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

        <a href="{{ route('cars.viewAllCars') }}" class="mt-4 block text-blue-500 hover:underline">Terug naar overzicht</a>
    </div>


    {{-- Advertentie --}}
    <div id="popup" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white shadow-lg relative">
            <button id="close-popup" class="block w-full h-full">
                <img id="popup-image" src="" alt="Advertentie" class="w-full h-full object-cover">
            </button>
        </div>
    </div>

    <script>
        let popupVisible = true;

        // Functie om een willekeurige afbeelding te selecteren
        function getRandomImage() {
            const randomNumber = Math.floor(Math.random() * 2) + 1;
            return `../../../ad${randomNumber}.jpg`; // Bouw de bestandsnaam op
        }

        // Functie om de pop-up te tonen/verbergen
        function togglePopup() {
            const popup = document.getElementById('popup');
            const popupImage = document.getElementById('popup-image');

            if (popupVisible) {
                // Stel een willekeurige afbeelding in
                popupImage.src = getRandomImage()
                popup.classList.remove('hidden');
            } else {
                popup.classList.add('hidden');
            }
        }

        // Sluitknop-logica
        document.getElementById('close-popup').addEventListener('click', () => {
            popupVisible = false;
            togglePopup();
            setTimeout(() => {
                popupVisible = true;
                togglePopup();
            }, 10000);
        });

        // Initialiseer de pop-up bij het laden van de pagina
        document.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            togglePopup();
        }, 10000);
        });
    </script>
</x-app-layout>
