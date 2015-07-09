<!-- widget grid -->
<section id="widget-grid" class="">	
	<!-- row -->
	<div class="row">
		<div class="col-sm-12">
				<div class="well well-sm">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-6">
							<div class="well well-light well-sm no-margin no-padding">

								<div class="row">

									<div class="col-sm-12">
										<div id="myCarousel" class="carousel fade profile-carousel">
											<div class="air air-bottom-right padding-10">
												<a href="javascript:void(0);" class="btn txt-color-white bg-color-teal btn-sm"><i class="fa fa-check"></i> Follow</a>&nbsp; <a href="javascript:void(0);" class="btn txt-color-white bg-color-pinkDark btn-sm"><i class="fa fa-link"></i> Connect</a>
											</div>
											<div class="air air-top-left padding-10">
												<h4 class="txt-color-white font-md">{{ date("F j, Y") }}</h4>
											</div>
											<ol class="carousel-indicators">
												<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												<li data-target="#myCarousel" data-slide-to="1" class=""></li>
												<li data-target="#myCarousel" data-slide-to="2" class=""></li>
											</ol>
											<div class="carousel-inner">
												<!-- Slide 1 -->
												<div class="item active">
													<img src="img/demo/s1.jpg" alt="">
												</div>
												<!-- Slide 2 -->
												<div class="item">
													<img src="img/demo/s2.jpg" alt="">
												</div>
												<!-- Slide 3 -->
												<div class="item">
													<img src="img/demo/m3.jpg" alt="">
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-12">

										<div class="row">

											<div class="col-sm-3 profile-pic">
												<img src="{{ route('users.photo', $user->id) }}" width="120" height="120">
											</div>
											<div class="col-sm-6">
												<h1>
													<span class="semi-bold">
														{{ cut_name($user->full_name) }}
													</span>
												<br>
												<small> {{ ucwords(Lang::get('category.'.$user->category->name)) }}, SmartAdmin</small></h1>

												<ul class="list-unstyled">
													<li>
														<p class="text-muted">
															<i class="fa fa-phone"></i>&nbsp;&nbsp;(<span class="txt-color-darken">313</span>) <span class="txt-color-darken">464</span> - <span class="txt-color-darken">6473</span>
														</p>
													</li>
													<li>
														<p class="text-muted">
															<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:simmons@smartadmin">{{ $user->email }}</a>
														</p>
													</li>
												</ul>
												<br>
												<p class="font-md">
													<i>A little about me...</i>
												</p>
												<p>

													Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
													cumque nihil impedit quo minus id quod maxime placeat facere

												</p>
												<br>
												<a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-envelope-o"></i> Send Message</a>
												<br>
												<br>

											</div>
											<div class="col-sm-3">
												<h1>
													<small>{{ ucwords(Lang::get('category.teacher')) }}</small>
												</h1>
												<ul class="list-inline friends-list">
													@foreach($user->joinGroupCollections as $joinGroupCollection)
														<li>
															<a href="{{ 'app/profile/'. $joinGroupCollection->groupCollection->teacher->id }}">
																<img src="{{ route('users.photo', $joinGroupCollection->groupCollection->teacher->id) }}" title="{{ $joinGroupCollection->groupCollection->teacher->full_name }}">
															</a>
														</li>
													@endforeach
												</ul>
											</div>

										</div>

									</div>

								</div>
								<!-- end row -->

							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
	<!-- end row -->
</section>
<!-- end widget grid -->

<script type="text/javascript">

	pageSetUp();
	
	// pagefunction
	
	var pagefunction = function() {
		// clears the variable if left blank
	};
	
	$(document).on('click', '.friends-list li a[href!="#"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);
	    // if parent is not active then get hash, or else page is assumed to be loaded
	    if (!$this.parent().hasClass("active") && !$this.attr('target')) {
	        // update window with hash
	        // you could also do here:  thisDevice === "mobile" - and save a little more memory
	        if ($.root_.hasClass('mobile-view-activated')) {
	            $.root_.removeClass('hidden-menu');
	            $('html').removeClass("hidden-menu-mobile-lock");
	            window.setTimeout(function() {
	                if (window.location.search) {
	                    window.location.href = window.location.href
	                        .replace(window.location.search, '').replace(
	                            window.location.hash, '') + '#' +
	                        $this.attr('href');
	                } else {
	                    window.location.hash = $this.attr('href');
	                }
	            }, 150);
	            // it may not need this delay...
	        } else {
	            if (window.location.search) {
	                window.location.href = window.location.href.replace(
	                    window.location.search, '').replace(window.location
	                    .hash, '') + '#' + $this.attr('href');
	            } else {
	                window.location.hash = $this.attr('href');
	            }
	        }
	        // clear DOM reference
	        // $this = null;
	    }
	});


	// end pagefunction
		
	// run pagefunction
	pagefunction();
	
</script>