(function(){
    var url = window.location.href;
    var dirs = url.split('/');
    var current = dirs[dirs.length-1];
    links = document.getElementsByTagName("a");
    for (var i = 0; i < links.length; i++) {
    	 var hrefs = links[i].href.split('/');
    	 var href  = hrefs[hrefs.length-1];
    	 if (href == current) {
			links[i].className += " active-link";
    	 };
    };
   
})();