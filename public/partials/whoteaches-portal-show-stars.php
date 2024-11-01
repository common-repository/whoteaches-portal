<?php
function whoteaches_portal_show_stars( $rating ) {
	switch (true) {
		case ($rating < 1):
		echo "<div class='WTWP_no_rating'><div class='star-o'></div><div class='star-o'></div><div class='star-o'></div><div class='star-o'></div><div class='star-o'></div></div>";
		break;
		case ($rating < 1.5):
		echo "<div class='star-o'></div><div class='star-o'></div><div class='star-o'></div><div class='star-o'></div><div class='star'></div>";
		break;
		case ($rating < 2):
		echo "<div class='star-o'></div><div class='star-o'></div><div class='star-o'></div><div class='star-half-o'></div><div class='star'></div>";
		break;
		case ($rating < 2.5):
		echo "<div class='star-o'></div><div class='star-o'></div><div class='star-o'></div><div class='star'></div><div class='star'></div>";
		break;
		case ($rating < 3):
		echo "<div class='star-o'></div><div class='star-o'></div><div class='star-half-o'></div><div class='star'></div><div class='star'></div>";
		break;
		case ($rating < 3.5):
		echo "<div class='star-o'></div><div class='star-o'></div><div class='star'></div><div class='star'></div><div class='star'></div>";
		break;
		case ($rating < 4):
		echo "<div class='star-o'></div><div class='star-half-o'></div><div class='star'></div><div class='star'></div><div class='star'></div>";
		break;
		case ($rating < 4.5):
		echo "<div class='star-o'></div><div class='star'></div><div class='star'></div><div class='star'></div><div class='star'></div>";
		break;
		case ($rating < 5):
		echo "<div class='star-half-o'></div><div class='star'></div><div class='star'></div><div class='star'></div><div class='star'></div>";
		break;
		default:
		echo "<div class='star'></div><div class='star'></div><div class='star'></div><div class='star'></div><div class='star'></div>";
	}
}
?>