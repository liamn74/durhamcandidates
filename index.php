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
$file = array_map('str_getcsv', file('website/test.csv'));
$csv = array_map('str_getcsv', file('website/candidates.csv'));
$positfile = array_map('str_getcsv', file('website/positions.csv'));
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
$count = 0;
foreach ($towns as $town){
  foreach($positions as $position){
    
    if($position[1] == $town[0]){
    foreach ($candidates as $line1){
      if($line1[1] == $town[0] && $line1[2] == $position[0] && $line[5] != 2){
        if($position[4] == "HOC"){
          $hoc++;
        }elseif($position[4] == "RC"){
          $rc++;
        }elseif($position[4] == "CC"){
          $cc++;
        }elseif($position[4] == "TRU"){
          $tru++;
        }
      }
}
    }
  }
}
echo'<head><script src="https://kit.fontawesome.com/ccc537e79c.js" crossorigin="anonymous"></script><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8849894797310514"
     crossorigin="anonymous"></script>
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
<div class="col-sm-10">
<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#home">Home</a></li>';
foreach ($towns as $town){
  echo '<li><a data-toggle="tab" href="#'.$town[0].'">'.$town[0].' ';
  foreach($candidates as $candidate){
    if($candidate[1] == $town[0]){
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
<div class = "row">
<div class = "col-sm-6">
<h2>Welcome!</h2>
<p>Thank you for visiting.<br><br>This resource is meant to help track who is running across all '.$spots.' positions to be elected in the upcoming municipal election in Durham Region.
<br><br>
Information is not gathered in real time. For the latest and most up to date information, please visit each municipality'."'".'s source data.
<br><br><table class="table">
  <thead>
    <tr>
      <th scope="col">Event</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Candidate Registration Closes</th>
      <td>Friday, August 19, 2022 at 2 p.m.</td>
    </tr>
    <tr>
      <th scope="row">Election Day</th>
      <td>Monday, October 24, 2022</td>

    </tr>
  </tbody>
</table><p><a href="/ballot.php"target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-info" >Preview your Ballot</button></a></div>
<div class="col-sm-6">
<br>
<div class="panel panel-default">
  <div class="panel-heading"><h4>'."Check If You're On The Voter's List".'</h4></div>
  <div class="panel-body">
    <a href="https://voterlookup.ca/home.aspx" target="_blank" rel="noopener noreferrer"><img class="img-responsive" src = "https://voterlookup.ca/images/MPAC-VLU-Logo.png""></a>
  </div>
</div>
</div>
</div>
<div class="panel panel-primary">
      <div class="panel-heading">Donations</div>
      <div class="panel-body">Hosting this resource and keeping it up to date does take time and money.<p><p>Please consider donating using the button at the bottom left so I can continue to provide it.<p><p>I am <mark>not</mark> affiliated with any government or institution. This is an individual effort. <p><p>Your support is much appreciated!<p><p>Liam Nichols<br><a href="https://www.twitter.com/whitbynerd"target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i>@whitbynerd</a></div></div>
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
  <div class="panel-heading"><h4>By The Numbers:</h4></div><div class="panel-body"><p><span class="badge"style="background-color:#45B39D">'.$sum.'</span> candidates are running in total<p><span class="badge"style="background-color:#16A085">'.$hoc.'</span> are running for Mayor or Regional Chair<p><span class="badge"style="background-color:#138D75">'.$rc.'</span> are running for Regional Councillor<p><span class="badge"style="background-color:#117A65">'.$cc.'</span> are running for Local Councillor<p><span class="badge"style="background-color:#0E6655">'.$tru.'</span> are running for School Board Trustee<p><span class="badge"style="background-color:#0b4d40">'.$acclamations.'</span> <a href = "https://www.liamnichols.ca/website/acclaimed.php">candidates are on track to be acclaimed</a><p><span class="badge"style="background-color:green">'.$nocans.'</span> positions do not have any candidates.</div></div></div></div>';
echo"</div>";
foreach ($towns as $town){
  echo'
    <div id="'.$town[0].'" class="tab-pane fade">
      <h2>'.$town[0].'</h2><a href="'.$town[3].'"target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-info" >Source Information</button></a><p>';

  foreach($positions as $position){
    if($position[1] == $town[0]){
    echo'
    <div class="panel panel-default">
      <div class="panel-heading"><a href ="https://www.liamnichols.ca/website/offices.php?race='.$position[0].'"><h3>'.$position[2].' </a><p><hr><span class ="badge">'.$position[3].' to be elected</span></h3>
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

  </div>
';
  }
  }
      echo '</div>';
}
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