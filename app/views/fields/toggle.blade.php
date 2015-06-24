<section class="col col-xs-4 col-sm-3 col-md-5">
	<label class="toggle">
		{{ $control }}
		<i data-swchon-text="ON" data-swchoff-text="OFF"></i>
		{{ $label }}
	</label>
	@if ($error)
        <em for="{{ $name }}" class="invalid">{{ $error }}</em>
    @endif
</section>