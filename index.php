<?php
$file = array_map('str_getcsv', file('test.csv'));
$csv = array_map('str_getcsv', file('candidates.csv'));
$towns = array();
$candiates = array();
foreach ($file as $key=>$value){
  $towns[] = array($value[0],$value[1],explode(",",$value[2]),$value[3]);
}
sort($towns);
foreach ($csv as $key=>$value){
  $candidates[] = array($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10]);
}
sort($candidates);
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
</div>
';
foreach ($towns as $town){
  echo'
    <div id="'.$town[0].'" class="tab-pane fade">
      <h2>'.$town[0].'</h2><a href="'.$town[3].'"target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-info" >Source Information</button></a><p>';

  foreach($town[2] as $position){
    echo'
    <div class="panel panel-default">
      <div class="panel-heading"><h3>'.$position.'</h3>
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
        if($line1[0] == $town[0] && $line1[1] == $position){
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
          <a href="'.$line1[7].' target="_blank" rel="noopener noreferrer"">'.$line1[7].'</a>
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
      echo '</div>';
}
echo '</div></div></div></div>
</body>
';
  ?>