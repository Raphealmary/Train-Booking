<x-train-admin.layout>

    @slot("title")
    {{ "Login | Admin" }}

    @endslot


    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div
            class="flex-1 h-full max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex  overflow-y-auto">

                <div class="flex w-full items-center justify-center p-6 sm:p-12">


                    <div class="w-full">
                        <form action="{{ Route("postlogin") }}" method="post">
                            @csrf
                            <h1
                                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Login
                            </h1>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <input
                                required
                                    name="email"
                                    type="email"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="Admin Jane" />
                            </label>
                            @session("status")

                            <span class="block text-red-600">{{ session("status") }}</span>
                            
                            @endsession
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input
                                required
                                    name="password"
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    placeholder="***************"
                                    type="password" />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                Log in
                            </button>

                            <hr class="my-8" />

                            <p class="mt-4">
                                <a
                                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="./forgot-password.html">
                                    Forgot your password?
                                </a>
                            </p>
                            <p class="mt-1">
                                <a
                                    class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                    href="./create-account.html">
                                    Create account
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-train-admin.layout>