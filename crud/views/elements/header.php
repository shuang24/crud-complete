<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title> Manage</title> 
<!-- CSS --> 
<link href="<?php echo BASE_URL?>assets/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" /> 
</head> 
<body> 
	<div id="wrapper"> 
    	
    	<h1></h1>
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet --> 
        
        <ul id="mainNav"> 
        	<li><a href="<?php echo BASE_URL?>">Home</a></li>
        	<?php echo $this->helper('Mainnav')->render()?>
        	
        </ul> 
        <!-- // #end mainNav --> 
        
        <div id="containerHolder"> 
			<div id="container"> 