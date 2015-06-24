<section>
    {{ Form::label($name, $label, ['class' => 'label', 'for' => $name]) }}
	<label class="input <?php echo empty($error) ? '' : 'state-error'; ?>">
		{{ $control }}
		<b class="tooltip tooltip-top-right">
			<i class="fa fa-user txt-color-teal"></i> 
			{{ Lang::get('validation.message_enter', ['attribute' => $label]) }}
		</b>
	</label>
    @if ($error)
        <em for="{{ $name }}" class="invalid">{{ $error }}</em>
    @endif
</section>