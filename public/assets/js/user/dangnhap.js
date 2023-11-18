document.querySelector('form').addEventListener('submit', (e) => {
    let formData = new FormData(e.target);
    let requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
    }
    fetch(`${ROOTFOLDER}api/login`, requestOptions)
        .then((res) => {
            if (res.status == 200) {
                location.reload();
            } else {
                alert('Sai thông tin đăng nhập')
            }
        })
})