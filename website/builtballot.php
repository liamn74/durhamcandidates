<?php

$counter = 0;
$file = array_map('str_getcsv', file('test.csv'));
$csv = array_map('str_getcsv', file('candidates.csv'));
$positfile = array_map('str_getcsv', file('positions.csv'));
$city = $_GET["city"];
$gotward = $_GET["ward"];
$school = $_GET["school"];
if ($school == "English Public"){
  $schtype = "Public";
}
elseif($school == "English Catholic"){
  $schtype = "Catholic";
}
$towns = array();
$candiates = array();
$positions = array();
foreach ($file as $key=>$value){
  $towns[] = array($value[0],$value[1],explode(",",$value[2]),$value[3]);
}
sort($towns);
foreach ($csv as $key=>$value){
  if($value[5] <> 2){
  $candidates[] = array($value[3],$value[1],$value[2],$value[0],$value[4],$value[5],$value[6],$value[7],$value[8],$value[9],$value[10],$value[11]);
  }
}
sort($candidates);
foreach ($positfile as $key=>$value){
  $positions[] = array($value[0],$value[1],$value[2],$value[3],$value[4],explode(",",$value[5]),$value[6]);
}
sort($positions);
echo'<head><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro&display=swap" rel="stylesheet"><script src="https://kit.fontawesome.com/ccc537e79c.js" crossorigin="anonymous"></script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8849894797310514"
     crossorigin="anonymous"></script>
<link rel="icon" type="image/x-icon" href="website/favicon.jpg">
<meta property="og:url"                content="liamnichols.ca" />
<meta property="og:title"              content="'.$city." - ".$gotward." - ".$school ." School Board | Ballot Preview".'" />
<meta property="og:description"        content="Preview the ballot of a '.$city." ".$gotward." voter in the ".$school.' school system." />
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
<title>'.$city." - ".$gotward." - ".$school ." School Board | Ballot Preview".'</title>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@whitbynerd">
<meta name="twitter:title" content="'.$city." - ".$gotward." - ".$school ." School Board | Ballot Preview".'">
<meta name="twitter:description" content="Preview the ballot of a '.$city." ".$gotward." voter in the ".$school.' school system.">
<meta name="twitter:image" content="https://www.liamnichols.ca/social.jpg">
</head>';
echo "<body>
<div class='container-fluid'>
<div class='row'>
<div class = 'col-xl-12' style = 'background-color:yellow;text-align:center;'><h2>FOR INFORMATION ONLY</h2>This is not a real ballot. Please consult your local municipality for the most up to date information on who is running and how to vote.</div></div></div>
<div class='container-fluid'>
<div class='row'>
<div class ='col-sm-1'></div>
<div class = 'col-sm-3' style = 'text-align:center;font-family:monospace;background-color:#FFDAC1'>
<b>Municipality:</b><br>".$city."
</div>
<div class = 'col-sm-4' style = 'text-align:center;font-family:monospace;background-color:#E2F0CB'>
<b>Ward:</b><br>".$gotward."
</div>
<div class = 'col-sm-3' style = 'text-align:center;font-family:monospace;background-color:#C7CEEA'>
<b>School System:</b><br>".$school."
</div>
</div>
<div class = 'row'>
<div class ='col-sm-1'></div>
<div class = 'col-sm-10'>
<nav aria-label='breadcrumb'>
  <ol class='breadcrumb'>
    <li class='breadcrumb-item'><a href='https://www.liamnichols.ca'>Home</a></li>
    <li class='breadcrumb-item active' aria-current='page'>"."Preview your Ballot"."</li>
  </ol>
</nav>";

foreach ($positions as $position){
  if ($position[0] == 74){
    echo "<h4 style='font-family:monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
    echo'<div class="form-check">';
    foreach ($candidates as $candidate){
      if($candidate[2] == 74){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }
    }
    echo "<hr>";
    echo"</div>";
  }
}
foreach ($positions as $position){
  if($position[1] == $city && $position[4] <> "TRU"){
    foreach($position[5] as $ward){
      if($ward == $gotward){
        echo "<h4 style='font-family: monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
        echo'<div class="form-check">';
        foreach ($candidates as $candidate){
      if($candidate[2] == $position[0]){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }

    }
        echo "<hr>";
        echo "</div>";
      }
    }
  }
}
if($school == "French Catholic"){
  foreach($positions as $position){
    if($position[0] == 41){
        echo "<h4 style='font-family: monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
        echo'<div class="form-check">';
        foreach ($candidates as $candidate){
      if($candidate[2] == $position[0]){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }

    }
        echo "<hr>";
        echo "</div>";
    }
  }
}
elseif($school == "French Public"){
  foreach($positions as $position){
    if($position[0] == 40){
        echo "<h4 style='font-family: monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
        echo'<div class="form-check">';
        foreach ($candidates as $candidate){
      if($candidate[2] == $position[0]){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }

    }
        echo "<hr>";
        echo "</div>";
    }
  }
}
elseif($schtype == "Public" and $city == "Brock" or $city == "Scugog" or $city == "Uxbridge"){
  foreach($positions as $position){
    if($position[0] == 65){
        echo "<h4 style='font-family: monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
        echo'<div class="form-check">';
        foreach ($candidates as $candidate){
      if($candidate[2] == $position[0]){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }

    }
        echo "<hr>";
        echo "</div>";
    }
  }
}
elseif($schtype == "Catholic" and $city == "Brock" or $city == "Scugog" or $city == "Uxbridge"){
  foreach($positions as $position){
    if($position[0] == 66){
        echo "<h4 style='font-family: monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
        echo'<div class="form-check">';
        foreach ($candidates as $candidate){
      if($candidate[2] == $position[0]){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }

    }
        echo "<hr>";
        echo "</div>";
    }
  }
}
else{
    foreach($positions as $position){
    if($position[6] == $schtype and $position[1] == $city){
        echo "<h4 style='font-family: monospace;'>".$position[2]."<br>choose up to ".$position[3]."</h4>";
        echo'<div class="form-check">';
        foreach ($candidates as $candidate){
      if($candidate[2] == $position[0]){
        echo '        <input class="form-check-input" type="checkbox" value="" id="'.$candidate[3].'">
  <label class="form-check-label" for="flexCheckDefault" style="font-family:monospace;">
'.$candidate[0].", ".$candidate[4].'
  </label><br>';
      }

    }
        echo "<hr>";
        echo "</div>";

    }
  }
}

echo "</div></div></div></body>"

?>