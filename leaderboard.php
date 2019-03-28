<?php

ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
 require_once 'Dboperation.php';
 
 $db = new DbOperation(); 




 echo "<!DOCTYPE html>
<html>
<head>
<style>
#customers {
    font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;

}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:nth-child(odd){background-color: #ddd;}
#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #008ecc;
    color: white;
}
body{
  background-image:url('web/lead.jpg');
}
</style>
</head>
<body>
<div style='padding:10%;'>
<table id='customers'>
  <tr>
    <th>Name</th>
    <th>Year</th>
    <th>Cource</th>
    <th>Level</th>
  </tr>
  ";

  $row = $db->leaderboard();
  while($r = $row->fetch_assoc())
  {
    echo"<tr>
    <td>".$r['Name']."</td>
    <td>".$r['year']."</td>
    <td>".$r['course']."</td>
    <td>".$r['level']."</td>
    </tr>";
  }

  echo "
</table>
</div>
</body>
</html>";


?>