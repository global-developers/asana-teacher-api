<!-- widget grid -->
<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-datatable-users" data-widget-editbutton="false">
				
				<header>
					<span class="widget-icon"> <i class="fa fa-group"></i> </span>
					<h2>Users</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<table id="datatable-users"  class="display projects-table table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					            	<th>ID</th>
				                    <th>
				                    	<i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Full Name
				                    </th>
				                    <th>
				                    	<i class="fa fa-fw fa-envelope text-muted hidden-md hidden-sm hidden-xs"></i> Email
				                    </th>
				                    <th>Category</th>
				                    <th>Authorized</th>
					            </tr>
					        </thead>
						</table>

					</div>
				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->    
	</div>
	<!-- end row -->
</section>
<!-- end widget grid -->

<script type="text/javascript">

	pageSetUp();
	
	// pagefunction
	var pagefunction = function() {

		// clears the variable if left blank
	    var dataTableUsers = $('#datatable-users').dataTable({
	    	"ajax": {
	    		"url": "{{ asset('api/users') }}",
	    		"type": "GET",
	    		"data": {"_token": "{{ csrf_token() }}"}
	    	},
	        "createdRow": function ( row, data, index ) {
	            $('td', row).eq(4).addClass("text-center").html("<span class='label label-" + (data.authorized=="on"?"success":"danger") + "'>" + data.authorized + "</span>");
	        },
	        "columns": [
	            { "data": "id" },
	            { "data": "full_name" },
	            { "data": "email" },
	            { "data": "category.name" },
	            { "data": "authorized" }
	        ]
	    });
	    
	};

	var pagedestroy = function(){
			
	}

	// load related plugins & run pagefunction
	loadScript("js/plugin/datatables/jquery.dataTables.min.js", function(){
		loadScript("js/plugin/datatables/dataTables.colVis.min.js", function(){
			loadScript("js/plugin/datatables/dataTables.tableTools.min.js", function(){
				loadScript("js/plugin/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("js/plugin/datatable-responsive/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});
	
</script>