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
	  					@foreach($categories as $c)
	  						<option value="{{$c->id}}">{{$c->name}}</option>
	  					@endforeach
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
	    <form action='{{route("bio.store", $bio ? $bio->id : 1)}}' method="POST" enctype="multipart/form-data">
	    	{{csrf_field()}}
	    	<div class="row">
	    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<label for="picture">Profile picture:</label>
	    			<input type="file" name="profile_pic" class="form-control" accept="image/*">
	    			{{-- <label for="name">Name:</label> --}}
	    			<input type="text" name="name" class="form-control" value="{{$bio ? "$bio->name" : ""}}" placeholder="Name">
	    			{{-- <label for="education">Education:</label> --}}
	    			<input type="text" name="education" class="form-control" value="{{$bio ? "$bio->education" : "" }}" placeholder="Education">
	    			{{-- <label for="working_since">Working Since:</label> --}}
	    			<input type="text" name="working_since" class="form-control" placeholder="Working Since"value="{{$bio ? "$bio->working_since" : ""}}" >
	    			{{-- <label for="fav_tech">Fav Tech:</label> --}}
	    			<input type="text" name="fav_tech" class="form-control" value="{{$bio ? "$bio->fav_tech" : ""}}" placeholder="Fav Tech">
	    			{{-- <label for="address">Address:</label> --}}
	    			<input type="text" name="address" class="form-control" value="{{$bio ? "$bio->address" : ""}}" placeholder="Address">
	    		</div>
	    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<label for="biography">Biography:</label>
	    			<textarea name="biography" id="bio" class="form-control" cols="30" rows="5">{{$bio ? "$bio->biography" : ""}}</textarea>
	    			<input type="submit" class="bottom-btn bottom-btn-1">
	    		</div>
	    	</div>
	    </form>
	  </div>
	  <h3>Categories</h3>
	  <div>
	  	<form action="{{route('category.store')}}" method="POST">
	  		{{csrf_field()}}
	  		<div class="row">
	  			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
	  				<label for="name">New category:</label>
			  		<input type="text" name="name" class="form-control">
	  			</div>
	  			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
	  				<input type="submit" class="bottom-btn bottom-btn-1" value="Add Category">
	  			</div>
	  		</div>
	  	</form>
	  	<label class="label-vertical-margin">Current categories:</label>
	  		@foreach($categories as $c)
		  		<div class="row">
		  			<form action="{{route("category.update", $c->id)}}" method="POST">
			  			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
			  				<input type="text" name="name" value="{{$c->name}}" class="form-control">
			  			</div>
			  			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			  					{{csrf_field()}}
			  					<input type="submit" value="Rename" class="bottom-btn bottom-btn-1 bottom-btn-2">
			  			</div>
		  			</form>
		  			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
		  				<form action='{{route("category.delete", $c->id)}}' method="POST">
		  					{{csrf_field()}}
		  					<input type="submit" value="Delete" class="bottom-btn bottom-btn-1 bottom-btn-2 bottom-btn-red">
		  				</form>
		  			</div>
		  		</div>
	  		@endforeach
	  </div>
	  <h3>Site settings</h3>
	  <div>
		    <form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
		    	{{csrf_field()}}
		    	<div class="row">
		    		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		    			<label for="header">Header:</label>
						<input type="text" name="header" value="{{$settings ? $settings->header : "" }}" class="form-control">
						<label for="mission">Mission:</label>
						<textarea name="mission" id="mission" cols="30" rows="5" class="form-control">{{$settings ? $settings->mission : ""}}</textarea>		
		    		</div>
			    	<div class="col-lg-6 col-md-6 col-sm-12 xol-xs-12">
				    	<label for="bgvid">Background video:</label>
		    			<input type="file" name="bgvid" class="form-control" accept=".mp4">
		    			<label for="bgvid_tint" class="label-vertical-margin">Background Video Color:</label>
		    			<select name="bgvid_tint" id="bgvid_tint">
		    				<option value="teal" {{$settings ? ($settings->bgvid_tint == 'teal' ? "selected" : ""): ""}}>Teal</option>
		    				<option value="blue" {{$settings ? ($settings->bgvid_tint == 'blue' ? "selected" : ""): ""}}>Blue</option>
		    				<option value="green" {{$settings ? ($settings->bgvid_tint == 'green' ? "selected" : ""): ""}}>Green</option>
		    				<option value="red" {{$settings ? ($settings->bgvid_tint == 'Red' ? "selected" : ""): ""}}>Red</option>
		    			</select>
						<input type="submit" class="bottom-btn bottom-btn-1">	
			    	</div>
		    	</div>
		    </form>
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