<?
  $ch = curl_init('https://api.github.com/repos/liamn74/durhamcandidates/commits');
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Accept: application/vnd.github.v3+json',
    'Authorization: token '.getenv('tok').'',
    'User-Agent: liamn74'
  ]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $json = curl_exec($ch);
  curl_close($ch);
  $gitreturn = json_decode($json, true);
  foreach($gitreturn as $git){
    $git1[] = $git;
  } 
foreach($git1 as $git2){
  $git3[] = $git2;
}
$sum=0;
$file = array_map('str_getcsv', file('test.csv'));
$csv = array_map('str_getcsv', file('candidates.csv'));
$positfile = array_map('str_getcsv', file('positions.csv'));
$towns = array();
$candiates = array();
$positions = array();
$hoc = 0;
$rc = 0;
$lc = 0;
$tru = 0;
$spots = 0;
$nominations = [];
$nocans = 0;
$positioncount = array();
$posittracker = array();
$acclamations = 0;
foreach ($csv as $key=>$value){
  if($value[5] <> 2 ){
  $positioncount[] = array($value[2]);
  }
}
foreach($positioncount as $positcount){
  foreach($positcount as $pc){
    if($pc <> "Position"){
      $positiontracker[] = $pc;
    }
  }
}
$positcounter = array_count_values($positiontracker);
foreach($positcounter as $key=>$value){
  foreach($positfile as $pf){
    if($pf[0] == $key){
      if($pf[3] >= $value){
        $acclamations = $acclamations + $value;
      }
    }
  }
}
foreach ($file as $key=>$value){
  $towns[] = array($value[0],$value[1],explode(",",$value[2]),$value[3]);
}
sort($towns);
foreach ($csv as $key=>$value){
  if($value[5] <> 2 ){
  $candidates[] = array($value[3],$value[1],$value[2],$value[0],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9], $value[10],$value[11]);
  }
}
sort($candidates);
foreach ($positfile as $key=>$value){
  $positions[] = array($value[0],$value[1],$value[2],$value[3],$value[4]);
}
foreach ($positions as $position){
  $spots = $spots + $position[3];
}
foreach ($candidates as $candidate){
  $nominations[] = $candidate[2];
}
foreach ($positions as $position){
  if(in_array($position[0],$nominations) == false){
    $nocans = $nocans + 1;
  }
}

echo'<head><script src="https://kit.fontawesome.com/ccc537e79c.js" crossorigin="anonymous"></script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8849894797310514"
     crossorigin="anonymous"></script>
<link rel="icon" type="image/x-icon" href="favicon.jpg">
<meta property="og:url"                content="liamnichols.ca" />
<meta property="og:title"              content="Durham Region Candidates Guide" />
<meta property="og:description"        content="A comprehensive list of candidates running for municipal office across Durham Region" />
<meta property="og:image"              content="https://www.liamnichols.ca/social.jpg" />
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-HF8EHH9CXQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "G-HF8EHH9CXQ");
</script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';

echo '
<script>
$(document).ready(function(){
  $("[data-toggle='."tooltip".']").tooltip();   
});
</script>
<title>Durham Region Candidates Guide</title>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@whitbynerd">
<meta name="twitter:title" content="Durham Region Candidates Guide">
<meta name="twitter:description" content="A comprehensive list of candidates running for municipal office across Durham Region.">
<meta name="twitter:image" content="https://www.liamnichols.ca/social.jpg">
</head>
<body>
<div class="jumbotron" style="background-color:midnightblue;color:white;">
<div class="container-fluid">
<div class = "row">
<div class = "col-sm-1"></div>
<div class = "col-sm-8">
<h1>Durham Region Candidates Guide</h1>
A comprehensive list of candidates running for municipal office across Durham Region.
</div>
<div class = "col-sm-1"></div>
</div>
</div>
</div>
<div class="container-fluid" >
<div class="row">
<div class = "col-sm-1"></div>
<div class="col-sm-10">';

echo '    <div class="panel panel-default">
      <div class="panel-heading">On Track to be Acclaimed.
      </div>
      <div class="panel-body" style ="overflow-x:auto;">
<table class="table table-hover" style="white-space: nowrap;">
    <thead>
      <tr>
        <th style="width:20%">Name</th>
        <th style="width:20%">Email</th>
        <th style="width:20%">Phone</th>
        <th style="width:20%">Website</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($candidates as $line1){
        if($line1[1] == $town[0] && $line1[2] == $position[0]){
          echo '
          <tr>        
            <td>';
          if($line1[5] == 1){
            echo '<span class="badge"style="background-color:green" data-toggle="tooltip"" title="This person currently holds this office.">Incumbent</span>&nbsp;';
          }
          elseif($line1[5] == 3){
            echo '<span class="badge"style="background-color:silver; color:black" data-toggle="tooltip"" title="This person has won election without challenge.">Acclaimed</span>&nbsp;';
          }
          elseif($line1[5] == 4){
            echo '<span class="badge"style="background-color:gold; color:black" data-toggle="tooltip"" title="This person has won election.">Elected</span>&nbsp;';
          }
          echo
          $line1[4]." ".$line1[0].'
          <td>
          <a href ="mailto:'.$line1[7].'">'.$line1[7].'</a>
          </td>
          <td>
          '.$line1[6].'
          </td>'.'
          <td>
          <a href="'.$line1[8].'" target="_blank" rel="noopener noreferrer"">'.$line1[8].'</a>
          </td>';
  }
      
}
      echo "</tr>";
    echo "</td>";
    echo'
   </tbody>
  </table>
  </div>

  </div>';

echo '</div></div></div></div><br><br><br><br>';
echo "<script src='https://storage.ko-fi.com/cdn/scripts/overlay-widget.js'></script>
<script>
  kofiWidgetOverlay.draw('liamnicholsca', {
    'type': 'floating-chat',
    'floating-chat.donateButton.text': 'Donate',
    'floating-chat.donateButton.background-color': '#d9534f',
    'floating-chat.donateButton.text-color': '#fff'
  });
</script>";
echo '
</body>
';

  ?>