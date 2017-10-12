<div class="menubar">
    <ul class="vidcats">
    	<li data-filter="all">All</li>
    	@foreach($categories as $c)
			<li data-filter=".{{$c->name}}">{{$c->name}}</li>
    	@endforeach
        {{-- <li data-filter="all">All</li>
        <li data-filter=".two">Two</li>
        <li data-filter=".three">Three</li>
        <li data-filter=".four">Four</li>
        <li data-filter=".five">Five</li> --}}
    </ul>
</div>