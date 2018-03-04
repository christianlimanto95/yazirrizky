<div class="content">
    <form>
        <div class="form-item">
            <div class="form-question">Your Gender</div>
            <div class="form-answer">
                <div class="gender form-radiobutton selected" data-value="m">
                    <div class="gender-image" style="background-image: url(<?php echo base_url("assets/images/male.jpg"); ?>);"></div>
                    <div class="gender-text">Male</div>
                </div>
                <div class="gender form-radiobutton" data-value="f">
                    <div class="gender-image" style="background-image: url(<?php echo base_url("assets/images/female.png"); ?>);"></div>
                    <div class="gender-text">Female</div>
                </div>
                <input type="hidden" class="gender-value" value="m" />
            </div>
        </div>
        <div class="form-item">
            <div class="form-question">Your Email</div>
            <div class="form-answer">
                <input type="email" class="form-input" maxlength="100" />
            </div>
        </div>
        <div class="form-item">
            <div class="form-question">Select Room Type</div>
            <div class="form-answer">
                <div class="select" data-value="1">
                    <div class="select-text">Deluxe Room</div>
                    <div class="select-icon" style="background-image: url(<?php echo base_url("assets/icons/ic_keyboard_arrow_down_black_24px.svg"); ?>);"></div>
                    <div class="options">
                        <div class="option" data-value="1">Deluxe Room</div>
                        <div class="option" data-value="2">Superior Room</div>
                        <div class="option" data-value="3">Executive Room</div>
                        <div class="option" data-value="4">Pacific Room</div>
                        <div class="option" data-value="5">Pacific Suite</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-item">
            <div class="form-question">Select Date Range</div>
            <div class="form-answer">
                <input type="text" class="form-input input-date-start" />
                <input type="text" class="form-input input-date-end" />
            </div>
        </div>
        <div class="form-item">
            <div class="form-question">Numbers Only</div>
            <div class="form-answer">
                <input type="text" class="form-input input-number" data-input-type="number" maxlength="5" />
            </div>
        </div>
        <div class="button">INSERT</div>
    </form>
</div>