<?php
include "language.php";
session_start();
?>
<head>
    <link href="../dist/css/flags.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
</head>
<script>
    function Changuelanguage()
    {
        var modal = document.getElementById("language");
        modal.style.display = "flex";//CloseLanguage
    }   
    function CloseLanguage()
    {
        var modal = document.getElementById("language");
        modal.style.display = "none";//CloseLanguage
    } 
    function updateL()
    {   
        var modal = document.getElementById("language");
        modal.style.display = "none";
        //var op = document.getElementById("codeL").value;
        //Response.Cookies["googtrans"].value = op;
        var leng = document.getElementById("codeL").innerHTML;
        
        var listC = leng.split('<');
        var listID = listC[1].split(" ");
        var penul = listID[1].split('"');
        if (penul[1] == "ZA")
        {
            leng = "<i class='flagstrap-icon flagstrap-za'style='margin-right:10px;'></i> Afrikaans";
            language = "af";
        }else if (penul[1] == "de")
        {
            leng = "<i id='de' class='flagstrap-icon flagstrap-de' style='margin-right: 10px;'></i> Deutsch";
            language = "de";
        }else if (penul[1] == "ar")
        {
            leng = "<i id='ar' class='flagstrap-icon flagstrap-ar' style='margin-right: 10px;'></i> Arabic";
            language = "ar";
        }else if (penul[1] == "CN")
        {
            leng = "<i id='CN' class='flagstrap-icon flagstrap-cn' style='margin-right: 10px;'></i> Chinese (Simplified)";
            language = "zh-CN";
        }else if (penul[1] == "KP")
        {
            leng = "<i id='KP' class='flagstrap-icon flagstrap-kp' style='margin-right: 10px;'></i> Korean";
            language = "ko";
        }else if (penul[1] == "es")
        {
            leng = "<i id='es' class='flagstrap-icon flagstrap-es' style='margin-right: 10px;'></i> Spanish";
            language = "es";
        }else if (penul[1] == "fr")
        { 
            leng = "<i id='fr' class='flagstrap-icon flagstrap-fr' style='margin-right: 10px;'></i>French";
            language = "fr";
        }else if (penul[1] == "US")
        {
            leng = "<i id='US' class='flagstrap-icon flagstrap-us' style='margin-right: 10px;'></i>English";
            language = 'en';
        }else if (penul[1] == "it")
        {
            leng = "<i id='it' class='flagstrap-icon flagstrap-it' style='margin-right: 10px;'></i> Italian";
            language = "it";
        }else if (penul[1] == "JP")
        {
            leng = "<i id='JP' class='flagstrap-icon flagstrap-jp' style='margin-right: 10px;'></i> Japanese";
            language = "ja";
        }else if (penul[1] == "NP")
        {
            leng = "<i id='NP' class='flagstrap-icon flagstrap-np' style='margin-right: 10px;'></i> Nepali";
            language = "ne";
        }else if (penul[1] == "pl")
        {
            leng = "<i id='pl' class='flagstrap-icon flagstrap-pl' style='margin-right: 10px;'></i> Polish";
            language = "pl";
        }else if (penul[1] == "pt")
        {
            leng = "<i id='pt' class='flagstrap-icon flagstrap-pt' style='margin-right: 10px;'></i> Portuguese";
            language = "pt";
        }else if (penul[1] == "ru")
        {
            leng = "<i id='ru' class='flagstrap-icon flagstrap-ru' style='margin-right: 10px;'></i> Russian";
            language = "ru";
        }else if (penul[1] == "th")
        {
            leng = "<i id='th' class='flagstrap-icon flagstrap-th' style='margin-right: 10px;'></i> Thai";
            language = "th";
        }
        else if (penul[1] == "vi")
        {
            leng = "<i id='vi' class='flagstrap-icon flagstrap-vi' style='margin-right: 10px;'></i> Vietnamese";
            language = "vi";
        }
        var selectField = document.querySelector("#google_translate_element select");
        for(var i=0; i < selectField.children.length; i++)
        {
            var option = selectField.children[i];
            // find desired langauge and change the former language of the hidden selection-field 
            if(option.value==language)
            {
                selectField.selectedIndex = i;
                // trigger change event afterwards to make google-lib translate this side
                selectField.dispatchEvent(new Event('change'));
                //var leng = $("#codeL option:selected").text();
                var SendInfo= 'leng='+leng+'&code='+language;
                //alert(leng);
                $.ajax({
                        type: 'POST',
                        url: "lenguage_session.php",
                        data: SendInfo,
                        success: function (data) {
                            //location.reload();
                            //window.location.reload(false); 
                            setTimeout(function(){
                            window.location.reload(1);
                            }, 1000);
                            //$( "#Footer" ).load(window.location.href + " #Footer" );
                        }
                });
                
                //return;
            }
        }
    } 
