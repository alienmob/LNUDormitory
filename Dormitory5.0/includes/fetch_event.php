<?php
 include('conn.php');
 session_start();

 $sql = "SELECT `event`.id, `event`.location, `event`.date, `event`.description, `event_category`.id, `event_category`.event_name, `event`.event_category_id, event.time_start, event.time_end, event.status FROM `event` INNER JOIN `event_category` ON `event`.event_category_id = `event_category`.id";
 $query = $conn->query($sql);
 $event = array();
 while($eventrow = $query->fetch_assoc()){

    //  date('M d, Y', strtotime($eventrow['date']));
    //  date('h:ia', strtotime($eventrow['time_start']));
    //  date('h:ia', strtotime($eventrow['time_end']));

  array_push($event, ['id' => $eventrow['id'], 'title' => $eventrow['event_name'], 'start' => $eventrow['date'], 'full_info' => $eventrow]);
 }

 echo json_encode($event);
 ?>