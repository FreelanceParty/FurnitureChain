<button id="{{ $id }}"
		type="submit"
		class="disabled:bg-gray-300 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 {{ $class ?? '' }}"
		@if( $isDisabled ?? FALSE )
			disabled
		@endif
		@if( ! empty($routeName) )
			data-route="{{ $routeName }}"
		@endif
>
	{{ $text }}
</button>