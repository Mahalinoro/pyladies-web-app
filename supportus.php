<?php
    require "alt-navbar.php";
?>

<main>
    <div class="supportus--flex">
        <div class="supportus--main-content">
            <div class="supportus--main-content-wrapper">
                <div class="supportus--card--header">
                    <h5><span> < </span>SUPPORT US<span> /> </span></h5>                    
                </div>
                
                <div class="supportus--card--content">
                <h6>WHY HELP THE PYLADIES?</h6>
                    <p>PyLadies Antananarivo want to bring fresh talent into the Python community and to support both seasoned and budding developers through workshops, community activities, and local advocacy. Your support of PyLadies' outreach efforts will pay off hugely over the long term by improving the diversity of the software industry as a whole.</p>
                    <h6>HOW YOU CAN HELP?</h6>
                    <ol>
                        <li>Make a donation through our online form.</li>
                        <li>Email <a href="tnr@pyladies.com">us</a> indicating how you would like to sponsor Pyladies.</li>
                        <li>Make a donation through the <a href="#">Python Software Foundation</a>. Donations made are tax-deductible. If you would prefer not to use credit card or PayPal, please contact <a href="#">us</a> to make other arrangements.</li>
                    </ol>
                    <p>If you know of a talented, deserving developer who might benefit greatly from attending a Python or Open Source conference, let us know. We'll do our best to help as many women as possible.</p>
                </div>
            </div>
        </div>

        <div class="supportus--card--social-media">
            <div class="supportus--card--header">
                <h5><span> < </span>DONATE<span> /> </span></h5>
            </div>

            <div class="supportus--card--content">
                
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
