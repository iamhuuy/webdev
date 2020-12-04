function validateLogin() {
    debugger;
    var condition = true;
    var username = document.forms['login-form']['username'].value;
    var password = document.forms['login-form']['password'].value;
    var patternUsername = /^[A-ZA-za-z][\w\d]{5,15}$/;
    var patternPassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,15}$/;

    if (username == null || username == "") {
        document.getElementById('username-error').textContent = "Tên đăng nhập không được trống";
        condition = false;
    } else if (!isValidRegex(username, patternUsername)) {
        document.getElementById('username-error').textContent = "Tên đăng nhập phải bắt đầu là chữ cái và dài 6-15 ký tự";
        condition = false;
    } else {
        document.getElementById('username-error').textContent = "";
    }

    if (password == null || password == "") {
        document.getElementById('password-error').textContent = "Mật khẩu không được trống";
        condition = false;
    } else if (!isValidRegex(password, patternPassword)) {
        document.getElementById('password-error').textContent = "Mật khẩu không đúng định dạng";
        condition = false;
    } else {
        document.getElementById('password-error').textContent = "";
    }

    function isValidRegex(string, pattern) {
        return pattern.test(string);
    }

    return condition;
}
