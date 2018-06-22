


<?php 

// Example 

   date_default_timezone_set('Australia/Brisbane');


    
    
    
    
    
    //$dateStart = new DateTime('2018-04-30 12:40:00');
    //$dateEnd = new DateTime("now");
    //echo "start".date_format($dateStart, 'Y-m-d H:i:s')."<br>";
    //echo "End".date_format($dateEnd, 'Y-m-d H:i:s')."<br>";
    //$interval = $dateStart->diff($dateEnd);

    //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
    
    
    //echo $result;
    
    //$schedule=strtotime('2018-04-16 01:45:00');
    
    $date = new DateTime('2018-04-16 01:58:00');
    $result = $date->format('Y-m-d H:i:s');
    
    $schedule=strtotime($result);

    $now=strtotime("now Australia/Brisbane");
    //if the schedule is later than now
    if($now>$schedule)
    {
     echo "schedule has been done";
    }


    
    



        
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
?> 