</script>
<footer class="Footer" id="Footer">
        <div class="container" style="padding-top: 30px;">
            <div class="links">
                <div class="row">
                    
                    <div id="google_translate_element" style="display:none;visibility:hidden;"></div>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <script type="text/javascript">
                        function googleTranslateElementInit() 
                        {
                            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                        }
                    </script>
                    <div class="col-xs-12 col-sm-12 col-lg-5 center-text ">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-2 center-text ">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-lg-5 paddingLenguage">
                        <a class="link   font-medium color5" onclick="Changuelanguage()" type="button"><?php echo $_SESSION['Leng']." (".$_SESSION['LengCod'].")";?></a>
                    </div>
                </div>
                <nav class="subnavfooter">
                    <div class="row" style="width: 100%;margin-left: 0px;">
                        <div class="col-xs-12 col-sm-12 col-lg-5 center-text ">
                                <a class="link   font-medium color5" style="padding-left: 30px;" href="../uses.php">Uses</a>
                                <a class="link   font-medium color5" style="padding-left: 30px;"href="../returns.php" >Returns</a>
                                <a class="link   font-medium color5" style="padding-left: 30px;" href="../help/support.php">Help</a>
                                <a class="link   font-medium color5" style="padding-left: 30px;" href="../help/contact_us.php">Contact Us</a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-2 center-text ">
                            <div style="width: 40px;display: inline-block;">
                                <a aria-label="Instagram" class="color5  social-icons" href="https://www.instagram.com/acmestickers/" rel="noopener noreferrer" target="_blank">
                                    <svg fill="currentColor" height="20" viewBox="0 0 857.1 1000" width="20">
                                        <path d="M571 500q0-59-41-101t-101-42-101 42-42 101 42 101 101 42 101-42 41-101zm77 0q0 91-64 156t-155 64-156-64-64-156 64-156 156-64 155 64 64 156zm61-229q0 21-15 36t-37 15-36-15-15-36 15-36 36-15 37 15 15 36zM429 148H327q-20 0-54 2t-57 5-40 11q-28 11-49 32t-33 49q-6 16-10 40t-6 58-1 53 0 59 0 43 0 43 0 59 1 53 6 58 10 40q12 28 33 49t49 32q16 6 40 11t57 5 54 2 59 0 43 0 42 0 59 0 54-2 58-5 39-11q28-11 50-32t32-49q6-16 10-40t6-58 1-53 0-59 0-43 0-43 0-59-1-53-6-58-10-40q-11-28-32-49t-50-32q-16-6-39-11t-58-5-54-2-59 0-42 0zm428 352q0 128-3 177-5 116-69 180t-179 69q-50 3-177 3t-177-3q-116-6-180-69T3 677q-3-49-3-177t3-177q5-116 69-180t180-69q49-3 177-3t177 3q116 6 179 69t69 180q3 49 3 177z"></path>
                                    </svg>
                                </a>
                            </div>
                            <div style="width: 40px;display: inline-block;">
                                <a aria-label="Facebook" class="color5  social-icons" href="https://www.facebook.com/acmestickers" rel="noopener noreferrer" target="_blank">
                                    <svg fill="currentColor" height="20" viewBox="0 0 571.4 1000" width="20">
                                        <path d="M535 7v147h-87q-48 0-65 20t-17 60v106h164l-22 165H366v424H195V505H53V340h142V218q0-104 58-161T408 0q82 0 127 7z"></path>
                                    </svg>
                                </a>
                            </div>
                            <div >
                                <a aria-label="Youtube" class="  social-icons" href="#" rel="noopener noreferrer" target="_blank" style="display:none; padding-left: 30px;">
                                    <svg fill="currentColor" height="20" viewBox="0 0 1000 1000" width="20">
                                        <path d="M397 629l270-139-270-141v280zm103-481q94 0 181 3t128 5l41 2 9 1q9 1 13 2t13 2 16 5 16 7 17 11 16 15q4 3 9 10t16 33 15 56q4 36 7 76t3 64v98q1 81-10 162-4 30-14 55t-18 35l-8 9q-7 8-16 15t-17 10-16 7-16 5-13 2-13 2-9 1q-140 11-350 11-115-2-201-4t-111-4l-28-3-20-2q-20-3-30-5t-29-12-31-23q-4-3-9-10t-16-33-15-56q-4-36-7-76t-3-64v-98q-1-81 10-162 4-31 14-55t18-35l8-9q8-9 16-15t17-11 16-7 16-5 13-2 13-2 9-1q140-10 350-10z"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-5 center-text ">
                            <div class="">
                                <label for="" class="fontlight color5">© 2021<!-- --> <!-- -->Acme Stickers</label>
                                <!-- <p style="display: inline-block;margin-top:0px;">© 2021 Acme Stickers</p>-->
                                <a class="link   font-medium color5" href="/legal/privacy.php" style="margin:0;">Privacy</a>
                                <label for="" class="fontlight color5" > &nbsp;&amp;&nbsp;</label>
                                <a class="link   font-medium color5" href="/legal/terms.php" >Terms</a>
                                <a class="link   font-medium color5" href="../sitemap.php">&nbsp;&nbsp;Site Map</a>
                            </div>
                        </div>
                    </div>
                </nav>
               
            </div>
        </div>
</footer>
    <script src="https://code.jquery.com/jquery-1.11.2.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="../dist/js/jquery.flagstrap.js"></script>
    <script>
    $('#options').flagStrap({
        countries: {
            "ZA": "Afrikaans",
            "de": "Deutsch",
            "ar": "Arabic",
            "CN": "Chinese (Simplified)",
            "CN": "Chinese (Traditional)",
            "KP": "Korean",
            "es": "Spanish",
            "fr": "French",
            "US": "English",
            "it": "Italian",
            "JP": "Japanese",
            "NP": "Nepali",
            "pl": "Polish",
            "pt": "Portuguese",
            "ru": "Russian",
            "th": "Thai",
            "vi": "Vietnamese"
        },
        buttonSize: "btn-sm",
        buttonType: "btn-info",
        labelMargin: "10px",
        scrollable: false,
        scrollableHeight: "350px"
    });

    </script>

