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