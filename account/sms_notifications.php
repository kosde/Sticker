<?php 
session_start();
?>
<div class="modal-container" id="Phone_number" style="display: none;padding: 50px 30% 35% 30%;"> 
    <div class="modal-content" style="display: inline-table;height: 100%;">
        <h2 style="text-align: center;padding-bottom: 20px;">Add your phone number</h2>
        <label for="message" class="labelfiel font-light" style="text-align: center;width: 100%;display: block;padding-bottom: 20px;">Would you like to receive text message notifications?</label>
        <form action="../account/save_phone_number.php?email=<?php echo $emailg; ?>" method="get">
            <div class="field text ">
                <div aria-live="assertive" class="inputWrapper inputcheckout" role="alert">
                    <input id="phone" name="phone" type="tel" style="width: 100%;border: 1px solid #c8c8c8;height: 50px;">
                    <input id="code" name="code" type="number" style="visibility: hidden;display: none;">
                    <input id="email" name="email" type="text" style="visibility: hidden;display: none;" value="<?php echo $emailg;?>">
                </div>
            </div>
            <div class="subscribe">
                <span style="display: inline-block;">
                    <div class="font-light  tooltipWrapper" style="display: inline-block;">
                        <input type="checkbox" class="input checkbox" id="subscribeToDeals" name="subscribeToDeals" checked="">
                    </div>
                    <label for="subscribeToDeals" class="">Check box to get order notification via text message<span aria-label="Sparkle emoji" role="img">✨</span></label>
                    <!--<label for="subscribeToDeals" class="">Subscribe to get kick ass deals notifications<span aria-label="Sparkle emoji" role="img">✨</span></label>-->
                </span>
                <p class="regular font-light" style="color:#909090;font-size: 11px;">
                    By subscribing, you agree to receive deal notifications to the phone number you provide. 
                    Msg &amp; data rates may apply. Msg frequency varies. Reply 
                    <strong >HELP</strong> for help or 
                    <strong >STOP</strong> to opt out. Not required to buy. See 
                    <a  href="/legal/privacy.php" style="font-size: 11px;">terms</a> and 
                    <a  href="/legal/terms.php" style="font-size: 11px;">privacy</a>.
                </p>
            </div>
            <div class="buttons-2 buttons" style="text-align: center;">
                <button class="button secondary large" style="width: 130px;" type="submit">Save</button>
            </div>
        </form>
        <button class="modal-close-x" onclick="ClosePhone_number()" type="button">×</button>
    </div>
</div>