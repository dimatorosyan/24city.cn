var callback = {}

callback.open = function(){
	var overlay = document.getElementById('callback');
	if(overlay){
		if(overlay.classList.contains('open')) return false;
		overlay.classList.add('open');
	}
}

callback.close = function(){
	var overlay = document.getElementById('callback');
	if(overlay){
		overlay.classList.remove('open');
	}
}

window.addEventListener('load', function(){
	var mainmenu = document.getElementById('mainmenu');
	var menumin = document.getElementById('menumin');
	menumin.addEventListener('click', function(){
		mainmenu.classList.toggle('open');
	});

	var links = document.querySelectorAll('a');
	if(links){
		for(var i=0; i<links.length; i++){
			links[i].addEventListener('click', function(e){
				mainmenu.classList.remove('open');
				var id = this.getAttribute('href');
				if(id && id.indexOf('#') == 0){
					var elem = document.querySelector(id);
					if(elem){
						e.preventDefault();
						window.scrollTo({top:elem.offsetTop, left:0, behavior:'smooth'});
					}
				}
			});
		}
	}

	if(document.querySelector('.competencies')){
		new Glide('.competencies', {
			type: 'carousel',
			perView: 4,
			gap: 0,
			breakpoints: {
				1170: {
					perView: 3
				},
				992: {
					perView: 2
				},
				768: {
					perView: 1
				}
			}
		}).mount();
	}
	
	/*if(document.querySelector('.reviews')){
		new Glide('.reviews', {
			type: 'carousel',
			focusAt: 'center',
			perView: 5,
			gap: 20,
			breakpoints: {
				1170: {
					perView: 4
				},
				992: {
					perView: 2
				},
				768: {
					perView: 1
				}
			}
		}).mount();
	}*/

	if(document.querySelector('.news')){
		new Glide('.news', {
			type: 'carousel',
			perView: 2,
			gap: 0,
			breakpoints: {
				992: {
					perView: 2
				},
				768: {
					perView: 1
				}
			}
		}).mount();
	}

	var readMore = document.querySelectorAll('.read-more');
	if(readMore){
		for(var i=0; i<readMore.length; i++){
			readMore[i].querySelector('a').addEventListener('click', function(){
				var nextNode = this.parentNode.nextElementSibling;
				nextNode.classList.remove('d-none');
				this.parentNode.remove();
			});
		}
	}
});

window.addEventListener('resize', function(){
	var w = window.outerWidth;
	if(w > 767){
		var mainmenu = document.getElementById('mainmenu');
		mainmenu.classList.remove('open');
	}
});