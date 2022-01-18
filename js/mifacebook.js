window.fbAsyncInit = function() {
    FB.init({
        appId: '2939669013009879',
        xfbml: true,
        version: 'v2.9'
    });
    FB.AppEvents.logPageView();
};

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function shareScore(score) {
    FB.ui({
        method: 'share',
        href: 'https://www.facebook.com/',
        hashtag: '#MejorScore',
        quote: 'Soy el mejor en Bomb Space:' + score
    }, function(response) {});
}