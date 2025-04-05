<input
		@if( ! empty( $id) )
			id="{{ $id }}"
		@endif
		type="{{ $type ?? 'text' }}"
		@if( ! empty($name) )
			name="{{ $name }}"
		@endif
		class="border block p-1 mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm {{ $class ?? '' }}"
		@if( $isRequired ?? FALSE )
			required
		@endif
		@if( $isDisabled ?? FALSE )
			disabled
		@endif
		@if( $isAutofocus ?? FALSE )
			autofocus
		@endif
		@if( ! empty($placeholder) )
			placeholder="{{ $placeholder }}"
		@endif
		value="{{ $value ?? '' }}"
>