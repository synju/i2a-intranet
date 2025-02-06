<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta Tags -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="title" content="In2Assets Intranet"/>
		<meta name="author" content="In2Assets"/>
		<meta name="description" content="In2Assets Intranet System."/>
		<meta name="keywords" content="in2assets, intranet, in2assets intranet"/>

		<!-- Title -->
		<title>In2Assets Intranet</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="{{ asset('css/font-faces.css') }}"/>

		<!-- OverlayScrollbars -->
		<link rel="stylesheet" href="{{ asset('css/overlayscrollbars.min.css') }}"/>

		<!-- Bootstrap Icons -->
		<link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}"/>

		<!-- AdminLTE -->
		<link rel="stylesheet" href="{{ asset('css/adminlte.css') }}"/>

		<!-- apexcharts -->
		<link rel="stylesheet" href="{{ asset('css/apexcharts.css') }}"/>

		<!-- jsvectormap -->
		<link rel="stylesheet" href="{{ asset('css/jsvectormap.min.css') }}"/>

		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">

		<!-- JQueryUI -->
		<link rel="stylesheet" href="{{ asset('js/jqueryui/jquery-ui.css') }}">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
	</head>

	<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
		<!-- App Mounting Point -->
		<div id="app"></div>

		<!-- App JS -->
		@vite('resources/js/app.js')

		<!-- Template JS -->

		<!-- OverlayScrollbars -->
		<script src="{{ asset('js/overlayscrollbars.browser.es6.min.js') }}"></script>

		<!-- Popperjs for Bootstrap 5 -->
		<script src="{{ asset('js/popper.min.js') }}"></script>

		<!-- Bootstrap 5 -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>

		<!-- AdminLTE -->
		<script src="{{ asset('js/adminlte.js') }}"></script>

		<!-- OverlayScrollbars -->
		<script>
			const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
			const Default = {
				scrollbarTheme: 'os-theme-light',
				scrollbarAutoHide: 'leave',
				scrollbarClickScroll: true,
			};
			document.addEventListener('DOMContentLoaded', function () {
				const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
				if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
					OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
						scrollbars: {
							theme: Default.scrollbarTheme,
							autoHide: Default.scrollbarAutoHide,
							clickScroll: Default.scrollbarClickScroll,
						},
					});
				}
			});
		</script>

		<!-- OPTIONAL SCRIPTS -->
		<!-- sortablejs -->
		<script src="{{ asset('js/Sortable.min.js') }}"></script>
		<script>
			const connectedSortables = document.querySelectorAll('.connectedSortable');
			connectedSortables.forEach((connectedSortable) => {
				let sortable = new Sortable(connectedSortable, {
					group: 'shared',
					handle: '.card-header',
				});
			});

			const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
			cardHeaders.forEach((cardHeader) => {
				cardHeader.style.cursor = 'move';
			});
		</script>

		<!-- apexcharts, ChartJS -->
		<script src="{{ asset('js/apexcharts.min.js') }}"></script>

		<!-- jsvectormap -->
		<script src="{{ asset('js/jsvectormap.min.js') }}"></script>
		<script src="{{ asset('js/world.js') }}"></script>

		<!-- JQuery & JQueryUI -->
		<script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
		<script src="{{ asset('js/jqueryui/jquery-ui.js') }}"></script>

		<!-- Custom JS -->
		<script src="{{ asset('js/custom.js') }}"></script>
	</body>
</html>
