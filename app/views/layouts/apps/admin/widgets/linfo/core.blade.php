<div class="custom-scroll table-responsive" style="height:290px; overflow-y: scroll;">
	<table class="table table-striped table-hover table-condensed" id="table-core-linfo">
		<tbody></tbody>
	</table>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset('css/your_style.css') }}"/>
<script type="text/javascript">

	(function($){
			
		var defaults = {
			"iconType": 'fa fa-',
			"data": undefined
		};

		$.fn.tableCore = function(options)
		{
			if (this.length==0) {alert("Error in Table Core!");return this;};

			// Referencia al objeto contenedor.
			var el = this;

			// Canfiguraciones del usuario.
			var settings = undefined;

			// Icono
			var icon = undefined;

			/**
				* Añade 1 o mas filas a la tabla.
				*/
			var addRow = function(key, value){
				console.log(key);
				console.log(value);
				console.log("----------------------------------------------");
				switch(key)
				{
					case 'cpus':
						var cpus = 0;
						var aux = '';
						if (value.Vendor!=undefined){aux+=value.Vendor + '';}
						$.each(value, function(a, b){
							if(aux!=''){aux+='<br/>';}
							cpus++;
							aux += b.Vendor + '-' + b.Model + ' (' + b.MHz + ')';
						});
						key += ' ('+cpus+')'; 
						value = aux;
					break;
					case 'distro':
						if (value !== false) {
							value = '<i class="icon icon_distro_'+value.name.toLowerCase()+'"/>'+value.name+' '+value.version;
						};
					break;
					case 'load':
						var td = '';
						if(typeof value !== "number"){
							$.each(value, function(label, load){
								td += getProgress(label, load, 'blue');
							});
						} else {
							td += getProgress("load", value/100, 'blue');
						}
						value = td;
					break;
					case 'os':
						value = '<i class="' + icon + '"/> ' + value;
					break;
					case 'process_stats':
						var tr = '';
						if (value.totals!=undefined)
						{
							tr += '<tr><th>process</th><td>' +
							      'running: ' + value.totals.running + 
							      '; zombie:' + value.totals.zombie +
							      '; stopped: ' + value.totals.stopped +
							      '; sleeping: ' + value.totals.sleeping + 
							      '; totals: ' + value.proc_total + '</tr>';

						};
						if (value.threads!=undefined) {
							tr += '<tr><th>threads</th><td>' + value.threads + '</td></tr>';
						};
					break;
					case 'upTime':
						var aux = '';
						if (value.years!=undefined){aux+=value.years + ' years, ';}
						if (value.days!=undefined){aux+=value.days + ' days, ';}
						if (value.hours!=undefined){aux+=value.hours + ' hours, ';}
						if (value.minutes!=undefined){aux+=value.minutes + ' minutes, ';}
						if (value.seconds!=undefined){aux+=value.seconds + ' seconds';}
						if (value.booted!=undefined){aux+='; booted ' + value.booted;}
						value = aux; 
					break;
				}
				if (tr==undefined){var tr='<tr><th>'+key+'</th><td>'+value+'</td></tr>';};

				el.tbody.append(tr);
			};

			var getProgress = function(label, value, color)
			{
				return '<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12"><span class="text">'+label+' <span class="pull-right">'+Math.round(value*100)+'%</span></span><div class="progress progress-xs"><div class="progress-bar bg-color-'+color+'" style="width: '+(value*100)+'%;"></div></div></div>';
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
					title : "Widget core list!",
					content : "<i class='fa fa-clock-o'></i><i>1 seconds ago...</i>",
					color : "#5F895F",
					iconSmall : "fa fa-check bounce animated",
					timeout : 4000
				});
			};

			var isFloat = function(n) {
			    return n === +n && n !== (n|0);
			}

			var isInteger = function(n) {
			    return n === +n && n === (n|0);
			}

			/**
             * Carga la estructura de la tabla
			 */
			var loadStruct = function(data){
					
				if(settings.iconType!=undefined){
					icon = settings.iconType;
				}

				if (data.icon!=undefined) {
					icon = (icon!=undefined?icon:'') + data.icon;
					delete data.icon;
				}
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

	$('#table-core-linfo').tableCore({'data':{{ json_encode($core) }}});

</script>