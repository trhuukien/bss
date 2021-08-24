//Login Submit
function login(e) {
    e.preventDefault();
    var user = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    if (user.toLowerCase() == 'john' && pass == '1234') {
        localStorage.setItem('user', user);
        window.location.replace("dashboard.php");
    } else {
        alert('Thông tin tài khoản hoặc mật khẩu không chính xác!');
    }
}