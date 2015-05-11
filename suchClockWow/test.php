<?php

require_once (realpath('./AccueilController.php'));

use \AccueilController;

$controller = new AccueilController(null,null);

try {
  if (isset($_GET['action'])) {
    if ($_GET['action'] == 'billet') {
      if (isset($_GET['id'])) {
        $idBillet = intval($_GET['id']);
        if ($idBillet != 0)
          billet($idBillet);
        else
          throw new Exception("Identifiant de billet non valide");
      }
      else
        throw new Exception("Identifiant de billet non défini");
    }
    else
      throw new Exception("Action non valide");
  }
  else {
    $controller->accueil();  // action par défaut
  }
}
catch (Exception $e) {
    $controller->erreur($e->getMessage());
}

?>
	<!--
<!DOCTYPE html>
<html>
<head>
	<title>Fuseaux Horaires</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" type="text.css" href="style.css" href="http://fonts.googleapis.com/css?family=Roboto:300"/>
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="moment.js"></script>
	<script src="moment-timezone-with-data.js"></script>
</head>
<body>
		<div data-role="page" id="foo" data-url="foo" class="ui-page ui-page-theme-a ui-page-active">

			<div data-role="header" id="header">

				<div id="actcontainer">

					<img onclick="document.location.reload(false)" id="act">

				</div>

				<div id="applinamecontainer">

					<h1 id="appliname">Timezone</h1>

				</div>

				<div id="pluscontainer">

					<div id="plus"></div>

				</div>
				
			</div>

			<div id="container">

				<script type="text/javascript">
					$(document).ready(function() {
						$('.bloc').each(function(){
							$(this).find('.time').text(moment().tz($(this).find('.timezone').text()).format('dddd, MMMM, YYYY:HH:mm:ss'));
						});

					function updateTime(){
						$('.bloc').each(function(){
							$(this).find('.time').text(moment().tz($(this).find('.timezone').text()).format('dddd, MMMM, YYYY:HH:mm:ss'));
						});
					}

					function updateClock(){
						$('.bloc').each(function(){
					        var mins = moment().tz($(this).find('.timezone').text()).format('mm');
					        var mdegree = mins * 6;
					        var mrotate = "rotate(" + mdegree + "deg)";

					        var hours = moment().tz($(this).find('.timezone').text()).format('H');
					        var hdegree = hours * 30 + (mins / 2);
					        var hrotate = "rotate(" + hdegree + "deg)";

					        $(this).find('#hour').css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});
					        $(this).find('#min').css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});
					    });
					}

						function timeUpdate(){
							updateTime();
							updateClock();
							setTimeout(timeUpdate, 1000);
						}
						timeUpdate();
					});

				</script>

				<div id="blocs1" class="bloc">

					<div class="time"></div>
					<div class="timezone">Europe/Paris</div>
					<div id="NameCity">Paris</div>

					<ul id="clock">	
						<li id="hour"></li>
						<li id="min"></li>
					</ul>
				</div>

				<div id="blocs2" class="bloc">
					<div class="time"></div>
					<div class="timezone">America/New_York</div>
					<div id="NameCity">New York</div>

					<ul id="clock2">	
						<li id="hour"></li>
						<li id="min"></li>
					</ul>
				</div>

				<div id="blocs3" class="bloc">
					<div class="time"></div>
					<div class="timezone">America/Sao_Paulo</div>
					<div id="NameCity">Sao Paulo</div>

					<ul id="clock">	
						<li id="hour"></li>
						<li id="min"></li>
					</ul>
				</div>

				<div id="blocs4" class="bloc">
					<div class="time"></div>
					<div class="timezone">Europe/London</div>
					<div id="NameCity">London</div>

					<ul id="clock2">	
						<li id="hour"></li>
						<li id="min"></li>
					</ul>
				</div>

				<div id="blocs5" class="bloc">
					<div class="time"></div>
					<div class="timezone">Europe/Athens</div>
					<div id="NameCity">Athens</div>

					<ul id="clock">	
						<li id="hour"></li>
						<li id="min"></li>
					</ul>
				</div>

				<div id="blocs6" class="bloc">
					<div class="time"></div>
					<div class="timezone">Australia/Sydney</div>
					<div id="NameCity">Sydney</div>

					<ul id="clock2">	
						<li id="hour"></li>
						<li id="min"></li>
					</ul>	
				</div>

			</div>

			<div data-role="footer" id="footer" class="ui-btn ui-shadow ui-corner-all">

				<a href="#foo2" id="button">Switch To List View</a>

			</div>

		</div>

		<div data-role="page" id="foo2" data-theme="a" data-url="foo2" class="ui-page ui-page-theme-a">

			<div data-role="header" id="header2">

				<div id="actcontainer">

					<img onclick="document.location.reload(false)" id="act" src="Images/button_act.png">

				</div>

				<div id="applinamecontainer">

					<h1 id="appliname">Timezone</h1>

				</div>

				<div id="pluscontainer">

					<div id="plus"></div>

				</div>

			</div>

			<div id="container2">

				<script type="text/javascript">
					$(document).ready(function() {
						$('.lane').each(function(){
							$(this).find('.time').text(moment().tz($(this).find('.timezone').text()).format('dddd, MMMM, YYYY:HH:mm:ss'));
						});

					function updateTime(){
						$('.bloc').each(function(){
							$(this).find('.time').text(moment().tz($(this).find('.timezone').text()).format('dddd, MMMM, YYYY:HH:mm:ss'));
						});
					}

						function timeUpdate(){
							updateTime();
							setTimeout(timeUpdate, 1000);
						}
						timeUpdate();
					});

				</script>

				<div id="lane1" class="lane">
					<div class="time"></div>
					<div class="timezone">Europe/Paris</div>
				</div>
				<div id="lane2" class="lane">
					<div class="time"></div>
					<div class="timezone">America/New_York</div>
				</div>
				<div id="lane3" class="lane">
					<div class="time"></div>
					<div class="timezone">America/Sao_Paulo</div>
				</div>
				<div id="lane4" class="lane">
					<div class="time"></div>
					<div class="timezone">Europe/London</div>
				</div>
				<div id="lane5" class="lane">
					<div class="time"></div>
					<div class="timezone">Europe/Athens</div></div>
				<div id="lane6" class="lane">
					<div class="time"></div>
					<div class="timezone">Australia/Sydney</div>
				</div>

			</div>

			<div data-role="footer"  id="footer" class="ui-btn ui-shadow ui-corner-all">

				<a href="#foo" id="button">Switch To Grid View</a>

			</div>

		</div>

</body>
</html>
-->
