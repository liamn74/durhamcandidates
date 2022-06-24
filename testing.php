<?php
$csv = array_map('str_getcsv', file('website/existingcandidates.csv'));
$positfile = array_map('str_getcsv', file('website/positions.csv'));

foreach ($positfile as $posit){
  $positions[] = array($posit[2],$posit[3],$posit[0]);
}
sort($positions);


foreach ($csv as $candi){
  $candidates[] = array($candi[3],$candi[4],$candi[0],$candi[2]);
}
sort($candidates);
foreach ($positions as $posit){
  echo "<b>".$posit[0]."</b><br>";
  foreach ($candidates as $cnd){
    if ($cnd[3]==$posit[2]){
      echo $cnd[0]."<br>";
    }
  }
} 
?>