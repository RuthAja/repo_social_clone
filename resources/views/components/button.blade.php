<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-500 border
    border-transparent rounded-xl text-sm text-white capitalise tracking-widest hover:bg-blue-600
    active:bg-blue-600 focus:outline-none focus:border-blue-600 focus:ring ring-blue-300 disabled:opacity-25 transition
    ease-in-out duration-150']) }}>
    {{ $slot }}
</button>