<div class="custom-scroll table-responsive">
	<table class="table table-striped table-hover table-condensed" id="table-device-linfo">
		<thead>
			<tr>
				<th>{{ Lang::get('linfo.type') }}</th>
				<th>{{ Lang::get('linfo.vendor') }}</th>
				<th>{{ Lang::get('linfo.device') }}</th>
			</tr>
		</thead>
		<tbody></tbody>
	</table>
</div>

<script type="text/javascript">

	(function($){
			
		var defaults = {
			"data": undefined
		};

		$.fn.tableDevice = function(options)
		{
			if (this.length==0) {alert("Error in Table Device!");return this;};

			// Referencia al objeto contenedor.
			var el = this;

			// Canfiguraciones del usuario.
			var settings = undefined;

			/**
			 * Añade 1 o mas filas a la tabla.
			 */
			var addRow = function(key, value){
				
				var tr = '';

				if (value.type==undefined || value.type==''){value.type='Unknown';}
				tr += '<td>'+value.type+'</td>';
				if (value.vendor==undefined || value.vendor==''){value.vendor='Unknown';}
				tr += '<td>'+value.vendor+'</td>';
				if (value.device==undefined || value.device==''){value.device='Unknown';}
				tr += '<td>'+value.device+'</td>';

				el.tbody.append('<tr>'+tr+'</tr>');
			};

			/**
			 * Inicia el plugin.
			 */
			var init = function(){
				// Obtine las configuraciones basicas del usuario.
				settings = $.extend({}, defaults, options);
				// Creamos una estructura de nodos para facil acceso.
				nodeStruct();
				// Cargamos la estructura
				loadStruct(settings.data);
				// Notificamos al usuario.
				$.smallBox({
					title : "Widget core device!",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});
			};

			/**
			 * Carga la estructura de la tabla
			 */
			var loadStruct = function(data){
				$.each(data, addRow);
			};

			/**
			 * Estructura de nodos.
			 */
			var nodeStruct = function(){
				if(el.find('tbody').length == 0){el.append("<tbody/>");}
				el.tbody = el.find('tbody');
			};

			init();
		};

	})(jQuery);

	$('#table-device-linfo').tableDevice({'data': {{ json_encode($device) }}});

</script>