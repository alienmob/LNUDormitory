<?php
 include('conn.php');
 $sql = "SELECT *, log_book.id AS studid FROM log_book LEFT JOIN students ON students.rfid = log_book.rfid_id ORDER BY id DESC";
 $query = $conn->query($sql);
 while ($row = $query->fetch_assoc()) {
  
  echo "
       <tr>
        <td class='hidden'></td>
        <td>".$row['student_id']."</td>
        <td>".$row['firstname']. ' ' .$row['lastname']."</td>
        <td>" . date('M d, Y', strtotime($row['date'])) . "</td>
        <td>" . $row['time_in'] . "</td>
        <td>" . $row['time_out'] . "</td>

       </tr>
      ";
 }
 ?>