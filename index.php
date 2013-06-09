<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie ie6 lte9 lte8 lte7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><![endif]-->
<!--[if IE 7]><html class="ie ie7 lte9 lte8 lte7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><![endif]-->
<!--[if gt IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><![endif]-->
<!--[if !IE]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Global Personals :: Singles365.com</title>

<link rel="stylesheet" type="text/css" href="assets/css/reset.css">
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

<script type="text/javascript" src="js/modernizr.min.js"></script>
</head>

<body>
<div class="wrapper" role="main">
	<header>
		<div class="site-logo"><img src="assets/img/singles365.png"></div>
	</header>

	<div class="content">
		<nav class="top-nav" role="navigation">
			<div class="openers">
				<a class="opener opener--open" href="#mainmenu">Menu</a>
			</div>
			<div class="mainmenu" id="mainmenu">
				<div class="openers">
					<a class="opener opener--close" href="#0">Close Menu</a>
				</div>

				<div class="menu">
					<ul class="nav--head">
						<li><a href="#">Menu</a></li>
					</ul>

					<ul class="nav--gobal">
						<li class="nav--global-options"><a href="#">Home</a></li><!--
					 --><li class="nav--global-options"><a href="#">Search</a></li><!--
					 --><li class="nav--global-options"><a href="#">Help</a></li>
					</ul>

					<ul class="nav--member">
						<li class="nav--member-options"><a href="#">Profile</a></li><!--
					 --><li class="nav--member-options"><a href="#">Inbox</a></li><!--
					 --><li class="nav--member-options"><a href="#">Diaries</a></li><!--
					 --><li class="nav--member-options"><a href="#">Who's Online?</a></li><!--
					 --><li class="nav--member-options"><a href="#">Who's Near Me?</a></li><!--
					 --><li class="nav--member-options"><a href="#">Encounters</a></li><!--
					 --><li class="nav--member-options"><a href="#">Favourites</a></li><!--
					 --><li class="nav--member-options"><a href="#">Upgrade</a></li><!--
					 --><li class="nav--member-options"><a href="#">Account</a></li><!--
					 --><li class="nav--member-options"><a href="#">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>

		<section class="content-main">
			<header>
				<h1>Search / <span class="search-criteria">Latest Photos</span></h1>
			</header>
			
			<div class="search-meta">
				<div class="members-count">
					<p><span id="members-count-number" class="members-count-number">31,000</span> members</p>
				</div>
				<div class="view-options">
					<ul><li>Grid</li><li>Details</li></ul>
				</div>
				<div class="view-sort">
					Sort by<select class="view-sort-options">
								<option value="distance">distance</option>
								<option value="distance">youngest</option>
								<option value="distance">oldest</option>
								<option value="distance">most photos</option>
							</select>
				</div>
			</div>

			<?php
			$json_a = file_get_contents('assets/json/results.json');
			$json_results = json_decode($json_a);

			?><div class="search-results"><?php

			if ( count($json_results) > 0 ) {
				foreach ($json_results->members as $member) {
					$member_photo_url = $member->photo;
					$member_photo_count = $member->photo_count;
					$member_firstname = $member->first_name;
					$member_age = $member->age;
					$member_location = $member->region->name; ?>

				<article class="member">
					<span class="member-photo">
						<img class="member-profile-pic" src="<?=$member_photo_url?>">
						<div class="member-total-photos">[<?=$member_photo_count?>]</div>
					</span>
					<span class="member-name"><?=$member_firstname?></span> / 
					<span class="member-age"><?=$member_age?></span> / 
					<span class="member-location"><?=$member_location?></span>
				</article>
			<?php }
			} else { ?>
				<p>Unfortunately, there are no results for that search. Please try again.</p>
			<?php } ?>
			</div>
		</section>
	</div>

	<footer></footer>
</div>
</body>
</html>