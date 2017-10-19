<?php 
    $bg_sections_style = "";
    $fg_sections = "";
    $header_background = "";
    $header_color = "";
    $mission_background = "";
    $mission_color = "";
    if($settings){
        $bg_sections_style = $settings->bg_sections ? $settings->bg_sections : "";
        $fg_sections = $settings->fg_sections ? $settings->fg_sections : "";
        $header_background = $settings->header_background ? $settings->header_background : "";
        $header_color = $settings->header_color ? $settings->header_color : "";
        $mission_background = $settings->mission_background ? $settings->mission_background : "";
        $mission_color = $settings->mission_color ? $settings->mission_color : "";
    }
    else{
        $bg_sections_style = "";
        $fg_sections = "";
        $header_background = "";
        $header_color = "";
        $mission_background = "";
        $mission_color = "";
    }
?>

@include('partials._head')

<body>
    @include('partials._nav')

    @include('partials._messages')

    
    @include('partials._bgvid')


    <div class="container vidscontainer" id="work">
        <hr class="hrsep" style="{{ $bg_sections_style }}">

        @include('partials._catmenu')

        <div class="vidrow animatedParent">
            @foreach($videos as $v)
                <div class="mix video {{$v->category->name}}">
                    <video class="samplevid" poster="{{asset('videos/posters/' . $v->poster)}}" 
                        src="{{asset('videos/' . $v->filename)}}" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
            @endforeach
        </div>
        <div class="pages">
            {{$videos->links()}}
        </div>

    </div>

    @include('partials._about')

    @include('partials._contact')

    @include('partials._footer')

    <script src={{asset("js/jquery-3.2.1.min.js")}}></script>
    <script src={{asset("js/bootstrap.min.js")}}></script>
    <script src={{asset("js/mixitup.min.js")}}></script>
    <script>
        var mixer = mixitup('.vidscontainer');
        var mixer = mixitup(containerEl);
        var mixer = mixitup(containerEl, {
            selectors: {
                target: '.blog-item'
            },
            animation: {
                duration: 300
            }
        });
    </script>
    <script src={{asset("js/scripts.js")}}></script>
</body>
</html>