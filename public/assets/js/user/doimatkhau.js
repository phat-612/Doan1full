let inpOldPass = document.querySelector('#pass');
let inpNewPass = document.querySelector('#new-pass');
let inpNewRePass = document.querySelector('#new-repass');


inpNewRePass.addEventListener('keyup', () => {
    checkPass();
})
function checkPass() {
    let newPass = inpNewPass.value;
    let newRePass = inpNewRePass.value;
    console.log(newPass, newRePass);
    if (newPass != newRePass) {
        document.querySelector('.error').textContent = '*Mật khẩu không trùng khớp'
        return false;
    } else {
        document.querySelector('.error').textContent = '';
        return true;
    }
}
// gửi form lên server
document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
    if (!checkPass()) {
        return false;
    }
    let formData = new FormData(e.target);
    let resquestOptions = {
        method: 'POST',
        body: formData,
    }
    fetch(`/doan1full/api/changePassword`, resquestOptions)
        .then(res => {
            if (res.status == 200) {
                alert('Đổi mật khẩu thành công');
                window.location.reload();
            } else {
                alert('Đổi mật khẩu thất bại');
            }
        }

        )
});