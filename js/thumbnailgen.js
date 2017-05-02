var page = require('webpage').create();
page.open('http://google.com', function () {
	page.viewportSize = { width: 1280, height: 720 }; 
	page.clipRect = { top: 14, left: 3, width: 750, height: 450 };
    page.render('google.png');
    phantom.exit();
});