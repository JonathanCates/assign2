{"filter":false,"title":"hover-painting.js","tooltip":"/js/hover-painting.js","undoManager":{"mark":17,"position":17,"stack":[[{"start":{"row":0,"column":0},"end":{"row":29,"column":1},"action":"insert","lines":["/* When the page loads apply mouseover, mouseleave, mousemove, listeners to all elements with the zoom class. */","$(function(){","    $('.zoom').on('mouseover', preview);","    $('.zoom').on(\"mouseleave\", removePreview);","    $('.zoom').on(\"mousemove\", movePreview);","});","","/* Creates the preview div with the appropriate image, and fades it in. */","function preview(e)","{","    var src = $(e.target).attr('src');","    var newSrc = src.replace(\"square-medium\", \"medium\");","    var preview = $('<div id=\"preview\"></div>');","    var image = $('<img src=\"' + newSrc + '\">');","    preview.append(image);","    $('body').append(preview);","    $(\"#preview\").fadeIn(1000);","}","","/* Removes the preview div */","function removePreview(e)","{ $(\"#preview\").remove(); }","","/* Makes the preview div stick to the mouse and move with it. */","function movePreview(e)","{","    $(\"#preview\")","            .css(\"top\", (e.pageY - 50) + \"px\")","            .css(\"left\", (e.pageX + 5) + \"px\");","}"],"id":1}],[{"start":{"row":0,"column":0},"end":{"row":1,"column":0},"action":"remove","lines":["/* When the page loads apply mouseover, mouseleave, mousemove, listeners to all elements with the zoom class. */",""],"id":2}],[{"start":{"row":6,"column":0},"end":{"row":7,"column":0},"action":"remove","lines":["/* Creates the preview div with the appropriate image, and fades it in. */",""],"id":3}],[{"start":{"row":6,"column":19},"end":{"row":7,"column":0},"action":"remove","lines":["",""],"id":4}],[{"start":{"row":17,"column":25},"end":{"row":18,"column":0},"action":"remove","lines":["",""],"id":5}],[{"start":{"row":17,"column":27},"end":{"row":18,"column":0},"action":"insert","lines":["",""],"id":6},{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":21,"column":23},"end":{"row":22,"column":0},"action":"remove","lines":["",""],"id":7}],[{"start":{"row":20,"column":0},"end":{"row":21,"column":0},"action":"remove","lines":["/* Makes the preview div stick to the mouse and move with it. */",""],"id":8}],[{"start":{"row":16,"column":0},"end":{"row":17,"column":0},"action":"remove","lines":["/* Removes the preview div */",""],"id":9}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"remove","lines":["    "],"id":10},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"remove","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"remove","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"remove","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"remove","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"remove","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":4},"action":"insert","lines":["    "],"id":11},{"start":{"row":8,"column":0},"end":{"row":8,"column":4},"action":"insert","lines":["    "]},{"start":{"row":9,"column":0},"end":{"row":9,"column":4},"action":"insert","lines":["    "]},{"start":{"row":10,"column":0},"end":{"row":10,"column":4},"action":"insert","lines":["    "]},{"start":{"row":11,"column":0},"end":{"row":11,"column":4},"action":"insert","lines":["    "]},{"start":{"row":12,"column":0},"end":{"row":12,"column":4},"action":"insert","lines":["    "]},{"start":{"row":13,"column":0},"end":{"row":13,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"remove","lines":["    "],"id":12},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":21,"column":0},"end":{"row":21,"column":4},"action":"remove","lines":["    "],"id":13},{"start":{"row":22,"column":0},"end":{"row":22,"column":4},"action":"remove","lines":["    "]}],[{"start":{"row":17,"column":28},"end":{"row":19,"column":0},"action":"insert","lines":["","    ",""],"id":14}],[{"start":{"row":18,"column":0},"end":{"row":18,"column":4},"action":"remove","lines":["    "],"id":15}],[{"start":{"row":17,"column":28},"end":{"row":18,"column":0},"action":"remove","lines":["",""],"id":16}],[{"start":{"row":14,"column":1},"end":{"row":18,"column":1},"action":"remove","lines":["","","function removePreview(e){ ","    $(\"#preview\").remove(); ","}"],"id":17}],[{"start":{"row":20,"column":1},"end":{"row":24,"column":1},"action":"insert","lines":["","","function removePreview(e){ ","    $(\"#preview\").remove(); ","}"],"id":18}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":11,"column":24},"end":{"row":11,"column":24},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1481435129306,"hash":"7c7a24c4fbfb823f9caad447a9b8793f754bb596"}