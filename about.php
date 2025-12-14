<?php
    include_once("header.php");
?>
    <style>
        .feature-grid{display:flex;gap:24px;justify-content:center;align-items:stretch;flex-wrap:wrap;margin-top:18px}
        .feature-card{width:300px;border-radius:12px;overflow:hidden;box-shadow:0 10px 24px rgba(0,0,0,.12);background:#fff;transition:transform .35s ease, box-shadow .35s ease}
        .feature-card:hover{transform:translateY(-3px);box-shadow:0 14px 32px rgba(0,0,0,.18)}
        .feature-img{width:100%;height:200px;object-fit:cover;display:block}
        .feature-overlay{padding:14px 18px;background:linear-gradient(0deg, rgba(0,0,0,.06) 0%, rgba(0,0,0,0) 100%);display:flex;justify-content:center;align-items:center}
        .feature-title{font-family:'Montserrat','Poppins','Helvetica Neue',Arial,sans-serif;letter-spacing:.12em;text-transform:uppercase;font-weight:600;color:#1f2937}
    </style>
    <!-- //header -->
    <div class="banner about-bnr">
        <div class="container">
        </div>
    </div>
    <!-- about -->
    <div class="about">
        <div class="container">
            <h3 class="w3ls-title1">About <span>Us</span></h3>
            <div class="about-agileinfo w3layouts">
                <div class="col-md-8 about-wthree-grids grid-top">
                    <h4>Eventally - We Create, You Celebrate. </h4>
                    
                    <p class="top">Our company is a full service company that delivers planning and execution for IEEE, Google, hackathon events and other tech experiences.</p>	
                    <p>Eventally is committed to delivering professional standards combined with personalized service and attention to make your tech event memorable successful.</p>				
            
                    <?php
                        $djImg = file_exists('images/cs_dj-sound.jpg') ? 'images/cs_dj-sound.jpg' : (file_exists('images/cs_dj-sound.JPG') ? 'images/cs_dj-sound.JPG' : (file_exists('images/cs_dj-sound2.jpg') ? 'images/cs_dj-sound2.jpg' : 'images/placeholder.png'));
                        $themeImg = file_exists('images/cs_theme.jpg') ? 'images/cs_theme.jpg' : (file_exists('images/cs_themeparty2.jpg') ? 'images/cs_themeparty2.jpg' : 'images/placeholder.png');
                        $hecathonImg = file_exists('images/cs_birthday.jpg') ? 'images/cs_birthday.jpg' : (file_exists('images/birthday1.jpg') ? 'images/birthday1.jpg' : 'images/placeholder.png');
                        $djSrc = $djImg . '?v=' . ((@filemtime($djImg)) ? @filemtime($djImg) : time());
                        $themeSrc = $themeImg . '?v=' . ((@filemtime($themeImg)) ? @filemtime($themeImg) : time());
                        $hecathonSrc = $hecathonImg . '?v=' . ((@filemtime($hecathonImg)) ? @filemtime($hecathonImg) : time());
                    ?>
                    <div class="feature-grid">
                        <div class="feature-card">
                            <img src="<?php echo $djSrc; ?>" alt="DJ Sound" class="feature-img" loading="lazy">
                            <div class="feature-overlay"><span class="feature-title">Google</span></div>
                        </div>
                        <div class="feature-card">
                            <img src="<?php echo $themeSrc; ?>" alt="Theme" class="feature-img" loading="lazy">
                            <div class="feature-overlay"><span class="feature-title">IEEE</span></div>
                        </div>
                        <div class="feature-card">
                            <img src="<?php echo $hecathonSrc; ?>" alt="Hackathon" class="feature-img" loading="lazy">
                            <div class="feature-overlay"><span class="feature-title">HACKATHON</span></div>
                        </div>
                    </div>
                </div>	
                <?php if (file_exists("sidebar.php")) { include_once("sidebar.php"); } ?>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //about -->
    <!-- about-slid -->
    <div class="about-slid agileits-w3layouts"> 
        <div class="container">
            <div class="about-slid-info"> 
                <h2 style="color: #B8865F;">We Power Your Next Big Tech Event</h2>
                <p>
                    <span style="color: #B8865F;">EventAlly is your one-stop platform for managing and delivering exceptional tech events.
                    From hackathons and developer meetups to conferences and product launches, we focus on what matters most—innovation, experience, and flawless execution.</span> 
                    <span style="color: #B8865F;">We understand the needs of the tech community, and we design every event to be smart, seamless, and future-ready.</span>
                </p>
            </div>
        </div>
    </div>
    <!-- //about-slid -->
    <!-- about-team -->
    <div class="about-team"> 
        <div class="container">
            <h3 class="w3ls-title1">Meet Our <span>Team</span></h3>
            <div class="team-agileitsinfo" style="display:flex; justify-content:center; gap:30px; flex-wrap:wrap;">
                <?php
                $gauravImg = file_exists('images/Gaurav.jpg') ? 'images/Gaurav.jpg' : (file_exists('images/Gaurav.JPG') ? 'images/Gaurav.JPG' : 'images/placeholder.png');
                $urvilImg = file_exists('images/urvil.png') ? 'images/urvil.png' : (file_exists('images/urvil.jpg') ? 'images/urvil.jpg' : (file_exists('images/urvil.JPG') ? 'images/urvil.JPG' : 'images/placeholder.png'));
                $priyanshImg = file_exists('images/priyansh.jpg') ? 'images/priyansh.jpg' : (file_exists('images/priyansh.JPG') ? 'images/priyansh.JPG' : 'images/placeholder.png');
                $gauravSrc = $gauravImg . '?v=' . ((@filemtime($gauravImg)) ? @filemtime($gauravImg) : time());
                $urvilSrc = $urvilImg . '?v=' . ((@filemtime($urvilImg)) ? @filemtime($urvilImg) : time());
                $priyanshSrc = $priyanshImg . '?v=' . ((@filemtime($priyanshImg)) ? @filemtime($priyanshImg) : time());
                ?>
                
                <div class="col-md-3 about-team-grids" style="width:300px;">
                    <div style="width:100%; background-color:#999; padding:15px; box-sizing:border-box;">
                        <div style="width:100%; height:280px; overflow:hidden; background-color:#fff;">
                            <img src="<?php echo $gauravSrc; ?>" alt="Gaurav" style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" loading="lazy"/>
                        </div>
                    </div>
                    <div class="team-w3lstext" style="background-color:#999; padding:15px; box-sizing:border-box;">
                        <h4><span>Gaurav Akabri,</span> Member</h4>
                    </div>
                </div>
                <div class="col-md-3 about-team-grids" style="width:300px;">
                    <div style="width:100%; background-color:#999; padding:15px; box-sizing:border-box;">
                        <div style="width:100%; height:280px; overflow:hidden; background-color:#fff;">
                            <img src="<?php echo $urvilSrc; ?>" alt="Urvil" style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" loading="lazy"/>
                        </div>
                    </div>
                    <div class="team-w3lstext" style="background-color:#999; padding:15px; box-sizing:border-box;">
                        <h4><span>Urvil Panchal,</span> Member</h4>
                    </div>
                </div>
                <div class="col-md-3 about-team-grids" style="width:300px;">
                    <div style="width:100%; background-color:#999; padding:15px; box-sizing:border-box;">
                        <div style="width:100%; height:280px; overflow:hidden; background-color:#fff;">
                            <img src="<?php echo $priyanshSrc; ?>" alt="Priyansh" style="width:100%; height:100%; object-fit:cover; object-position:center; display:block;" loading="lazy"/>
                        </div>
                    </div>
                    <div class="team-w3lstext" style="background-color:#999; padding:15px; box-sizing:border-box;">
                        <h4><span>Priyansh Modi,</span> Member</h4>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //about-team -->
    <!-- footer -->
    <?php include_once("footer.php"); ?>
