<div class="modal-container" id="measurement_system" style="display: none;padding: 50px 30% 35% 30%;"> 
    <div class="modal-content" style="display: inline-table;height: 100%;">
        <h2>Select your measurement system</h2>
        <form action="../account/save_measurement_system.php" method="get">
            <span class="  label" style="display: inline-block;width: 100%;padding: 20px 0px 20px 0px;">
                <?php
                if($_SESSION['measurement']==1)
                {
                   ?>
                    <input id="user_measurement_system_imperial" name="measurement" type="radio" value="imperial" style="display: inline;">
                   <?php
                }
                else{
                    ?>
                     <input checked="checked" id="user_measurement_system_imperial" name="measurement" type="radio" value="imperial" style="display: inline;">
                    <?php
                }
                ?>
                
                <label for="message" class="labelfiel font-light" style="display: inline;">Imperial (i.e. inches)</label>
            </span>
            <span class="  label" style="display: inline-block;width: 100%;padding: 20px 0px 20px 0px;">
                <?php
                if($_SESSION['measurement']==1)
                {
                   ?>
                   <input checked="checked" id="user_measurement_system_metric" name="measurement" type="radio" value="metric" style="display: inline;">
                   <?php
                }
                else{
                    ?>
                     <input id="user_measurement_system_metric" name="measurement" type="radio" value="metric" style="display: inline;">
                    <?php
                }
                ?>
                <label for="message" class="labelfiel font-light" style="display: inline;">Metric (i.e. millimeters)</label>
            </span> 
            
            <div class="buttons-2 buttons" style="text-align: center;">
                <button class="button secondary largeA" style="width: 410px;" type="submit">Update measurement system</button>
            </div>
        </form>
        <button class="modal-close-x" onclick="Close_measurement_system()" type="button">×</button>
    </div>
</div>