function getScreenshot() {
  html2canvas(document.body, {
  onrendered: function(canvas) {
    document.body.appendChild(canvas);
  },
  width: 750,
  height: 450
});
//    $('#box1').html("");
//    $('#box1').append(canvas);
//  },
//  width: 750,
//  height: 450
//  });
}