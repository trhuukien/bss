//Navbar mobile
//Click to show navbar on mobile
function click_nav(x) {
    var nav = document.getElementById("nav");
    if (x == 1) {
        nav.classList.add("nav-active");
        document.getElementById("btn-nav").classList.add("hidden");
    } else {
        nav.classList.remove("nav-active");
        document.getElementById("btn-nav").classList.remove("hidden");
    }
}

//Check login local storage
function check_login() {
    if (localStorage.getItem('user') == null) {
        window.location.replace("index.php");
    } else {
        document.getElementById('user_name').innerText = `${localStorage.getItem('user')}`;
    }
}

//Logout
function logout() {
    localStorage.removeItem('user');
    check_login();
}