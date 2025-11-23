<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors']) }}>
    {{ $slot }}
</button>
