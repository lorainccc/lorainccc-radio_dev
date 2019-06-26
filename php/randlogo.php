<?	$url[0] = "./images/t_logo1.jpg";
	$url[1] = "./images/t_logo2.jpg";
	$url[2] = "./images/t_logo3.jpg";
	$url[3] = "./images/t_logo4.jpg";
	$url[4] = "./images/t_logo5.jpg";
	$url[5] = "./images/t_logo6.jpg";
	$url[6] = "./images/t_logo7.jpg";
	$url[7] = "./images/t_logo8.jpg";
	$url[8] = "./images/t_logo9.jpg";
	$url[9] = "./images/t_logo10.jpg";
	$url[10] = "./images/t_logo11.jpg";
	$url[11] = "./images/t_logo12.jpg";
	$url[12] = "./images/t_logo13.jpg";
	srand ((double)microtime()*1000000);
	$randomnum = rand(0, count($url)-1);
	print "<img src=\"$url[$randomnum]\" border=\"0\">";
	?>