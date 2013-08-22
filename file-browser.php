<ul id="files">
  <li class="header">
    <span class="li-name"><b>Name</b></span>
    <span class="li-size"><b>Size</b></span>
    <span class="li-date"><b>Date Modified</b></span>
  </li>
  <?PHP
  # The current directory
  $directory = dir("./");

  # If you want to turn on Extension Filter, then uncomment this:
  ### $allowed_ext = array(".sample", ".png", ".jpg", ".jpeg", ".txt", ".doc", ".xls"); 

  $do_link = TRUE; 
  $sort_what = 0; //0- by name; 1 - by size; 2 - by date
  $sort_how = 0; //0 - ASCENDING; 1 - DESCENDING

  // LIST DIR
  function dir_list($dir){ 
      $i=0; 
      $dl = array(); 
      if ($hd = opendir($dir))    { 
          while ($sz = readdir($hd)) {  
              if (preg_match("/^\./",$sz)==0) $dl[] = $sz;$i.=1;  
          } 
      closedir($hd); 
      } 
      asort($dl); 
      return $dl; 
  } 
  if ($sort_how == 0) { 
      function compare0($x, $y) {  
          if ( $x[0] == $y[0] ) return 0;  
          else if ( $x[0] < $y[0] ) return -1;  
          else return 1;  
      }  
      function compare1($x, $y) {  
          if ( $x[1] == $y[1] ) return 0;  
          else if ( $x[1] < $y[1] ) return -1;  
          else return 1;  
      }  
      function compare2($x, $y) {  
          if ( $x[2] == $y[2] ) return 0;  
          else if ( $x[2] < $y[2] ) return -1;  
          else return 1;  
      }  
  }else{ 
      function compare0($x, $y) {  
          if ( $x[0] == $y[0] ) return 0;  
          else if ( $x[0] < $y[0] ) return 1;  
          else return -1;  
      }  
      function compare1($x, $y) {  
          if ( $x[1] == $y[1] ) return 0;  
          else if ( $x[1] < $y[1] ) return 1;  
          else return -1;  
      }  
      function compare2($x, $y) {  
          if ( $x[2] == $y[2] ) return 0;  
          else if ( $x[2] < $y[2] ) return 1;  
          else return -1;  
      }  

  } 

  /* GET INFO
  ================================================== */
  $i = 0; 
  while($file=$directory->read()) { 
      $file = strtolower($file);
      $ext = strrchr($file, '.');
      if (isset($allowed_ext) && (!in_array($ext,$allowed_ext)))
          {
              // dump 
          }
      else { 
          $temp_info = stat($file); 
          $new_array[$i][0] = $file; 
          $new_array[$i][1] = $temp_info[7]; 
          $new_array[$i][2] = $temp_info[9]; 
          $new_array[$i][3] = date("F d, Y", $new_array[$i][2]); 
          $i = $i + 1; 
          } 
  } 
  $directory->close(); 

  /* SORT
  ================================================== */
  switch ($sort_what) { 
      case 0: 
              usort($new_array, "compare0"); 
      break; 
      case 1: 
              usort($new_array, "compare1"); 
      break; 
      case 2: 
              usort($new_array, "compare2"); 
      break; 
  } 

  /* DISPLAY
  ================================================== */

  $i2 = count($new_array); 
  $i = 0; 
  for ($i=0;$i<$i2;$i++) {
      if (!$do_link) { 
          $line = "<li>" . $new_array[$i][0] . "" . number_format(($new_array[$i][1]/1024)) . "k" . $new_array[$i][3] . "</li>"; 
      }else{ 
          $line  = '<li>';
          $line .= '<span class="li-name"><a href="' . $new_array[$i][0] . '">' . $new_array[$i][0] . "</a></span>"; 
          $line .= '<span class="li-size"> ' . number_format(($new_array[$i][1]/1024)) . 'k </span>';
          $line .= '<span class="li-date"> ' . $new_array[$i][3] . "</span></li>";
      } 
      echo $line; 
  } 

  ?>
</ul>