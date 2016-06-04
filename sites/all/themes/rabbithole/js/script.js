jQuery(document).ready(function($) {
	'use strict';
				
/*
=============================================== 11. ProgressionPlayer  ===============================================
*/	
	

$('.progression-single').mediaelementplayer({
	audioWidth: 400, // width of audio player
	audioHeight:40, // height of audio player
	startVolume: 0.5, // initial volume when the player starts
	features: ['playpause','current','progress','duration','tracks','volume','fullscreen']
	});

$('.progression-playlist').mediaelementplayer({
	audioWidth: 400, // width of audio player
	audioHeight:40, // height of audio player
	startVolume: 0.5, // initial volume when the player starts
	loop: false, // useful for <audio> player loops
	features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack','current', 'progress', 'duration', 'volume', 'playlist'],
	playlist: true, //Playlist Show
	playlistposition: 'bottom' //Playlist Location
	});

	
	
// END
});