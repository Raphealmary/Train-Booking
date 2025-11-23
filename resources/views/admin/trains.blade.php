<x-train-admin.layout>
    @slot("title")
    {{ "Dashboard | Admin" }}

    @endslot

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <x-train-admin.aside />



        <div class="flex flex-col flex-1 w-full">

            <x-train-admin.nav />

            @session("type")
            @slot("type")
            {{ session("type") }}

            @endslot

            @slot("msg")
            {{ session("msg") }}

            @endslot
            @endsession




            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Trains
                    </h2>

                    <form action="{{ route("admintrainStore") }}" method="post">
                        @csrf
                        <div>
                            <div
                                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div class="md:flex gap-4">
                                    <label class="block text-sm  mb-5 ">
                                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                                        <input name="name"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            placeholder="Armesterdam" />
                                    </label>
                                    <label class="block text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Number</span>
                                        <input
                                            name="number"
                                            @php
                                            $key="TR" ;
                                            $ra=rand(2212132,9888877778);
                                            @endphp
                                            readonly
                                            value="{{ $key.$ra}}"
                                            class="pointer-events-none block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            placeholder="" />
                                    </label>
                                </div>
                                <div class="mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                        Type
                                    </span>
                                    <div class="mt-2">
                                        <label
                                            class="inline-flex items-center text-gray-600 dark:text-gray-400">
                                            <input
                                                type="radio"
                                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                name="type"
                                                value="express"
                                                checked />
                                            <span class="ml-2">Express</span>
                                        </label>
                                        <label
                                            class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                                            <input
                                                type="radio"
                                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                                name="type"
                                                value="local" />
                                            <span class="ml-2">Local</span>
                                        </label>
                                    </div>
                                </div>


                                @if ($errors->any())

                                @foreach($errors->all() as $errors)
                                <p class="text-red-500">{{ $errors }}</p>
                                @endforeach
                                @endif




                                <div class="flex mt-6 text-sm">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Add Train
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b dark:border-gray-700  dark:text-white bg-purple-600">
                                        <th class="px-4 py-3">id</th>
                                        <th class="px-4 py-3">Train</th>
                                        <th class="px-4 py-3">Train ID</th>
                                        <th class="px-4 py-3">Type</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @php
                                    $p=1;
                                    @endphp
                                    @foreach ($showTrain as $showTrains)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            {{ $p++ }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ ucfirst($showTrains->name) }}
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            {{ $showTrains->number }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            {{ $showTrains->type }}
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>




</x-train-admin.layout>