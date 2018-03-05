<div class="content">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Room</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Number</th>
            </tr>
        </thead>
    </table>
    <div id="piechart"></div>
    <div id="columnchart"></div>
    <div class="button button-print">Print</div>
</div>
<script>
var get_all_data_url = "<?php echo base_url("home/get_all_data"); ?>";
var get_selected_room_count_url = "<?php echo base_url("home/get_selected_room_count"); ?>";
var get_gender_count_url = "<?php echo base_url("home/get_gender_count"); ?>";
</script>