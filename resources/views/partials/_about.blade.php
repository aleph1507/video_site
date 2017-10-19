<div class="container">
    <hr class="hrsep" style="<?php echo $bg_sections_style; ?>">
</div>

<div class="container about" style="<?php echo $fg_sections; ?>" id="about">
        {{-- <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 about-me"> --}}
    <div class="row">
        <div class="col-lg-1 col-md-1"></div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 about-me" style="<?php echo $bg_sections_style == "" ? "background:rgba(0,150,150,0.4);" :  $bg_sections_style; ?>" >
            @if($bio && $bio->profile_pic)
                <?php $pp = asset('profile_picture/' . $bio->profile_pic); ?>
            @else 
                <?php $pp = "http://via.placeholder.com/170x170"; ?>
            @endif
            <img src="<?php echo $pp; ?>" class="img-responsive profile-img" alt="Profile">
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 about-me" style="<?php echo $bg_sections_style == "" ? "background:rgba(0,150,150,0.4);" :  $bg_sections_style; ?>"
            <p class="personal-info">
                <div class="flex-personal-info">
                    <span class="span-info name">{!!$bio ? ($bio->name ? $bio->name : "<i>Please add a name</i>" ) : "<i>Please add a name</i>"!!}</span><br>
                    <span class="span-info education">{!!$bio ? ($bio->education ? $bio->education : "<i>Please add education</i>" ) : "<i>Please add education</i>"!!}</span><br>
                    <span class="span-info working-since">{!!$bio ? ($bio->working_since ? $bio->working_since : "<i>Since when are you working?</i>" ) : "<i>Since when are you working?</i>"!!}</span><br>
                    <span class="span-info fav-tech">{!!$bio ? ($bio->fav_tech ? $bio->fav_tech : "<i>What's your favorite tech?</i>" ) : "<i>What's your favorite tech?</i>"!!}</span><br>
                    <span class="span-info address">{!!$bio ? ($bio->address ? $bio->address : "<i>What's your address?</i>" ) : "<i>What's your address?</i>"!!}</span><br>
                </div>
            </p>
        </div>
        {{-- </div> --}}
        <!-- <div class="col-lg-1 col-md-1"></div> -->
        <div class="row hidden-lg hidden-md">
            <div class="col-sm-12 col-xs-12" style="padding-top:20vh;"></div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about-me bio" style="<?php echo $bg_sections_style == "" ? "background:rgba(0,150,150,0.4);" :  $bg_sections_style; ?>">
            <p class="bio">
               {!!$bio ? ($bio->biography ? $bio->biography : "<i>Your bio here</i>" ) : "<i>Your bio here</i>"!!}
            </p>
        </div>
    </div>
</div>