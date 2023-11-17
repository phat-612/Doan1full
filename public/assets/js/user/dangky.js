const otpInputs = document.querySelectorAll('.otp_input input');



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
// xử lý nhập otp
otpInputs.forEach((input, index) => {
    input.addEventListener('keydown', (event) => {
        if (event.key >= 0 && event.key <= 9) {
            otpInputs[index].value = '';
            setTimeout(() => otpInputs[index + 1].focus(), 10);
        } else if (event.key === 'Backspace') {
            setTimeout(() => otpInputs[index - 1].focus(), 10);
        }
    });
});
document.querySelector('.js_btn_dk').addEventListener('click', (e) => {
    e.preventDefault();
    if (!checkForm()) {
        return false;
    }

    // xử lý gửi otp đến email - xử lý trùng email
    let formData = new FormData();
    formData.append('email', document.querySelector('#email').value);
    let requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
    };
    fetch(`${ROOTFOLDER}api/getOtp`, requestOptions)
        .then((res) => {
            if (res.status == 200) {
                // xử lý đúng otp khi submit
                document.querySelector('.js_otp').style.display = 'flex';
                document.querySelector('.error').textContent = '';
            } else {
                // xử lý sai otp khi submit
                document.querySelector('.error').textContent = '*Email đã được đăng ký';
            }
        });
});
// hủy bỏ otp
document.querySelector('.cancel a').addEventListener('click', (e) => {
    e.preventDefault();
    document.querySelector('.js_otp').style.display = 'none';
});
// xác nhận otp - đang dang dở
document.querySelector('.acpt a').addEventListener('click', (e) => {
    e.preventDefault();
    let otp = '';
    otpInputs.forEach((input) => {
        otp += input.value;
    });
    if (otp.length != 6) {
        resetOtp();
        return false;
    }
    document.querySelector('#otp').value = otp;
    let formData = new FormData(document.querySelector('form'));
    let requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
    };

    fetch(`${ROOTFOLDER}api/signup`, requestOptions)
        .then((res) => {
            if (res.status == 200) {
                // xử lý đúng otp khi submit
                window.location.href = `${ROOTFOLDER}user/login`;
            } else {
                // xử lý sai otp khi submit
                resetOtp();
            }
        });
});
// FUNCTION
function resetOtp() {
    otpInputs.forEach((input) => {
        input.value = '';
    });
    otpInputs[0].focus();
}