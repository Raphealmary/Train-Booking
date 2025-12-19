<x-train-admin.layout>
    @slot("title")
    {{ "Payment | Admin" }}

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
                        Payment Manager
                    </h2>

                    <form action="{{ route("adminpayStore") }}" method="post">
                        @csrf
                        <div>
                            <div
                                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div class="md:flex gap-4">

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">
                                            Payment Type
                                        </span>
                                        <select
                                            name="Payment_Type"
                                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            <option value="paystack">Paystack</option>
                                            <option value="flutterwave">Flutterwave</option>
                                        </select>
                                    </label>

                                    <label class="block mt-4 text-sm">
                                        <span class="text-gray-700 dark:text-gray-400">Secret Key</span>
                                        <input name="secret_key"
                                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                            placeholder="Secret Key" />
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
                                        Add Payment Method
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

                                        <th class="px-4 py-3">Payment Type</th>
                                        <th class="px-4 py-3">Secret Key</th>
                                        <th class="px-4 py-3">Date Created</th>


                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @php
                                    $p=1;
                                    @endphp
                                    @foreach ($showPay as $showPays)


                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            {{ $p++ }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ Str::ucfirst($showPays->Payment_Type) }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ Str::substrReplace(Crypt::decryptString($showPays->secret_key), "******",2,3) }}
                                        </td>
                                        <td class="px-4 py-3">
                                            {{ $showPays->created_at->format("F d, Y, H:i A") }}
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