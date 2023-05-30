<button type="button" {!! $attributes->merge(['class' => 'w-full inline-flex justify-center items-center space-x-2 rounded focus:outline-none px-3 py-2
    leading-6 bg-orange-500 hover:bg-orange-600 focus:ring focus:ring-orange-500 focus:ring-opacity-50 active:bg-orange-500 active:border-orange-500']) !!}>

    <p class="font-semibold text-white">{{ $slot }}</p>
</button>