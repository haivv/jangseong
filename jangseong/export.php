<?php 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = Data.xls");

include_once 'config.php'; 

?>

<table border = 1>
  <tr>
    <td>#</td>
    <td>기수</td>
    <td>입소일</td>
    <td>군번</td>
    <td>이름</td>
  </tr>
  <?php
  $i = 1;
  $rows = mysqli_query($conn, "SELECT * FROM member");
  foreach($rows as $row) :
  ?>
  <tr>
    <td> <?php echo $i++; ?> </td>
    <td> <?php echo $row["num"]; ?> </td>
    <td> <?php echo $row["date"]; ?> </td>
    <td> <?php echo $row["memID"]; ?> </td>
    <td> <?php echo $row["name"]; ?> </td>
  </tr>
  <?php endforeach; ?>
</table>



