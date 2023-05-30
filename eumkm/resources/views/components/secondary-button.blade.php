<button {{ $attributes->merge(['type' => 'button', 'class' => 'w-full inline-flex justify-center items-center space-x-2 rounded-md focus:outline-none px-3 py-2 border border-2 border-orange-500
    leading-6 focus:ring focus:ring-orange-500 focus:ring-opacity-50 active:bg-orange-500 active:border-orange-500']) }}>
    <p class="font-semibold text-orange-500">{{ $slot }}</p>
</button>