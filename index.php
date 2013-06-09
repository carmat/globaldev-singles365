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
	<link rel="stylesheet" type="text/css" href="assets/css/ss-standard.css" />
</head>

<body>
<div class="wrapper" role="main">
	<header>
		<div class="site-logo">
			<img src="assets/img/singles365.png">
		</div>
	</header>

	<div class="content">
		<nav class="top-nav" role="navigation">
			<div class="openers">
				<a class="opener opener--open" href="#mainmenu">MENU</a>
			</div>
			<div class="mainmenu" id="mainmenu">
				<div class="openers">
					<a class="opener opener--close" href="#0">CLOSE MENU</a>
				</div>

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
					<p><span id="members-count-number" class="members-count-number">31,000</span> members</p>
				</div><!--
			 --><div class="view-options">
					<ul><li class="ss-icon"><span id="view-grid" class="view-option active">grid</span></li><!--
					 --><li class="ss-icon"><span id="view-rows" class="view-option">rows</span></li>
					</ul>
				</div><!--
			 --><div class="view-sort">
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

			?><div class="search-results view-grid" id="search-results"><?php

			if ( count($json_results) > 0 ) {
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
					if ($member_photo_count !== 0) { ?>
						<img class="member--profile-pic" src="<?=$member_photo_url;?>"><?php
						if ($member_photo_count > 1){
							?><div class="member--total-photos ss-camera"><?=$member_photo_count?></div><?php
						}
					} ?>
					<?php if ($member_photo_count == 0) { ?>
					<p class="no-photo">No photos available</p>
				<?php }
				?></div><!--
				--><div class="member--meta">
						<p><span class="member--name"><?=$member_firstname?></span>, <span class="member--age"><?=$member_age?></span></p>
						<p><span class="member--location"><?=$member_location?></span></p>

						<div class="member--meta--more">
							<p class="member--profile"><?=$member_profile?></p>
							<p class="member--interests"><span class="data-head">Interests:</span> <?php
								$sep = '';
								foreach ( $member_interests as $interest ) {
									echo $sep.$interest;
									$sep = ', ';
								}
							?></p>
							<p class="member--online-status"><span class="data-head">Last online:</span> <?=$member_online_status?></p>
							</ul>
						</div>
					</div>
				</article><?php
				}
			} else { ?>
				<p>Unfortunately, there are no results for that search. Please try again.</p>
			<?php } ?>
			</div>
		</section>
	</div>
</div>

<script type="text/javascript">
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