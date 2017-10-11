@include('partials._head')

<body>
    @include('partials._nav')

    @include('partials._messages')

    
    @include('partials._bgvid')


    <div class="container vidscontainer" id="work">
        <hr class="hrsep">

        @include('partials._catmenu')

        <div class="vidrow">
            <div class="mix video one">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video two">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video three">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div><div class="mix video one">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video two">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video three">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div><div class="mix video one">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video two">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video three">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div><div class="mix video one">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video two">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
                <div class="mix video three">
                    <video poster="img/bgvid.png" src="video/samplework.mp4" 
                        class="samplevid" type="video/mp4" controls="true">
                            Your browser does not support HTML5 video.
                    </video>
                </div>
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