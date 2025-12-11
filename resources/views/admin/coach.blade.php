<x-train-admin.layout>
    @slot("title")
    {{ "Coach | Admin" }}

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
                        Coaches
                    </h2>

                    <form action="{{ route("admincoachStore") }}" method="post">
                        @csrf
                        <div>
                            <div
                                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div class="md:flex gap-4">

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Coach Type
                                        </span>
                                        <select
                                            name="coach_type"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option value="standard">Standard</option>
                                            <option value="economy">Economy</option>
                                            <option value="first_class">First Class</option>

                                        </select>
                                    </label>

                                </div>

                                @if ($errors->any())

                                @foreach($errors->all() as $errors)
                                <p class="text-red-500">{{ $errors }}</p>
                                @endforeach
                                @endif

                                <div class="flex mt-6 text-sm">
                                    <button type="submit"
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Add Train Coach
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

                                        <th class="px-4 py-3">Coach Type</th>
                                        <th class="px-4 py-3">Date Created</th>


                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @php
                                    $p=1;
                                    @endphp
                                    @foreach ($showCoach as $showCoachs)


                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            {{ $p++ }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ ucfirst($showCoachs->coach_type) }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ $showCoachs->created_at->format("F d, Y, H:i A") }}
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