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
	<!-- styles.CSS (minified) is pre-compiled from styles.LESS via WinLESS app for Windows -->
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<!-- Using my current personal license, I have used an icon font as a text replacement technique -->
	<link rel="stylesheet" type="text/css" href="assets/css/ss-standard.css" />

	<!-- Modernizr - used to aid in legacy browser versions -->
	<script type="text/javascript" src="assets/js/modernizr.min.js"></script>
</head>

<body>
<div class="wrapper" role="main">
	<header>
		<div class="site-logo">
			<img src="assets/img/singles365.png">
		</div>
	</header>

	<div class="content">
		<!--
			The navigation layout below is to allow for a collapsed, 
			mobile-friendly menu to be implemented.
			More notes for this included in styles.css
		-->
		<nav class="top-nav" role="navigation">
			<div class="openers">
				<a class="opener opener--open" href="#mainmenu">MENU</a>
			</div>
			<div class="mainmenu" id="mainmenu">
				<div class="openers">
					<a class="opener opener--close" href="#0">CLOSE MENU</a>
				</div>

				<!--
					Menu split into several modules to allow for future implementation 
					of a multi-tiered, collapsable, mobile-friendly menu.

					HTML Comments used to nullify white space when using 
					display: inline; and display: inline-block;
					This technique has been used throughout.
				-->
				<ul class="menu nav--global">
					<li class="nav--global-options"><a href="#">Home</a></li><!--
				 --><li class="nav--global-options"><a href="#">Search</a></li><!--
				 --><li class="nav--global-options"><a href="#">Help</a></li>
				</ul><!--
			 --><ul class="menu nav--member">
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
		</nav>

		<section class="content-main">
			<header>
				<h1>Search / <span class="search-criteria">Latest Photos</span></h1>
			</header>
			
			<div class="search-meta">
				<div class="members-count">
					<!-- Typically, this would not be hard-coded, but called via a feed of total, or currently online, users -->
					<p><span id="members-count-number" class="members-count-number">31,000</span> members</p>
				</div><!--
			 --><div class="view-options">
					<!-- Case in point: Symbol font by SymbolSet (Symbolset Standard) -->
					<ul><li class="ss-icon"><span id="view-grid" class="view-option active">grid</span></li><!--
					 --><li class="ss-icon"><span id="view-rows" class="view-option">rows</span></li>
					</ul>
				</div><!--
			 --><div class="view-sort">
				<!--
					the options listed in this drop-down menu would be scripted to 
					automatically sort, before displaying, the data from the JSON results.
				-->
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

			?><!--
				The search results layout is affected by the view-options 
				mentioned above, and controlled by a snippet of JavaScript
			--><div class="search-results view-grid" id="search-results"><?php

			if ( count($json_results) > 0 ) {
				/**
				 * Gathering the required data from the JSON string
				 */
				foreach ($json_results->members as $member) {
					$member_photo_url = $member->photo;
					$member_photo_count = $member->photo_count;
					$member_firstname = $member->first_name;
					$member_age = $member->age;
					$member_location = $member->region->shortname;
					$member_profile = $member->profile;
					$member_online_status = $member->online_status;
					$member_interests = $member->interests;

			?><article class="member">
					<div class="member--photo"><?php
					// Initial check to ensure an image exists in $member->photo
					if ($member_photo_count !== 0) { ?>
						<img class="member--profile-pic" src="<?=$member_photo_url;?>"><?php
						// Further check to see if multiple images exist, rather than just one
						// If so, a link/notification is displayed hinting at more photos available
						if ($member_photo_count > 1){
							?><div class="member--total-photos ss-camera"><?=$member_photo_count?></div><?php
						}
					} ?>
					<?php if ($member_photo_count == 0) { ?>
					<!-- Self-explanatory, only displayed when no photos have been submitted by the site member -->
					<p class="no-photo">No photos available</p>
				<?php }
				?></div><!--
				--><div class="member--meta">
						<p><span class="member--name"><?=$member_firstname?></span>, <span class="member--age"><?=$member_age?></span></p>
						<p><span class="member--location"><?=$member_location?></span></p>

						<!-- More meta data for each site member is displayed but only when the view-rows option is in use -->
						<div class="member--meta--more">
							<p class="member--profile"><?=$member_profile?></p>
							<p class="member--interests"><span class="data-head">Interests:</span> <?php
								// Each of the site member's interests are listed in readable sentence form, separated accordingly
								$sep = '';
								foreach ( $member_interests as $interest ) {
									echo $sep.$interest;
									$sep = ', ';
								}
							?></p>
							<!-- A notification to the current viewer as to when the site member was last online -->
							<p class="member--online-status"><span class="data-head">Last online:</span> <?=$member_online_status?></p>
						</div>
					</div>
				</article><?php
				}
			} else { ?>
				<!-- Fallback for when no results are found -->
				<p>Unfortunately, there are no results for that search. Please try again.</p>
			<?php } ?>
			</div>
		</section>
	</div>
</div>

<script type="text/javascript">
/**
 * Simple piece of JavaScript used rather than jQuery (or equivalent)
 * as pure JavaScript will run faster and not hold up any load times
 * 
 * If JavaScript is disabled, the viewer can still see basic information 
 * for each member, with further options to open up the member's 
 * dedicated profile page
 * 
 */
document.getElementById('view-rows').onclick = function(){
	this.className = this.className+"view-option active";
	document.getElementById('view-grid').className = "view-option";
	document.getElementById('search-results').className = "search-results view-rows";
}
document.getElementById('view-grid').onclick = function(){
	this.className = this.className+"view-option active";
	document.getElementById('view-rows').className = "view-option";
	document.getElementById('search-results').className = "search-results view-grid";
}
</script>
</body>
</html>