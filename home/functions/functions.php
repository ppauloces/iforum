<?php 

function writeLog($string) {
  $log_file = 'log.txt'; 
  $string = strval($string);       

  if ($fh = @fopen($log_file, "a+")) {
    fputs($fh, $string, strlen($string));
    fclose($fh);
    return true;
  }
  else {
    return false;
  }
}


?>