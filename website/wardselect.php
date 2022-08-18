<?php
$file = array_map('str_getcsv', file('test.csv'));
foreach ($file as $cities){
  if($_GET["city"] == $cities[0]){
    $wards = explode(",",$cities[4]);
      }
  }

echo'<head><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8849894797310514"
     crossorigin="anonymous"></script>
<link rel="icon" type="image/x-icon" href="/favicon.jpg">
<meta property="og:url"                content="liamnichols.ca" />
<meta property="og:title"              content="Durham Region Candidates Guide | Preview your Ballot" />
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
Preview your Ballot</title>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@whitbynerd">
<meta name="twitter:title" content="Durham Region Candidates Guide | Preview your Ballot">
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
<div class="container-fluid">
<div class = "col-sm-1"></div>
<div class = "col-sm-10">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://www.liamnichols.ca">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">'."Preview your Ballot".'</li>
  </ol>
</nav>
<form action="builtballot.php" method="GET" role="form" class="form-horizontal">
  <div class="form-group">
    <label for="ward" name = "ward">Select your Ward</label>
    <select class="form-control" id="ward" name = "ward">
    ';
      foreach($wards as $ward){
      echo "<option>".$ward."</option>";
    }
echo '
    </select>
<label for="ward" name = "ward">Select your School Affiliation</label>
    <select class="form-control" id="school" name = "school">
    <option>English Public</option>
    <option>English Catholic</option>
    <option>French Public</option>
    <option>French Catholic</option>
    </select>
    <input type="hidden" id="city" name="city" value='.$_GET["city"].'>
<br>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

</div>
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