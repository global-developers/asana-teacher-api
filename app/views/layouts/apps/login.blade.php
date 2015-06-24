@section('app')
	{{-- MESSAGE --}}
	@if (Session::has('message'))
		<div class="alert alert-<?php echo Session::get('message') == 'login-error' ? 'danger': 'info' ; ?> fade in">
			<button class="close" data-dismiss="alert">
				×
			</button>
			<i class="fa-fw fa fa-<?php echo Session::get('message') == 'login-error' ? 'times': 'check' ; ?>"></i>
			{{ \Lang::get('utils.message.' . Session::get('message')) }}
		</div>
	@endif
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
			<h1 class="txt-color-red login-header-big">{{ Lang::get('app.name') }}</h1>
			<div class="hero">

				<div class="pull-left login-desc-box-l">
				<h4 class="paragraph-header">It's Okay to be Smart. Experience the simplicity of {{ Lang::get('app.name') }}, everywhere you go!</h4>
				<div class="login-app-icons">
				<a href="javascript:void(0);" class="btn btn-danger btn-sm">Frontend Template</a>
				<a href="javascript:void(0);" class="btn btn-danger btn-sm">Find out more</a>
				</div>
				</div>

				<img src="img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h5 class="about-heading">About {{ Lang::get('app.name') }} - Are you up to date?</h5>
					<p>
					Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
					</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h5 class="about-heading">Not just your average template!</h5>
					<p>
						Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
					</p>
				</div>
			</div>

		</div>
		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
			<div class="well no-padding">
				{{ Form::open(['class' => 'smart-form client-form', 'id' => 'login-form', 'method' => 'POST', 'route' => 'sign-in']) }}
					<header>Inicio</header>

					<fieldset>
						{{-- EMAIL --}}
						{{ Field::email('email', ['id' => 'email', 'required'], NULL) }}
						{{-- PASSWORD --}}
						{{ Field::password('password', ['id' => 'password', 'required'], 'password') }}
						{{-- REMEMBER --}}
						{{ Field::checkbox('remember', NULL, ['id' => 'remember'], NULL, 'checkbox') }}
					</fieldset>

					<footer>
						<button type="submit" class="btn btn-primary">
							Sign in
						</button>
					</footer>

				{{ Form::close() }}
			</div>

			<h5 class="text-center"> - Or sign in using -</h5>

			<ul class="list-inline text-center">
				<li>
					<a href="javascript:void(0);" class="btn btn-primary btn-circle">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn btn-info btn-circle">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="btn btn-warning btn-circle">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
			</ul>
		</div>
	</div>
@endsection

@section('script')
	@parent	
	<!-- JQUERY VALIDATE -->
	<script src="{{ asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

	<script type="text/javascript">
			
		runAllForms();

		$(function() {
			// Validation
			$("#login-form").validate({
				// Rules for form validation
				rules : {
					email : {
						required : true,
						email : true
					},
					password : {
						required : true,
						minlength : 3,
						maxlength : 20
					}
				},

				// Messages for form validation
				messages : {
					email : {
						required : '{{ Lang::get('validation.message_required', array('attribute' => Lang::get('validation.attributes.email'))) }}',
						email : '{{ Lang::get('validation.message_valid', array('attribute' => Lang::get('validation.attributes.email'))) }}'
					},
					password : {
						required : '{{ Lang::get('validation.message_required', array('attribute' => Lang::get('validation.attributes.password'))) }}'
					}
				},

				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
		});
	</script>
@endsection