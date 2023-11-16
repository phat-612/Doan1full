function checkForm() {
    let isTrue = true;
    let inpPw = document.querySelector('#pass');
    let inpRePw = document.querySelector('#repass');
    if (inpPw.value != inpRePw.value) {
        document.querySelector('.error').textContent = '*Mật khẩu và xác nhận mật khẩu không chính xác';
        isTrue = false;
    } else {
        document.querySelector('.error').textContent = '';
    }
    return isTrue;
}