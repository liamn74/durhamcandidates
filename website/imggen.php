<?php
$positions = [];
$position = [];
$positfile = array_map('str_getcsv', file('positions.csv'));
foreach ($positfile as $key=>$value){
  $positions[] = array($value[0],$value[1],$value[2],$value[3],$value[4]);
};
foreach ($positions as $posit){
  if ($posit[0] == $_GET["name"]){
    $position[] = $posit[1];
    $position[] = $posit[2];
  }
};
echo'<head>
<link rel="icon" type="image/x-icon" href="website/favicon.jpg">
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
<meta name="twitter:image" content="https://www.liamnichols.ca/website/social.jpg">
</head>
<body>
<div class="container-fluid"style="background-color:midnightblue;color:white;height:100vh;">
<div class = "row" style="height:23vh"></div>
<div class = "row">
<div class = "col-sm-1"></div>
<div class = "col-sm-8">
<h1 style="font-size:10em">'.$position[1].'</h1>
<h2 style="font-size:4em;color:#D3D3D3">Municipality of '.$position[0].'</h2>
</div>
<div class = "col-sm-1"></div>
</div>
</div>
</div>';
?>