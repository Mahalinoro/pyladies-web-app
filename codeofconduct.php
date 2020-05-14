<?php
    require "alt-navbar.php";
?>

<main>
    <div class="codeofconduct--flex">
        <div class="codeofconduct--main-content">
            <div class="codeofconduct--main-content-wrapper">
                <div class="codeofconduct--card--header">
                    <h5><span> < </span>CODE OF CONDUCT <span> /> </span></h5>
                </div>
                
                <div class="codeofconduct--card--content">
                    <p>Pyladies is dedicated to providing a respectful, harassment-free community for everyone. We do not tolerate harassment or bullying of any community member in any form. This does not only extend to members to local PyLadies communities, but to anyone who chooses to become involved in the larger PyLadies community of users, developers and integrators through events or interactions.</p>
                    <p>Harassment includes offensive verbal/electronic comments related to personal characteristics or choices, sexual images or comments in public or online spaces, deliberate intimidation, bullying, stalking, following, harassing photography or recording, sustained disruption of talks, IRC chats, electronic meetings, physical meetings or other events, inappropriate physical contact, or unwelcome sexual attention. Participants asked to stop any harassing or bullying behavior are expected to comply immediately.</p>
                    <p>If a participant engages in harassing behavior, representatives of the community may take reasonable action they deem appropriate, including warning the offender, expulsion from any PyLadies event, or expulsion from mailing lists, IRC chats, discussion boards and other electronic communications channels to resolve the issue. This may include expulsion from PyLadies Meetup group membership.</p>
                    <p>If you are being harassed, notice that someone else is being harassed, or have any other concerns, please act to intercede or ask for help from any member of the PyLadies community, IRC chat admins, website admins, or organizers/representatives of any physical events put on under the auspices of PyLadies.</p>
                    <p>This Code of Conduct has been adapted from the <a href="https://plone.org/foundation/materials/foundation-resolutions/code-of-conduct" target="_blank">Plone Foundation</a> and is licensed under a <a href="https://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons Attribution-Share Alike 3.0 Unported license</a></p>
                </div>
            </div>
        </div>

        <div class="codeofconduct--card--social-media">
            <div class="codeofconduct--card--header">
                <h5>Latest Tweets</h5>
                <a href="https://twitter.com/PyladiesTNR" target="_blank">Follow</a>
            </div>

            <div class="codeofconduct--card--content">
                <div class="codeofconduct--card--container">
                <a class="twitter-timeline" data-width="420" data-height="550" data-theme="light" href="https://twitter.com/mahalinoro_raz/lists/pyladies-global?ref_src=twsrc%5Etfw"></a> 
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>          
                </div>
            </div>                        
        </div>
    </div>
    
    <script type="text/javascript">
      /* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
      (function(d, m){
        var kommunicateSettings = {"appId":"2072ce0f10d71266e5b365099da5b9109","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
      })(document, window.kommunicate || {});
  </script>
</main>

<?php
    require "footer.php"
?>
