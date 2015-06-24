<section>
	<label class="checkbox">
		{{ $control }}
		<i></i>
		{{ Form::label($name, $label, ['class' => 'label', 'for' => $name]) }}
	</label>
	@if ($error)
        <em for="{{ $name }}" class="invalid">{{ $error }}</em>
    @endif
</section>