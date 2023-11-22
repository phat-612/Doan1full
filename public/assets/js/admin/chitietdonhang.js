let trangThai = document.querySelector('#status-select')
trangThai.addEventListener('change', (e) => {
    let valStatus = e.target.value;
    let iddonhang = document.querySelector('#iddonhang').value;
    let formData = new FormData();
    formData.append('id', iddonhang);
    formData.append('status', valStatus);

    let requestOptions = {
        method: 'POST',
        body: formData
    }
    fetch(`${ROOTFOLDER}api/changeStatus`, requestOptions)
        .then(res => {
            alert('Đã thay đổi trạng thái đơn hàng');
        })

});
