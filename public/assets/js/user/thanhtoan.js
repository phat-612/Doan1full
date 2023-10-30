const formOrder = document.querySelector('.js_form_order');


// xử lý submit form đặt hàng
formOrder.addEventListener('submit', (e) => {
    e.preventDefault();
    let cart = loadCart();
    let formData = new FormData(e.target);
    cart.forEach((item, index) => {
        formData.append(`chitietdonhang[${index}][idchitietsanpham]`, item['idchitietsanpham']);
        formData.append(`chitietdonhang[${index}][soluong]`, item['soluong']);
        formData.append(`chitietdonhang[${index}][gia]`, item['gia']);
    })
    formData.append('tongtien', getTotalPay());
    // console.log(formData.get('chitietdonhang[0]'));
    let requestOptions = {
        method: 'POST',
        body: formData,
        redirect: 'follow'
    };

    fetch("api/addOrder", requestOptions)
        .then(res => {
            if (res.status == 200) {
                alert("đặt hàng thành công");
            } else {
                alert("Đặt hàng thất bại");
            }
        })
    // in form dữ liệu test
    // for (var pair of formData.entries()) {
    //     console.log(pair[0] + ": " + pair[1]);
    // }
})

