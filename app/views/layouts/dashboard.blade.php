{{-- UI configuration (nav, ribbon, etc.) --}}

{{-- include header --}}
@include('layouts.inc.header')

{{-- include nav --}}
@include('layouts.inc.nav')

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	{{-- include ribbon --}}
	@include('layouts.inc.ribbon')

	<!-- MAIN CONTENT -->
	<div id="content">
		
	</div>
	<!-- END MAIN CONTENT -->
		
</div>
<!-- END MAIN PANEL -->

<!-- FOOTER -->
{{-- include footer --}}
@include('layouts.inc.footer')
<!-- END FOOTER -->

{{-- include scripts --}}
@include('layouts.inc.scripts')

{{-- include google-analytics --}}
@include('layouts.inc.google-analytics')