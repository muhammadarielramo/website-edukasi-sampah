<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#2F7426] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#1a4316] focus:bg-[#1a4316] active:bg-[#1a4316] focus:outline-none focus:ring-2 focus:ring-[#2F7426] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
