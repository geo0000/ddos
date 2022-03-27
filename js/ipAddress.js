const apiKey = '6dc706f1da44400a93443ac3d964eb7a';


if (!getCookie('country')) {
    fetch(`https://api.ipgeolocation.io/ipgeo?apiKey=${apiKey}`).then(res => res.json()).then(data => {
        if (data.country_name === 'Russian' || data.country_name === 'Russia') {
            setCookie('country', data.country_name, '604800');
            const body = document.querySelector('body');
            const korabel = '<div style="margin: 0 auto; text-align: center"><h2>Русский, раз уж ты зашел сюда, то посмотри это видео</h2><iframe width="560" height="315" src="https://www.youtube.com/embed/5UAnUDL6dac" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
            body.innerHTML = korabel;
        }
        
        else {
            setCookie('country', data.country_name, '604800');
        }
    })  
}

else if (getCookie('country') === 'Russian' || getCookie('country') === 'Russia' || document.referrer === 'https://pikabu.ru/') {
    updateURL();

    if (document.referrer === 'https://pikabu.ru/') {
        setCookie('country', 'Russia');
    }

    const body = document.querySelector('body');
    const korabel = '<div style="margin: 0 auto; text-align: center"><h2>Русский, раз уж ты зашел сюда, то посмотри это видео</h2><div style="width: 650px; margin: 0 auto; max-width: 100%"><video controls="controls" autoplay loop><source type="video/mp4;" src="/video/video.mp4"></video></div></div><h2>Что вы ищите на этом сайте? Мы все боремся с террором любыми способами и будьте уверены, мы победим!</h2></div>';
    body.innerHTML = korabel;
}

else if (getCookie('country') === 'Belarus') {
    updateURL();

    const body = document.querySelector('body');
    const korabel = '<div style="margin: 0 auto; text-align: center"><h2>Беларус, раз уж ты зашел сюда, то посмотри это видео</h2><div style="width: 650px; max-width: 100%"><video controls="controls" autoplay loop><source type="video/mp4;" src="/video/video.mp4"></video></div><h2>Что вы ищите на этом сайте? Мы все боремся с террором любыми способами и будьте уверены, мы победим!</h2></div>';
    body.innerHTML = korabel;
}


function updateURL() {
    if (history.pushState) {
        var baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
        var newUrl = baseUrl + '?utm_source=content_change';
        history.pushState(null, null, newUrl);
    }
    else {
        console.warn('History API не поддерживается');
    }
}


function setCookie (name, value, expires, path, domain, secure) {
    document.cookie = name + "=" + escape(value) +
      ((expires) ? "; max-age=" + expires : "") +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      ((secure) ? "; secure" : "");
}


function getCookie(name) {
	var cookie = " " + document.cookie;
	var search = " " + name + "=";
	var setStr = null;
	var offset = 0;
	var end = 0;
	if (cookie.length > 0) {
		offset = cookie.indexOf(search);
		if (offset != -1) {
			offset += search.length;
			end = cookie.indexOf(";", offset)
			if (end == -1) {
				end = cookie.length;
			}
			setStr = unescape(cookie.substring(offset, end));
		}
	}
	return(setStr);
}