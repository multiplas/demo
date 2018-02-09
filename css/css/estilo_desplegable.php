<?php
    header("Content-type: text/css; charset: UTF-8");
?>

@charset "utf-8";
/* CSS Document */

nav {
	display:block;
	/*clear:both;*/
	/*text-align:center;*/
	/*min-height:50px;*/
}

.nav, .nav ul {
    list-style:none;
    margin:0;
    padding:0;
}

.nav {
    position:relative;
	z-index:4;
}

.nav ul {
    height:0;
    left:0;
    overflow:hidden;
    position:absolute;
    top:50px;
}

.nav li {
    float:left;
    position:relative;
}

.nav > li a {
    -moz-transition:0.3s;
    -o-transition:0.3s;
    -webkit-transition:0.3s;
	/*background-color:rgb(123,0,0);*/
	background-color:transparent;
	border-left:2px solid rgb(102,102,102);
    color:rgb(255,255,255);
    display:block;
    font-size:1.15em;
    line-height:36px;
    padding:7px 16.5px;
    text-decoration:none;
    transition:0.3s;
	text-transform:uppercase;
}
.nav > li:first-child a {
    border-left:none;
	border-top-left-radius:5px;
	border-bottom-left-radius:5px;
}

.nav li:hover > a {
	/*background-color:rgb(0,0,0);*/
    color:rgb(255,255,255);
	text-decoration:underline;
}

.nav li:hover ul.subs, .nav li:hover ul {
    height:auto;
    width:210px;
}

.nav ul li {
    -moz-transition:0.3s;
    -o-transition:0.3s;
    -webkit-transition:0.3s;
    opacity:0;
    transition:0.3s;
    width:100%;
}

.nav li ul li {
    -moz-transition-delay:0s;
    -o-transition-delay:0s;
    -webkit-transition-delay:0s;
    transition-delay:0s;
}

.nav li:hover ul li {
    opacity:1;
    -moz-transition-delay:0.3s;
    -o-transition-delay:0.3s;
    -webkit-transition-delay:0.3s;
    transition-delay:0.3s;
}

.nav ul li a {
	border-left:none;
	border-right:none;
	background-color:rgba(1,170,209,0.8);
    color:rgb(255,255,255);
    line-height:1px;
    -moz-transition:1.0s;
    -o-transition:1.0s;
    -webkit-transition:1.0s;
    transition:1.0s;
	text-transform:none;
    padding:8px 34px;
	font-size:1.15em;
}

.nav li:hover ul li a {
    line-height:35px;
}

.nav ul li a:hover {
	background-color:rgba(0,0,0,0.8);
	text-decoration:none;
}




#nav_bottom .nav ul {
    position:static;
	clear:none;
}

#nav_bottom .nav li {
	float:none;
	margin-bottom:0;
}

#nav_bottom .nav li a {
    -moz-transition:0.0s;
    -o-transition:0.0s;
    -webkit-transition:0.0s;
    border-left:none;
	color:rgb(255,255,255);
    font-size:1.0em;
    line-height:normal;
    padding:0px;
    transition:0.0s;
}

#nav_bottom .nav > li:first-child a {
	border-top-left-radius:0px;
	border-bottom-left-radius:0px;
}

#nav_bottom .nav li:hover > a {
	color:rgb(1,170,209);
	background-color:transparent;
	text-decoration:none;
}

#nav_bottom .nav li ul, #nav_bottom .nav li:hover ul {display:none;}

.nav > li#abre_el_menu
	{
		display: none;
	}

/*
@media (max-width:980px){
	.nav > li a {
		padding:7px 8.5px;
	}
}

@media (max-width:768px){
	.nav > li a {
		padding:7px 4.5px;
	}
}

@media (max-width:680px){
	a#muestra_menu {
		display:block;
	}
	
	nav {
		display:none;
	}
	
	.nav > li {
		float:none;
	}
	
	.nav > li a {border-left:none;}
	
	.nav li ul, .nav li ul li, .nav li ul li a {
		height:auto;
		width:auto !important;
		display:block;
		float:none;
		position:static;
		opacity:1;
	}
	
	.nav li ul li a, .nav li:hover ul li a {
		line-height:25px;
	}
}

@media (max-width:480px){}
*/