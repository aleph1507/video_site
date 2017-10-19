    <div class="bgvid-container" style="margin-top:10vh;">
        <video poster="img/bgvid.png" src="bgvid/bgvid.mp4" 
            class="bgvideo" type="video/mp4" autoplay muted loop>
                Your browser does not support HTML5 video.
        </video>
        <?php 
            if($settings)
                $bgvid_tint = $settings->bgvid_tint ? $settings->bgvid_tint : "N/A";
            else
                $bgvid_tint = "N/A";
        ?>
        @if($bgvid_tint == "blue")
            <div class="text" style="background: rgba(0,0,150,0.4);">
        @elseif($bgvid_tint == "green")
            <div class="text" style="background: rgba(0,150,0,0.4);">
        @elseif($bgvid_tint == "red")
            <div class="text" style="background: rgba(150,0,0,0.4);">
        @elseif($bgvid_tint == "black")
            <div class="text" style="background: rgba(50,50,50,0.4)">
        @else
            <div class="text">
        @endif
        <?php ?>
            <h1 class="bgvid-h font-effect-shadow-multiple" style="<?php echo $header_color . $header_background; ?>">{{$settings ? ($settings->header ? $settings->header : ""): ""}}</h1>
            <p class="bgvid-p" style="<?php echo $mission_background . $mission_color; ?>">
               {{$settings ? ($settings->mission ? $settings->mission : ""): ""}}
            </p>
        </div>
    </div>