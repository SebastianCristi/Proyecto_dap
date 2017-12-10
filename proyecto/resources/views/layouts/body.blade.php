

<body>
	<div class="wrapper">

		@include('layouts.elementos.menuLateral')
		<div class="main-panel">
			@include('layouts.elementos.barraSuperior')

			@yield("contenido")

		</div>
	</div>
</body>