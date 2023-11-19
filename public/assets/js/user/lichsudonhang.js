const eleNoneOrder = document.querySelector('.no_order-tb');
const eleContOrder = document.querySelector('.cont_my-order');
const eleAreaOrder = document.querySelector('.area_order');
const selFilter = document.querySelector('.filter select');
const selSort = document.querySelector('.sort select');
let dataOrder;

let requestOptions = {
    method: 'POST',
    redirect: 'follow'
}
fetch(`${ROOTFOLDER}api/getListOrderUser`, requestOptions)
    .then(res => res.json())
    .then(data => {
        dataOrder = data;
        if (dataOrder.length > 0) {
            eleContOrder.style.display = 'block';
        } else {
            eleNoneOrder.style.display = 'block';
        }
        loadOrder();
    })

// lọc
selFilter.addEventListener('change', e => {
    loadOrder();
})
// sắp xếp
selSort.addEventListener('change', e => {
    loadOrder();
});
// ẩn modal
document.querySelector('.modal_overplay').addEventListener('click', () => {
    document.querySelector('.modal').style.display = 'none';
});
// FUNCTION
function loadOrder() {
    let sort = selSort.value;
    let filter = selFilter.value;
    let tempData = dataOrder;
    if (filter) {
        tempData = dataOrder.filter(order => order.trangthai == filter);
    }
    tempData.sort((a, b) => {
        if (sort == 0) {
            return new Date(b['thoigian']) - new Date(a['thoigian']);
        } else if (sort == 1) {
            return new Date(a['thoigian']) - new Date(b['thoigian']);
        } else if (sort == 2) {
            return b['tongtien'] - a['tongtien'];
        } else if (sort == 3) {
            return a['tongtien'] - b['tongtien'];
        }
    })
    let html = '';
    eleAreaOrder.innerHTML = '';
    tempData.forEach((order) => {
        html += `
        <div class="list-order">
            <div class="p10-order">
                <div class="order">
                    <div class="order-cont">`;
        order['chitietdonhang'].forEach(detailOrder => {
            html += `
            <div class="card_item">
                <div class="photo_product">
                    <img src="${ROOTFOLDER + detailOrder['hinhanh']}" alt="">
                </div>
                <div class="cont_right">
                    <div class="card_title_dlt">
                        <h1 class="title_product">${detailOrder['ten']}</h1>
                    </div>
                    <div class="detail_product">
                        <span class="size">Size <span>${detailOrder['kichthuoc']}</span></span>
                        <span class="color">&#47; Màu <span>${detailOrder['mausac']}</span></span>
                    </div>
                    <div class="amount_price">
                        <div class="soluonghang">${detailOrder['soluong']}</div>
                        <div class="price_item">
                            <span class="num_price">${formatPrice(detailOrder['gia'])}</span>
                            <span>vnđ</span>
                        </div>
                    </div>
                </div>
            </div>
            `
        })
        html += `
        </div>
            <div class="order-footer">
                <div class="order-footer_stt">
                    <p>Tình trạng:<span>${order['trangthai']}</span></p>
                </div>
                <div class="order-footer_right">
                    <div class="gia">
                        <p class="num_price">${formatPrice(order['tongtien'])}<span>vnđ</span></p>
                    </div>
                    <div class="btn_controls">
                        <button class="btn sub_btn" >Xem chi tiết</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <hr>
        `;
    });
    eleAreaOrder.innerHTML = html;
    eleAreaOrder.querySelectorAll('button').forEach((button, ind) => {
        button.addEventListener('click', (e) => {
            document.querySelector('.modal').style.display = 'flex';
            document.querySelector('.modal .ten').innerText = tempData[ind]['hoten'];
            document.querySelector('.modal .sodienthoai').innerText = tempData[ind]['sodienthoai'];
            document.querySelector('.modal .diachi').innerText = tempData[ind]['diachi'];
        })
    })
}