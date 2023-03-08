<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-2 py-1 bg-orange-300 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 focus:bg-orange-700 active:bg-orange-300 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>


