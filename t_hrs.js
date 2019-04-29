<script >

/* set check box value to no_lunch if not checked on page load*/
$(document).ready(function() {
    $("input#<?php echo "n_lunch".$row['id']; ?>").val('yes');
});


/* calculation of time between start and finish. Also check for lunch time*/
$(function ()
{
    function calculate() 
    {
        $('input#<?php echo "n_lunch_".$row['id']; ?>').prop('checked', false);
     
        var time1 = 0,time2 = 0;
        var time1 = $("input#<?php echo "s_time_".$row['id']; ?>").val().split(':'), 
        
        time2 = $("input#<?php echo "f_time_".$row['id']; ?>").val().split(':');
     
        var hours1 = parseInt(time1[0], 10), 
            hours2 = parseInt(time2[0], 10),
            mins1 = parseInt(time1[1], 10),
            mins2 = parseInt(time2[1], 10);
     
        var p_hrs = $("label#<?php echo "t_hrs_".$row['id']; ?>").val();
        var hours = hours2 - hours1, 
        mins = 0;
        
        // Get hours
        
        if(hours < 0) hours = 24 + hours;

        // get minutes
        
        if(mins2 >= mins1) {
             mins = mins2 - mins1;
        }
        else {
             mins = (mins2 + 60) - mins1;
             hours--;
        }

        // convert to fraction of 60
        
        mins = mins / 60; 
        hours += mins;
        hours = hours - 0.5;
     
        // set value of ids to calculated values
        
        $("label#<?php echo "t_hrs_".$row['id']; ?>").text(hours);
        $("input#<?php echo "t_hrs_".$row['id']; ?>").val(hours);
        

        //if checked then time addition or deduction if not checked


        document.getElementById('<?php echo "n_lunch_".$row['id']; ?>').onclick = function() {
        if ( this.checked ) {
            hours_c = hours + 0.5;
            $("label#<?php echo "t_hrs_".$row['id']; ?>").text(hours_c);
            $("input#<?php echo "t_hrs_".$row['id']; ?>").val(hours_c);
            $("input#<?php echo "n_lunch".$row['id']; ?>").val('no');//'<?php echo $row['s_no']; ?>');
            } else {
            hours_uc = hours;
            $("label#<?php echo "t_hrs_".$row['id']; ?>").text(hours_uc);
            $("input#<?php echo "t_hrs_".$row['id']; ?>").val(hours_c);
            $("input#<?php echo "n_lunch".$row['id']; ?>").val('yes');
            }
        }
    }
     
    // call to calculate function on value change of start time and finish time

    $("input#<?php echo "s_time_".$row['id']; ?>,input#<?php echo "f_time_".$row['id']; ?>").change(calculate);
    calculate();
     
});

</script>