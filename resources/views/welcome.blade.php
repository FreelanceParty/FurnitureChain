<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
	<title>Furniture chain</title>
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
	<div id="console" class="flex h-screen w-full">
		@include('side_menu')
		<div class="flex flex-col w-full">
			@include('header')
			<div id="content" class="w-full h-full bg-gray-100 overflow-y-auto flex flex-col gap-6 p-4">
				@include('content.categories')
			</div>
		</div>
	</div>
</body>
</html>
@include('_scripts.main')
