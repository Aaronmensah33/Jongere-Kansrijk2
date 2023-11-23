<x-guest-layout>
    <x-slot name="header">


    </x-slot>

    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="p-6">
                    <form method="post" action="{{ route('instituten.edit', ['id' => $instituten->id]) }}">
                        @csrf
                        <!-- Add input fields for user information (e.g., name, email, password) -->
                        <center>
                            <h2 class="font-semibold text-xl  dark:text-gray-200 leading-tight ">
                                {{ __('Edit Activitein') }}
                            </h2>
                            <div class="mb-4">
                                <label for="naam" class="text-gray-400">Naam</label>
                                <input type="text" name="naam" id="naam"  class="block mt-1 w-full rounded-md">
                            </div>
                            <x-primary-button type="submit" class=" text-gray-400">Save</x-primary-button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>