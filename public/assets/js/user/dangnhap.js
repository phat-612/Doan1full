
const mdForgetPass = document.querySelector('.js_forget_md');

// xử lý quên mật khẩu
document.querySelector('.js_forget').addEventListener('click', (e) => {
    e.preventDefault();
    mdForgetPass.style.display = 'flex';
});
document.querySelector('#send_new_pw').addEventListener('click', (e) => {
    e.preventDefault();
    e.target.disabled = true;
    let email = document.querySelector('#forget_mail').value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let isEmail = emailRegex.test(email);
    if (!isEmail) {
        alert('Vui lòng nhập một email hợp lệ');
        e.target.disabled = false;
        return false;
    }
    let formData = new FormData();
    formData.append('email', email);
    let requestOptions = {
        method: 'POST',
        body: formData
    }
    fetch(`${ROOTFOLDER}api/forgotPassword`, requestOptions)
        .then(res => {
            if (res.status == 200) {
                alert('Đã gửi mật khẩu mới đến email của bạn');
                mdForgetPass.style.display = 'none';
            } else {
                alert('Email không tồn tại');
            }
            e.target.disabled = false;
        })

});

document.querySelector('form').addEventListener('submit', (e) => {
    let formData = new FormData(e.target);
    let requestOptions = {
        method: 'POST',
        body: formData
    }
    //gửi yên cầu tới link
    fetch(`${ROOTFOLDER}api/login`, requestOptions)
        .then((res) => {
            if (res.status == 200) {
                window.location.href = "profile";
            } else {
                alert('Sai thông tin đăng nhập')
            }
        })
})