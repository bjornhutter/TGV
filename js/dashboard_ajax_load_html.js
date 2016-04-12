/**
 * Created by Bjorn on 2016-04-12.
 */


$(document).ready(function () {

    $('#home-btn').click(loadHomeHTML);
    $('#about-btn').click(loadAboutHTML);
    $('#subscription-btn').click(loadSubscriptionHTML);
    $('#send-script-btn').click(loadSendScriptHTML);
    $('#contact-btn').click(loadContactHTML);

});


function loadHomeHTML() {
    $('#main').load("home_form.php");
}

function loadAboutHTML() {
    $('#main').load("about_form.php");
}

function loadSubscriptionHTML() {
    $('#main').load("subscription_form.php");
}

function  loadSendScriptHTML() {
    $('#main').load("send_script_form.php");
}

function loadContactHTML() {
    $('#main').load("contact_form.php");
}
