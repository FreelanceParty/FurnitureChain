@php
	use App\Models\FurnitureCategory;
	/** @var FurnitureCategory $category */
@endphp

<div class="js-edit-content flex flex-col gap-3 max-w-[500px]">
	<div class="font-semibold text-2xl">{{ $category === NULL ? trans('general.add') : trans('general.editing') }}</div>
	<div class="grid grid-cols-1 gap-2">
		<label>
			{{ trans('general.title') }}
			@include('_elements.input_text', [
				'id'          => 'title',
				'name'        => 'title',
				'isRequired'  => TRUE,
				'isAutofocus' => TRUE,
				'value'       => $category?->getTitle(),
			])
		</label>
		<label class="flex flex-col">
			{{ trans('general.image') }}
			<div class="m-auto w-40 h-40">
				<img class="js-image-preview rounded-xl" src="{{ $category?->getImage() ?? asset('images/tmp_logo.png') }}" alt="">
			</div>
			<div class=" flex flex-col gap-2">
				<input type="file" class="js-image-selector">
				<button class="js-delete-photo bg-blue-700 text-white px-3 py-1 rounded-md">{{ trans('general.delete_image') }}</button>
			</div>
		</label>
	</div>
	@include('_elements.button', [
		'id'    => 'submit',
		'text'  => trans('general.save'),
		'route' => route('action.update-category-data'),
		'class' => 'w-fit ml-auto min-w-32',
	])
	@include('_elements.button', [
		'id'    => 'cancel',
		'text'  => trans('general.cancel'),
		'route' => route('content.edit-category'),
		'class' => 'w-fit ml-auto min-w-32',
	])
</div>
<script>
	$(document).ready(function () {
		'use strict';

		const $console       = $('#console'),
		      $content       = $console.find('#content'),
		      $editContent   = $content.find('.js-edit-content'),
		      $submit        = $editContent.find('#submit'),
		      $title         = $editContent.find('#title'),
		      $imageSelector = $editContent.find(".js-image-selector"),
		      $imagePreview  = $editContent.find(".js-image-preview"),
		      $deleteButton  = $editContent.find(".js-delete-photo"),
		      $cancel        = $editContent.find('#cancel');

		$submit.on("click", function () {
			const formData = new FormData();
			formData.append("_token", '{{ csrf_token() }}');
			formData.append("id", '{{ $category?->getId() ?? -1 }}');
			formData.append("title", $title.val());
			if ($imageSelector[0].files[0] !== undefined) {
				formData.append("image", $imageSelector[0].files[0]);
			}

			$.ajax({
				type:        "POST",
				url:         '{{ route('action.update-category-data') }}',
				data:        formData,
				processData: false,
				contentType: false,
				success:     (response) => {
					if (response.ack === 'success') {
						changeContent('{{ route('content.categories') }}');
					}
					alert(response.message);
				}
			});
		});

		$deleteButton.on("click", function () {
			$imageSelector.val(null);
			$imagePreview.attr("src", "{{ asset('images/tmp_logo.png') }}");
		});

		$imageSelector.on("change", function () {
			if ($(this)[0].files[0]) {
				let reader = new FileReader();
				reader.onload = function (e) {
					$imagePreview.attr("src", e.target.result);
				};

				reader.readAsDataURL($(this)[0].files[0]);
			}
		});

		$cancel.on('click', function () {
			changeContent($(this).data('route'), {id: '{{ $category?->getId() }}'});
		});
	});
</script>