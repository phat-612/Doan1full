let btnGuiOtp = document.querySelector('.btn_otp');
let btnSubmit = document.querySelector('.submit');

btnGuiOtp.addEventListener('click', () => {
    guiOtp();
    let count = 59;
    btnGuiOtp.disabled = true;
    btnGuiOtp.textContent = 60;

    const countdown = setInterval(() => {
        btnGuiOtp.textContent = count;
        count--;
        if (count < 0) {
            clearInterval(countdown);
            btnGuiOtp.disabled = false;
            btnGuiOtp.textContent = 'Gửi OTP';
        }
    }, 1000);
});
async function guiOtp() {
    const formData = new FormData();
    formData.append('email', 'nguyenphatssj0612@gmail.com');
    fetch('api/sendOtp', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
}