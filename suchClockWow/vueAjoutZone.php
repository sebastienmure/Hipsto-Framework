<?php
namespace \src\View;
?>

<html>
<body>
<ul>
<?php foreach ($zones as $zone): 
	   print("<font size=\"2\" face=\"Arial\">". $zone->getZoneName()." </font> ") ; 
	   $tz = new DateTimeZone($zone->getZoneName());
	   print("  	");
	   print('<input type=\"checkbox\" name=\"options[]\" value=\"\">')
	   $date = new DateTime('now', $tz);
	   $date->setTimezone($tz);
	   print("<font size=\"2\" face=\"Arial\" ;>") ;
	   print(date('H:i:s')."</font></br>");
	endforeach; 
?>
</ul>
</body>
</html>