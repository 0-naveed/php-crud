
     <tr>
     <?php
      foreach($rows[0] as $key=>$val)
      {
		echo "<th style='text-transform:uppercase'>" . $key . "</th>";
	  }
     ?>
     <th style='text-transform:uppercase'>remove</th>
     <th style='text-transform:uppercase'>edit</th>
     </tr>
     <?php
      $i=1;
      foreach($rows as $keyx=>$valx)
      {
       $style = "background:#FFFFFF;color:#BA4C32";
       if(($i%2)==0)
       {
        $style = "background:#E6E0D3;";
       }
       echo "<tr name='rowids' id='rowid" . $keyx . "' style='" . $style . "'>";
       foreach($rows[$keyx] as $key=>$val)
       {
         echo "<td>" . $val . "</td>";
       }
       echo "<td><a class='ico del' href='index.php?action=delete&id=" . $rows[$keyx]['id'] . "' >Remove</a></td>"; 
       echo "<td><a class='ico edit' href='index.php?action=update&id=" . $rows[$keyx]['id'] . "' >Edit</a></td>"; 
       echo "</tr>";
       $i++;
      }
     ?>
    
