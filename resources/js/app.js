/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

Echo.channel("notifications").listen("UserSessionChanged", (e) => {
    const notificaisones = document.getElementById("notificaciones");
    notificaisones.innerText = e.message;
    notificaisones.classList.remove("invisible");
    notificaisones.classList.remove("alert-success");
    notificaisones.classList.remove("alert-danger");
    notificaisones.classList.add("alert-" + e.type);
});