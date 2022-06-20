<?php
$file = array_map('str_getcsv', file('test.csv'));
$curposition = $_GET["race"];
$towns = [];
foreach ($file as $key=>$value){
  $towns[] = array($value[0],$value[1],explode(",",$value[2]),$value[3]);
}
sort($towns);
foreach ($towns as $town){
  if(in_array($curposition,$town[2]) == true){
    
    $sourcelink = $town[3];
  }

}

$csv = array_map('str_getcsv', file('candidates.csv'));
foreach ($csv as $key=>$value){
  $candidates[] = array($value[3],$value[1],$value[2],$value[0],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10],$value[11]);
}
sort($candidates);
$positions = [];
$position = [];
$positfile = array_map('str_getcsv', file('positions.csv'));
foreach ($positfile as $key=>$value){
  $positions[] = array($value[0],$value[1],$value[2],$value[3],$value[4]);
};
foreach ($positions as $posit){
  if ($posit[0] == $curposition){
    $position[] = $posit[1];
    $position[] = $posit[2];
    $position[] = $posit[3];
  }
};
echo'<head><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8849894797310514"
     crossorigin="anonymous"></script>
<link rel="icon" type="image/x-icon" href="/favicon.jpg">
<meta property="og:url"                content="liamnichols.ca" />
<meta property="og:title"              content="Durham Region Candidates Guide" />
<meta property="og:description"        content="A comprehensive list of candidates running for municipal office across Durham Region" />
<meta property="og:image"              content="https://www.liamnichols.ca/website/socialimages/'.$curposition.'.png" />
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
</script><title>
Candidates for '.$position[1].' | Municipality of '.$position[0].' - Durham Region Candidates Guide</title>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@whitbynerd">
<meta name="twitter:title" content="Durham Region Candidates Guide">
<meta name="twitter:description" content="A comprehensive list of candidates running for municipal office across Durham Region.">
<meta name="twitter:image" content="https://www.liamnichols.ca/website/socialimages/'.$curposition.'.png">
</head>
<body>
<div class="jumbotron" style="background-color:midnightblue;color:white;">
<div class="container-fluid">
<div class = "row">
<div class = "col-sm-1"></div>
<div class = "col-sm-10">
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
<div class = "col-sm-10">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://www.liamnichols.ca">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Candidates for '.$position[1].' | Municipality of '.$position[0].'</li>
  </ol>
</nav>
</div>
<div class = "col-sm-1"></div>
</div>
<div class="row">
<div class = "col-sm-1"></div>
<div class="col-sm-10">

<h1>Candidates for '.$position[1].'<br>
<small class="text-muted">Municipality of '.$position[0].'</small>
</h1><span class ="badge">'.$position[2].' to be elected</span><br><br><a href="'.$sourcelink.'"target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-info" >Source Information</button></a><p><hr>
<div class="panel panel-default"><div class="panel-body" style ="overflow-x:auto;">
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
        if($line1[2] == $curposition){
          echo '
          <tr>        
            <td>';
          if($line1[5] == 1){
            echo '<span class="badge"style="background-color:green" data-toggle="tooltip"" title="This person currently holds this office.">Incumbent</span>&nbsp;';
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
  </table></div>

</div>
</div>
<br><br><br><br>

';
echo "<script src='https://storage.ko-fi.com/cdn/scripts/overlay-widget.js'></script>
<script>
  kofiWidgetOverlay.draw('liamnicholsca', {
    'type': 'floating-chat',
    'floating-chat.donateButton.text': 'Donate',
    'floating-chat.donateButton.background-color': '#d9534f',
    'floating-chat.donateButton.text-color': '#fff'
  });
</script>";
?>