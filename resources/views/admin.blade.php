@include('partials._head')

<body>
    @include('partials._nav')

	@include('partials._messages')

	<div id="accordion">
	  <h3>Videos</h3>
	  <div>
	  	<form action="{{ route("video.store") }}" method="POST" enctype="multipart/form-data">
	  		{{csrf_field()}}
	  		<div class="row">
	  			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  				<label for="title">Video title:</label>
					<input type="text" name="title" class="form-control">
					<label for="description">Video description:</label>
					<textarea name="description" id="#desc" cols="30" rows="5" class="form-control"></textarea>
	  			</div>
	  			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  				<label for="category_id">Category:</label>
	  				<select name="category_id" id="category" class="form-control">
	  					<option value="cat1">cat1</option>
	  					<option value="cat2">cat2</option>
	  				</select>
	  				<label for="video">Video file:</label>
	  				<input type="file" name="video" accept="video/*">
	  				<label for="poster">Video poster:</label>
	  				<input type="file" name="poster" accept="image/*">
	  				<input type="submit" class="contact-submit bottom-btn bottom-btn-1">
	  			</div>
	  		</div>
	  	</form>
	  </div>
	  <h3>Biography</h3>
	  <div>
	    <form action="#" method="POST" enctype="multipart/form-data">
	    	<div class="row">
	    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<label for="picture">Profile picture:</label>
	    			<input type="file" name="picture" class="form-control" accept="image/*">
	    		</div>
	    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<label for="bio">Biography:</label>
	    			<textarea name="bio" id="bio" class="form-control" cols="30" rows="5"></textarea>
	    			<input type="submit" class="bottom-btn bottom-btn-1">
	    		</div>
	    	</div>
	    </form>
	  </div>
	  <h3>Heading</h3>
	  <div>
	    <p>
	    <form action="#" method="POST" enctype="multipart/form-data">
	    	<div class="row">
	    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<label for="header">Header:</label>
					<input type="text" name="header" class="form-control">
					<label for="mission">Mission:</label>
					<input type="text" name="mission" class="form-control">		
	    		</div>
		    	<div class="col-lg-6 col-md-6 col-sm-12 xol-xs-12">
			    	<label for="video">Background video:</label>
	    			<input type="file" name="bgvid" class="form-control" accept="video/*">
					<input type="submit" class="bottom-btn bottom-btn-1">	
		    	</div>
	    	</div>
	    </form>
	  </div>
	  <h3>Site settings</h3>
	  <div>
	    <p>
	    Cras dictum. Pellentesque habitant morbi tristique senectus et netus
	    et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
	    faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
	    mauris vel est.
	    </p>
	    <p>
	    Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
	    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
	    inceptos himenaeos.
	    </p>
	  </div>
	</div>

    @include('partials._footer')

    <script src={{asset("js/jquery-3.2.1.min.js")}}></script>
    <script src={{asset("js/bootstrap.min.js")}}></script>
    <script src='{{ asset("js/jquery-ui.min.js") }}'></script>
    <script src={{asset("js/scripts.js")}}></script>
    <script>
	  $( function() {
	  	var icons = {
      		header: "ui-icon-circle-arrow-e",
      		activeHeader: "ui-icon-circle-arrow-s"
    	};
    	$( "#accordion" ).accordion({
    		icons: icons,
      		collapsible: true,
      		autoHeight: true
    	});
  	   } );
	</script>
</body>
</html>