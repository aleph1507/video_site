<?php 
    $bg_sections_style = "";
    if($settings)
        $bg_sections_style = $settings->bg_sections ? $settings->bg_sections : "";
    else
        $bg_sections_style = "";
// if($bg_sections == "blue"){
//         $bg_sections_style .= "background: rgba(0,0,150,0.4);";
//     }
// elseif($bg_sections == "green"){
//         $bg_sections_style .= "background: rgba(0,150,0,0.4);";
//     }
// elseif($bg_sections == "red"){
//         $bg_sections_style .= "background: rgba(150,0,0,0.4);";
//     }
// elseif($bg_sections == "black"){
//         $bg_sections_style .= "background: rgba(0,0,0,0.4);";
//     }
// else{
//     $bg_sections_style .= "";
// }

?>


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
	  						<option value="{{$c->id}}">{{str_replace("_", " ", $c->name)}}</option>
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
	  <h3>Edit Videos</h3>
	  <div>
	  	@foreach($videos as $v)
			<div class="row videoedit">
				<form action="{{route('video.update', $v->id)}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
						<div class="video">
							<video class="samplevid" poster="{{asset('videos/posters/' . $v->poster)}}" 
                       			 src="{{asset('videos/' . $v->filename)}}" type="video/mp4" controls="true">
                            		Your browser does not support HTML5 video.
                    		</video>		
						</div>
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<label for="title">Title:</label>
						<input type="text" name="title" value="{{$v->title}}">
						<label for="video">Change video:</label>
	  					<input type="file" name="video" accept="video/*">
	  					<label for="poster">Change poster:</label>
	  					<input type="file" name="poster" accept="image/*">
						<input type="submit" value="Save" class="bottom-btn bottom-btn-sm">
	  				</div>
	  				<div class="col-lg-5">
	  					<label for="category_id">Change category:</label>
	  					<select name="category_id" id="category" class="form-control">
		  					@foreach($categories as $c)
		  						<option value="{{$c->id}}" {{$v->category_id == $c->id ? "selected" : ""}}>{{str_replace("_", " ", $c->name)}}</option>
		  					@endforeach
	  					</select>
						<label for="description">Change description:</label>
						<textarea name="description" id="#desc" cols="30" rows="5" class="form-control">{{$v->description}}</textarea>
					</div>
				</form>
				<form action="{{route('video.delete', $v->id)}}" method="POST">
					{{csrf_field()}}
					<input type="submit" value="Delete" class="bottom-btn bottom-btn-red bottom-btn-sm">
				</form>
			</div>
			<hr>
	  	@endforeach
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
			  				<input type="text" name="name" value="{{str_replace("_", " ", $c->name)}}" class="form-control">
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
	  		<div class="row">
	  			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
	  				<form action="{{route('settings.store')}}" method="POST" enctype="multipart/form-data">
		    			{{csrf_field()}}
						<label for="header">Header:</label>
						<input type="text" name="header" value="{{$settings ? $settings->header : "" }}" class="form-control">
						<label for="mission" class="vs1em">Mission:</label>
						<textarea name="mission" id="mission" cols="30" rows="5" class="form-control">{{$settings ? $settings->mission : ""}}</textarea>	
						<label for="bgvid" class="vs1em">Background video:</label>
		    			<input type="file" name="bgvid" class="form-control" accept=".mp4">	
		    			<label for="bgvid_tint" class="">Background Video Color:</label>
		    			<select name="bgvid_tint" class="form-control" id="bgvid_tint">
		    				<option value="teal" {{$settings ? ($settings->bgvid_tint == 'teal' ? "selected" : ""): ""}}>Teal</option>
		    				<option value="blue" {{$settings ? ($settings->bgvid_tint == 'blue' ? "selected" : ""): ""}}>Blue</option>
		    				<option value="green" {{$settings ? ($settings->bgvid_tint == 'green' ? "selected" : ""): ""}}>Green</option>
		    				<option value="red" {{$settings ? ($settings->bgvid_tint == 'red' ? "selected" : ""): ""}}>Red</option>
		    				<option value="black" {{$settings ? ($settings->bgvid_tint == 'black' ? "selected" : ""): ""}}>Black</option>
		    			</select>
		    			<input type="submit" class="bottom-btn bottom-btn-1 vs1em">	
		    		</form>
	  			</div>
	  			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
	  				<div class="row">
	  					<form action="{{route('headerstyle.store')}}" method="POST">
	  						{{csrf_field()}}
		  					<div id="headercolor" class="vs1em" name="divheadercolor">
			   					<label for="header_color">Header color:</label>
			   					<input type="color" name="header_color" value="#FFFFFF">
			   					<label for="header_background" class="vs1em">Header Background:</label>
			   					<input type="color" name="header_background" value="#000000"><br>
			   					<label for="header_bg_alpha">Header Background Alpha Transparency: 0.</label>
			   					<input type="number" name="header_bg_alpha" style="max-width:30px;" min="0" max="9" value="5">
			   				</div>
			   				<input type="submit" value="Save Header Style" class="bottom-btn bottom-btn-1 short-btn vs1em">
	  					</form>
	  				</div>
	  				<div class="row">
	  					<form action="{{route('missionstyle.store')}}" method="POST">
		  					{{csrf_field()}}
			  				<div id="missioncolor" class="vs1em" name="divmissioncolor">
				   				<label for="mission_color">Mission color:</label>
			   					<input type="color" name="mission_color" value="#FFFFFF">
			   					<label for="mission_background" class="vs1em">Mission background:</label>
			   					<input type="color" name="mission_background" value="#000000"><br>
			   					<label for="mission_bg_alpha">Mission Background Alpha Transparency: 0.</label>
			   					<input type="number" name="mission_bg_alpha" style="max-width:30px;" min="0" max="9" value="5">

			   					<input type="submit" value="Save Mission Style" class="bottom-btn bottom-btn-1 short-btn vs1em">
			   				</div>
	   					</form>
	  				</div>
	  			</div>
	  		</div>
		</div>
		<h3>Sections Color Settings</h3>
	  	<div>
	  		<div class="row">
	  			<form action="{{route('sectionstyle.store')}}" method="POST">
	  			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  				{{-- <p class="lead">Sections background settings</p> --}}
	  				{{-- <hr class="hrsep-sm"> --}}
	  					{{csrf_field()}}
	  					<label for="bg_sections_color" class="vs1em">Sections background color:</label>
		    			<input type="color" name="bg_sections_color" value="#99D5D5"><br>
		    			<label for="gradient" class="vs1em">Gradient:</label>
		    			<select name="gradient" id="gradient" class="form-control">
			    			<option value="none">None</option>
			    			<option value="topdown">Top to Bottom</option>
			    			<option value="leftright">Left to Right</option>
			    			<option value="diagonal">Diagonal</option>
			    		</select>
			    		<label for="fg_sections" class="vs1em">Font color:</label>
			    		<input type="color" name="fg_sections" value="#33333">
	  				</div>
	  				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	  					<label for="bg_alpha_opacity" class="vs1em">Alpha opacity: 0.</label>
		    			<input type="number" name="bg_alpha_opacity" style="max-width:30px;" min="0" max="9" value="9"><br><br>
		    			<div id="gradientcolor" class="vs2em" name="divgradientcolor">
		    				<label for="gradientcolor">Gradient Color:</label>
		    				<input type="color" name="gradientcolor" value="#FFFFFF">
		    			</div>

	  					<input type="submit" value="Save Sections Background" class="bottom-btn bottom-btn-1 vs2em">
	  				</div>
	  			</form>
	  		</div>
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
      		heightStyle: "fill",
      		autoHeight: false,
      		fillSpace:true
    	});
    	$("div#gradientcolor").hide("fast");
    	$("select#gradient").on("change", function(){
    		if($("select#gradient").find(":selected").text() != "None"){
    			$("div#gradientcolor").show("fast");
    		}
    		else{
    			$("div#gradientcolor").hide("fast");
    		}
    	});
  	   } );
	</script>
</body>
</html>