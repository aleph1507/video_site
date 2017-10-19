{{--  --}}

<div class="menubar" style="<?php echo $fg_sections; ?>">
    <ul class="vidcats">
    	<li style="<?php echo $bg_sections_style; ?>" data-filter="all">All</li>
    	@foreach($categories as $c)
			<li style="<?php echo $bg_sections_style; ?>" data-filter=".{{$c->name}}">{{str_replace("_", " ", $c->name)}}</li>
    	@endforeach
        {{-- <li data-filter="all">All</li>
        <li data-filter=".two">Two</li>
        <li data-filter=".three">Three</li>
        <li data-filter=".four">Four</li>
        <li data-filter=".five">Five</li> --}}
    </ul>
</div>