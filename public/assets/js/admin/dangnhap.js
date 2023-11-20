document.querySelector('form').addEventListener('submit', (e) => {
    e.preventDefault();
    let formData = new FormData(document.querySelector("form"));
    let requestOptions = {
        method: 'POST',
        body: formData
    }
    fetch("/doan1full/api/login", requestOptions)
        .then(response => {
            if (response.status == 200) {
                window.location.reload();
            }
            else {
                document.querySelector(".error").textContent = "Lỗi Đăng Nhập";
            }
        });
})