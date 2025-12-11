<x-train-admin.layout>
    @slot("title")
    {{ "users | Admin" }}

    @endslot

    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <x-train-admin.aside />

        <div class="flex flex-col flex-1 w-full">

            <x-train-admin.nav />

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">


                    <div class="relative mt-3 overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base  bg-white text-gray-700 dark:text-gray-200 divide-y dark:divide-gray-700 dark:bg-gray-800 rounded-2xl">
                        <table class="w-full text-sm text-left rtl:text-right text-body">
                            <caption class="p-5 text-4xl font-bold text-left rtl:text-right text-heading">
                                RailExpress Users
                                <p class="mt-1.5 text-lg font-normal text-body">{{ "management System" }}</p>
                            </caption>
                            <thead class="text-sm text-body bg-neutral-secondary-medium ">
                                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase  dark:border-gray-700  dark:text-white bg-purple-600">
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        id
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-medium">
                                        Created At
                                    </th>


                                </tr>
                            </thead>
                            <tbody class="bg-white text-gray-700 dark:text-gray-200 divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @php
                                $s=1
                                @endphp
                                @if ($showUsers->count() > 0)
                                @foreach ($showUsers as $showUser)


                                <tr class="bg-neutral-primary-soft ">
                                    <td class="px-6 py-4">
                                        {{ $s++}}
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">

                                        {{ $showUser->name }}
                                    </th>

                                    <td class="px-6 py-4">
                                        {{ $showUser->email }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $showUser->created_at->format("F,d Y H:i:s A") }}
                                    </td>


                                </tr>


                                @endforeach
                                @else

                                <tr>
                                    <!-- //endhere -->
                                    <div class="bg-white dark:bg-red-500 overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 text-gray-900 dark:text-gray-100">
                                            {{ __("No User Found!") }}
                                        </div>
                                    </div>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>



                </div>
            </main>
        </div>
    </div>




</x-train-admin.layout>