//retrieve a random video from the media directory on each login page load
//this function is NOT YET IMPLEMENTED
function getBG() {
	var videos = [
    'Ig-DbfPoz3o',
    'estPhyfBGho',
    '6JL4hpnZklk'
	];

var index=Math.floor(Math.random() * videos.length);
var html = '<video playsinline autoplay muted loop poster="media/preview.png" id="bgvid"><source src="media/' + videos[index] + '" type="video/mp4"></video>';
document.write(html);
}

//creates a thumbnail from a user url for display on the manager page
function getThumbnail() {
	html2canvas(document.body, {
		onrendered: function(canvas) {
			$('#box1').html("");
			$('#box1').append(canvas)'
		},
		width: 750,
		height: 450
	});
}
