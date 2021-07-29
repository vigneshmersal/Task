<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

		<link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />

		<!-- Styles -->
		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

		@livewireStyles

		<style>
			.required:after { content:" *"; color: red; }
		</style>

		<!-- Scripts -->
		<script src="{{ mix('js/app.js') }}" defer></script>
	</head>
	<body class="font-sans antialiased">
		<x-jet-banner />

		<div class="min-h-screen bg-gray-100">
			@livewire('navigation-menu')

			<!-- Page Heading -->
			@if (isset($header))
				<header class="bg-white shadow">
					<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
						{{ $header }}
					</div>
				</header>
			@endif

			<!-- Page Content -->
			<main>
				<x-alert />
				{{ $slot }}
			</main>
		</div>

		@stack('modals')

		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/moment.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>

		<script>
			$(document).ready(function() {
				moment.updateLocale('en', {
					week: {dow: 1} // Monday is the first day of the week
  				});

				$('.date').datetimepicker({
					format: 'YYYY-MM-DD',
					locale: 'en',
					icons: {
						up: 'fas fa-chevron-up',
						down: 'fas fa-chevron-down',
						previous: 'fas fa-chevron-left',
						next: 'fas fa-chevron-right'
					}
				});
			});
		</script>
		@livewireScripts
	</body>
</html>
