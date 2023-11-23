<x-guest-layout>
    <x-slot name="header">


    </x-slot>

    <div class="py-11">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="p-6">
                    <form method="post" action="{{ route('medewerker.store') }}">
                        @csrf
                        <!-- Add input fields for user information (e.g., name, email, password) -->
                        <center>
                            <h2 class="font-semibold text-xl  dark:text-gray-200 leading-tight ">
                                {{ __('Create Medewerker') }}
                            </h2>
                            <div class="mb-4">
                                <label for="name" class="text-gray-400">Name</label>
                                <input type="text" name="name" id="name" class="block mt-1 w-full rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="text-gray-400">Email</label>
                                <input type="email" name="email" id="email" class="block mt-1 w-full rounded-md">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="text-gray-400">Password</label>
                                <input type="password" name="password" id="password" class="block mt-1 w-full rounded-md">
                            </div>
                            <x-primary-button type="submit" class=" text-gray-400">Save</x-primary-button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>