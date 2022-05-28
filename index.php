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
foreach ($file as $key=>$value){
  $towns[] = array($value[0],$value[1],explode(",",$value[2]),$value[3]);
}
sort($towns);
foreach ($csv as $key=>$value){
  $candidates[] = array($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10]);
}
sort($candidates);
foreach ($positfile as $key=>$value){
  $positions[] = array($value[0],$value[1],$value[2],$value[3],$value[4]);
}
sort($positions);
$count = 0;
echo'
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
<meta name="twitter:image" content="social.jpeg">
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
<div class="col-sm-10">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Home</a></li>';
foreach ($towns as $town){
  echo '<li><a data-toggle="tab" href="#'.$town[0].'">'.$town[0].' ';
  foreach($candidates as $candidate){
    if($candidate[0] == $town[0]){
        $count++;
        $sum++;
      }
    }
  echo '<span class="badge">'.$count.'</span></a></li>';
  $count = 0;
}
echo '</ul>
<div class="tab-content">
<div id="home" class="tab-pane fade in active">
<h1>Welcome!</h1>
<p>Thank you for visiting. This website is designed to collect all of the candidates running for office across Durham Region and collate them into one convenient spot.
<hr>';
  echo '
<div class="row">
<div class ="col-md-6">
  <div class="panel panel-default">
  <div class="panel-heading"><h4>Latest Update:</h4></div>';
  $date = new DateTime($git3[0]["commit"]["committer"]["date"], new DateTimeZone('UTC'));
  $date->setTimezone(new DateTimeZone('America/New_York'));
  echo '
  <div class="panel-body">'.date_format($date,'F d, Y h:i a T').'<br><b><i>Notes:</b> '.$git3[0]['commit']['message'].'</i></div>
</div>
</div>
<div class="col-md-6"><div class="panel panel-default">
  <div class="panel-heading"><h4>Total Candidates Running:</h4></div><div class="panel-body"><h4>'.$sum.'</h4></div></div></div></div>';
echo"</div>";
foreach ($towns as $town){
  echo'
    <div id="'.$town[0].'" class="tab-pane fade">
      <h2>'.$town[0].'</h2><a href="'.$town[3].'"target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-info" >Source Information</button></a><p>';

  foreach($positions as $position){
    if($position[1] == $town[0]){
    echo'
    <div class="panel panel-default">
      <div class="panel-heading"><h3>'.$position[2].' <span class ="badge">'.$position[3].' to be elected.</span></h3>
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
        if($line1[0] == $town[0] && $line1[1] == $position[0]){
          echo '
          <tr>        
            <td>';
          if($line1[4] == 1){
            echo '<span class="badge"style="background-color:green" data-toggle="tooltip"" title="This person currently holds this office.">Incumbent</span>&nbsp;';
          }
          echo
          $line1[3]." ".$line1[2].'
          <td>
          <a href ="mailto:'.$line1[6].'">'.$line1[6].'</a>
          </td>
          <td>
          '.$line1[5].'
          </td>'.'
          <td>
          <a href="'.$line1[7].'" target="_blank" rel="noopener noreferrer"">'.$line1[7].'</a>
          </td>';
  }
      echo "</tr>";
}
    echo "</td>";
    echo'
   </tbody>
  </table>
  </div>

  </div>
';
  }
  }
      echo '</div>';
}
echo '</div></div></div></div>
</body>
';
  ?>