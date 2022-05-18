<?php
    session_start();
?>

<div class="modal-container" id="language" style="display: none;padding: 10% 30% 10% 30%;"> 
    <div class="modal-content" style="height: 220px;">     
        <button class="modal-close-x" onclick="CloseLanguage()" type="button">×</button>
        <form class="alt-form" id="payment-form" method="" action="">
            <div>
                <h4 style="font-weight: 900;font-size: 1.4rem;">Local preferences</h4>
                <div class="field-group clear" id="shipping_details">
                    <div class="mt-15" id="shipping_address_fields">
                        <div class="field text " style="display: inline-block;width: 100%;">
                            <form>
                                <div class="form-group">
                                    <div id="options" style="font-family: 'Gotham-Light;'" data-input-name="country2" data-selected-country="GB"></div>
                                </div>
                            </form>
                            <!--<select id="codeL">
                                <option value="af" > Afrikaans</option>
                                <option value="1" data-fas="star">Option 1</option>
                                <option value="de">&#x1f1e9;&#x1f1ea; Deutsch</option>
                                <option value="ar">&#x1f1e6;&#x1f1ea; Arabic </option>
                                <option value="zh-CN">&#x1f1e8;&#x1f1f3; Chinese (Simplified)</option>
                                <option value="zh-TW">&#x1f1e8;&#x1f1f3; Chinese (Traditional)</option>
                                <option value="ko">&#x1f1f0;&#x1f1f7; Korean </option>
                                <option value="es">&#x1f1ea;&#x1f1f8; Spanish</option>
                                <option value="FR">&#x1f1f2;&#x1f1eb; French </option>
                                <option value="en">&#x1f1fa;&#x1f1f2; English </option>
                                <option value="it">&#x1f1ee;&#x1f1f9; Italian </option>
                                <option value="ja">&#x1f1ef;&#x1f1f5; Japanese </option>
                                <option value="ne">&#x1f1f3;&#x1f1f5; Nepali</option>
                                <option value="pl">&#x1f1f5;&#x1f1f1; Polish </option>
                                <option value="pt">&#x1f1f5;&#x1f1f9; Portuguese</option>
                                <option value="ru">&#x1f1f7;&#x1f1fa; Russian</option>
                                <option value="th">&#x1f1f9;&#x1f1ed; Thai</option>
                                <option value="vi">&#x1f1fb;&#x1f1f3; Vietnamese</option>
                            </select>-->
                            <!--<select class="" id="codeL">
                                <option value="">Select Language</option>
                                <option value="af">Afrikaans</option>
                                <option value="sq">Albanian</option>
                                <option value="ar">Arabic</option>
                                <option value="hy">Armenian</option>
                                <option value="az">Azerbaijani</option>
                                <option value="eu">Basque</option>
                                <option value="be">Belarusian</option>
                                <option value="bn">Bengali</option>
                                <option value="bg">Bulgarian</option>
                                <option value="ca">Catalan</option>
                                <option value="zh-CN">Chinese (Simplified)</option>
                                <option value="zh-TW">Chinese (Traditional)</option>
                                <option value="hr">Croatian</option>
                                <option value="cs">Czech</option>
                                <option value="da">Danish</option>
                                <option value="nl">Dutch</option>
                                <option value="eo">Esperanto</option>
                                <option value="et">Estonian</option>
                                <option value="tl">Filipino</option>
                                <option value="fi">Finnish</option>
                                <option value="fr">French</option>
                                <option value="gl">Galician</option>
                                <option value="ka">Georgian</option>
                                <option value="de">German</option>
                                <option value="el">Greek</option>
                                <option value="gu">Gujarati</option>
                                <option value="ht">Haitian Creole</option>
                                <option value="iw">Hebrew</option>
                                <option value="hi">Hindi</option>
                                <option value="hu">Hungarian</option>
                                <option value="is">Icelandic</option>
                                <option value="id">Indonesian</option>
                                <option value="ga">Irish</option>
                                <option value="it">Italian</option>
                                <option value="ja">Japanese</option>
                                <option value="kn">Kannada</option>
                                <option value="ko">Korean</option>
                                <option value="la">Latin</option>
                                <option value="lv">Latvian</option>
                                <option value="lt">Lithuanian</option>
                                <option value="mk">Macedonian</option>
                                <option value="ms">Malay</option>
                                <option value="mt">Maltese</option>
                                <option value="no">Norwegian</option>
                                <option value="fa">Persian</option>
                                <option value="pl">Polish</option>
                                <option value="pt">Portuguese</option>
                                <option value="ro">Romanian</option>
                                <option value="ru">Russian</option>
                                <option value="sr">Serbian</option>
                                <option value="sk">Slovak</option>
                                <option value="sl">Slovenian</option>
                                <option value="es">Spanish</option>
                                <option value="sw">Swahili</option>
                                <option value="sv">Swedish</option>
                                <option value="ta">Tamil</option>
                                <option value="te">Telugu</option>
                                <option value="th">Thai</option>
                                <option value="tr">Turkish</option>
                                <option value="uk">Ukrainian</option>
                                <option value="ur">Urdu</option>
                                <option value="vi">Vietnamese</option>
                                <option value="cy">Welsh</option>
                                <option value="yi">Yiddish</option>
                            </select>
                            <select class="" id="codeL">
                                <option value="af">Afrikáans</option>
                                <option value="sq">Albanés</option>
                                <option value="de">Alemán</option>
                                <option value="am">Amárico</option>
                                <option value="ar">Árabe</option>
                                <option value="hy">Armenio</option>
                                <option value="az">Azerí</option>
                                <option value="bn">Bengalí</option>
                                <option value="be">Bielorruso</option>
                                <option value="my">Birmano</option>
                                <option value="bs">Bosnio</option>
                                <option value="bg">Búlgaro</option>
                                <option value="km">Camboyano</option>
                                <option value="kn">Canarés</option>
                                <option value="ca">Catalán</option>
                                <option value="ceb">Cebuano</option>
                                <option value="cs">Checo</option>
                                <option value="ny">Chichewa</option>
                                <option value="zh-CN">Chino (Simplificado)</option>
                                <option value="zh-TW">Chino (Tradicional)</option>
                                <option value="si">Cingalés</option>
                                <option value="ko">Coreano</option>
                                <option value="co">Corso</option>
                                <option value="ht">Criollo haitiano</option>
                                <option value="hr">Croata</option>
                                <option value="da">Danés</option>
                                <option value="sk">Eslovaco</option>
                                <option value="sl">Esloveno</option>
                                <option value="es">Español</option>
                                <option value="eo">Esperanto</option>
                                <option value="et">Estonio</option>
                                <option value="fi">Finlandés</option>
                                <option value="fr">Francés</option>
                                <option value="fy">Frisón</option>
                                <option value="gd">Gaélico escocés</option>
                                <option value="cy">Galés</option>
                                <option value="gl">Gallego</option>
                                <option value="ka">Georgiano</option>
                                <option value="el">Griego</option>
                                <option value="gu">Gujarati</option>
                                <option value="ha">Hausa</option>
                                <option value="haw">Hawaiano</option>
                                <option value="iw">Hebreo</option>
                                <option value="hi">Hindi</option>
                                <option value="hmn">Hmong</option>
                                <option value="nl">Holandés</option>
                                <option value="hu">Húngaro</option>
                                <option value="ig">Igbo</option>
                                <option value="id">Indonesio</option>
                                <option value="en">Inglés</option>
                                <option value="ga">Irlandés</option>
                                <option value="is">Islandés</option>
                                <option value="it">Italiano</option>
                                <option value="ja">Japonés</option>
                                <option value="jw">Javanés</option>
                                <option value="kk">Kazajo</option>
                                <option value="rw">Kiñaruanda</option>
                                <option value="ky">Kirguís</option>
                                <option value="ku">Kurdo</option>
                                <option value="lo">Lao</option>
                                <option value="la">Latín</option>
                                <option value="lv">Letón</option>
                                <option value="lt">Lituano</option>
                                <option value="lb">Luxemburgués</option>
                                <option value="mk">Macedonio</option>
                                <option value="ml">Malayalam</option>
                                <option value="ms">Malayo</option>
                                <option value="mg">Malgache</option>
                                <option value="mt">Maltés</option>
                                <option value="mi">Maorí</option>
                                <option value="mr">Maratí</option>
                                <option value="mn">Mongol</option>
                                <option value="ne">Nepalí</option>
                                <option value="no">Noruego</option>
                                <option value="or">Odia (Oriya)</option>
                                <option value="pa">Panyabí</option>
                                <option value="ps">Pastún</option>
                                <option value="fa">Persa</option>
                                <option value="pl">Polaco</option>
                                <option value="pt">Portugués</option>
                                <option value="ro">Rumano</option>
                                <option value="ru">Ruso</option>
                                <option value="sm">Samoano</option>
                                <option value="sr">Serbio</option>
                                <option value="st">Sesotho</option>
                                <option value="sn">Shona</option>
                                <option value="sd">Sindhi</option>
                                <option value="so">Somalí</option>
                                <option value="sw">Suajili</option>
                                <option value="sv">Sueco</option>
                                <option value="su">Sundanés</option>
                                <option value="tl">Tagalo</option>
                                <option value="th">Tailandés</option>
                                <option value="ta">Tamil</option>
                                <option value="tt">Tártaro</option>
                                <option value="tg">Tayiko</option>
                                <option value="te">Telugu</option>
                                <option value="tr">Turco</option>
                                <option value="tk">Turcomano</option>
                                <option value="uk">Ucraniano</option>
                                <option value="ug">Uigur</option>
                                <option value="ur">Urdu</option>
                                <option value="uz">Uzbeco</option>
                                <option value="eu">Vasco</option>
                                <option value="vi">Vietnamita</option>
                                <option value="xh">Xhosa</option>
                                <option value="yi">Yidis</option>
                                <option value="yo">Yoruba</option>
                                <option value="zu">Zulú</option>
                            </select>
                            -->
<!--
                            <div class="field select half right">
                                <div id="google_translate_element"></div>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                <script type="text/javascript">
                                function googleTranslateElementInit() {
                                new google.translate.TranslateElement({
                                    pageLanguage: 'en',
                                    }, 'google_translate_element');
                                }
                                </script>
                            </div>-->
                        </div>
                        
                        <div class="buttons-2 buttons" style="text-align: center;">
                            <button class="button tiny pr-4 secondary" onclick="updateL()"  type="button">Update</button>
                            <button class="button tiny pr-4 primary" onclick="CloseLanguage()" type="button">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>