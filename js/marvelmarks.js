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
