<?php
switch(@$_GET['page'])
{

//link profile
case 'visi':
      include("profil/visi.php");
	  break;
case 'struktur':
      include("profil/struktur.php");
	  break;
	  


default:
      include("home.php");
}
?>