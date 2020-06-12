// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    if (response.status === 'connected') {
        FB.api('/me?fields=first_name,last_name,name,id,link,gender,email,picture', function (data) {
            console.log('Successful login for: ' + data.first_name);
            console.log('Successful login for: ' + data.last_name);
            console.log('Successful login for: ' + data.name);
            console.log('Successful login for: ' + data.id);
            console.log('Successful login for: ' + data.link);
            console.log('Successful login for: ' + data.gender);
            console.log('Successful login for: ' + data.email);
            console.log('Successful login for: ' + data.picture);
        });
        //console.log('Successful login for: ' + response);
        //
        //console.log('Successful login for: ' + response.public_profile);
        //console.log('Successful login for: ' + response.gender);
    } else {
        // The person is not logged into this app or we are unable to tell. 
        //loginState();
    }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
        if (response.status === 'connected') {
            //send verify login
            FB.api('/me?fields=first_name,last_name,name,id,link,gender,email,picture', function (data) {
                console.log('Successful login for: ' + data.first_name);
                console.log('Successful login for: ' + data.last_name);
                console.log('Successful login for: ' + data.name);
                console.log('Successful login for: ' + data.id);
                console.log('Successful login for: ' + data.link);
                console.log('Successful login for: ' + data.gender);
                console.log('Successful login for: ' + data.email);
                //console.log('Successful login for: ' + data.picture);
                
                $.post(SITE_URL + "users/facebookauthen/", {first_name: data.first_name,last_name:data.last_name,
                    name:data.name,id:data.id,link:data.link,gender:data.gender,email:data.email}, function (_data) {
                    //window.location = SITE_URL;
                    location.reload();
                });
                
                
            });
            
        }
    });
}

function loginState() {
    FB.login(function (response) {
        statusChangeCallback(response);
    }, {scope: 'public_profile,email'});
}

window.fbAsyncInit = function () {
    FB.init({
        appId: '806221012907208',
        cookie: true, // enable cookies to allow the server to access 
        status: true,
        xfbml: true, // parse social plugins on this page
        version: 'v2.12' // use graph api version 2.8
    });

    // Now that we've initialized the JavaScript SDK, we call 
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    }, true);
};

// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));