const otpInputs = document.querySelectorAll('.otp_input input');
const btnSignup = document.querySelector('.js_btn_dk');
const eleTimeOtp = document.querySelector('.time .time_out');
const eleReSendTime = document.querySelector('.send_again .again');
const btnReSend = document.querySelector('.send_again .send');

let idTimeOtp;
let idTimeResOtp;

function checkPass() {
    let isTrue = true;
    let inpPw = document.querySelector('#pass');
    let inpRePw = document.querySelector('#repass');
    if (inpPw.value != inpRePw.value) {
        document.querySelector('.error-pass').textContent = '*Mật khẩu không trùng khớp';
        isTrue = false;
    } else {
        document.querySelector('.error-pass').textContent = '';
    }
    // if (newPass != newRePass) {
    //     document.querySelector('.error').textContent = '*Mật khẩu không trùng khớp'
    //     return false;
    // } else {
    //     document.querySelector('.error').textContent = '';
    //     return true;
    // }
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
document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
    if (!checkPass()) {
        return false;
    }

    btnSignup.disabled = true;

    // xử lý gửi otp đến email
    sendOtp();
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
// nút gửi lại otp
btnReSend.style.pointerEvents = "none";
btnReSend.addEventListener('click', (e) => {
    e.preventDefault();
    sendOtp();
});
// FUNCTION
function resetOtp() {
    otpInputs.forEach((input) => {
        input.value = '';
    });
    otpInputs[0].focus();
}
function sendOtp() {
    btnReSend.style.pointerEvents = "none";
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
                document.querySelector('.error-email').textContent = '';
                timeOtp();
                timeReSendOtp();

            } else {
                // xử lý sai otp khi submit
                document.querySelector('.error-email').textContent = '*Email đã được đăng ký';
            }
            btnSignup.disabled = false;
        });

}
function timeReSendOtp() {
    clearInterval(idTimeResOtp);
    let time = 60;
    idTimeResOtp = setInterval(() => {
        time--;
        eleReSendTime.textContent = time;
        if (time <= 0) {
            clearInterval(idTimeResOtp);
            btnReSend.style.pointerEvents = 'auto';
        }
    }, 1000)
}
function timeOtp() {
    clearInterval(idTimeOtp);
    let time = 180;
    idTimeOtp = setInterval(() => {
        time--;
        eleTimeOtp.textContent = time;
        if (time <= 0) {
            clearInterval(idTimeOtp);
        }
    }, 1000)
}