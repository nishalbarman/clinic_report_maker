<?php 

  $timeout=5;
  $path = $fname;
 
  $fp = fopen('dat.pdf', 'w');
  $ch = curl_init("https://google.com");
  //curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );//sometimes you may need this.
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
  curl_setopt( $ch, CURLOPT_ENCODING, "" );
  curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
  curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
  curl_setopt( $ch, CURLOPT_TIMEOUT, $timeout );
  curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );

  $response = curl_exec($ch);
  //echo print_r(curl_getinfo($ch),true);//just for checking
  if(!$response)$response=print_r(curl_getinfo($ch),true);
  curl_close($ch);
  fclose($fp);
//   return $response;//true or array with CURL INFO
}



?>