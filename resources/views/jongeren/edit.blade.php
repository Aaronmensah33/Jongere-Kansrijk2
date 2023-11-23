<x-guest-layout>
    <x-slot name="header">


    </x-slot>

    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="p-6">
                    <form method="post" action="{{ route('jongere.edit', ['id' => $jongere->id]) }}">
                        @csrf
                        <!-- Add input fields for user information (e.g., name, email, password) -->
                        <center>
                            <h2 class="font-semibold text-xl  dark:text-gray-200 leading-tight ">
                                {{ __('Edit Jongere') }}
                            </h2>
                            <div class="mb-4">
                                <label for="voornaam" class="text-gray-400">Voornaam</label>
                                <input type="text" name="voornaam" id="voornaam" value="{{$jongere->voornaam}}" class="block mt-1 w-full rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="achternaam" class="text-gray-400">Achternaam</label>
                                <input type="text" name="achternaam" id="achternaam" value="{{$jongere->achternaam}}" class="block mt-1 w-full rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="geboortejaar" class="text-gray-400">Geboortejaar</label>
                                <input type="number" min="1900" max="2099" name="geboortejaar" id="geboortejaar" value="{{$jongere->geboortejaar}}" class="block mt-1 w-full rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="activiteit_id" class="text-gray-400 ">Activiteit</label><br>
                                <x-input-select :activiteiten="$activiteiten" />
                            </div>

                            <div class="mb-4">
                                <label for="instituut_id" class="text-gray-400 block mt-1">Instituut</label>
                                <x-input-select-i :instituten="$instituten" />
                            </div>
                            <x-primary-button type="submit" class=" text-gray-400">Save</x-primary-button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>