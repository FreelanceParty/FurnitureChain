<label class="flex h-[34px] gap-1 w-fit cursor-pointer items-center">
	<input
			@if( ! empty( $id) )
				id="{{ $id }}"
			@endif
			type="checkbox"
			@if( ! empty($name) )
				name="{{ $name }}"
			@endif
			class="border block p-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm {{ $class ?? '' }}"
			@if( $isRequired ?? FALSE )
				required
			@endif
			@if( $isDisabled ?? FALSE )
				disabled
			@endif
			@if( $isAutofocus ?? FALSE )
				autofocus
			@endif
			@if( $isChecked ?? FALSE )
				checked
			@endif
			@if( ! empty($value) )
				value="{{ $value }}"
			@endif
	>
	{{ $text }}
</label>