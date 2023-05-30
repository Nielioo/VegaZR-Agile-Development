<button {{ $attributes->merge(['type' => 'button', 'class' => 'w-full inline-flex justify-center items-center space-x-2 rounded-md focus:outline-none px-3 py-2 border border-2 border-red-500
    leading-6 focus:ring focus:ring-red-500 focus:ring-opacity-50 active:bg-red-500 active:border-red-500']) }}>
    <p class="font-semibold text-red-500">{{ $slot }}</p>
</button>