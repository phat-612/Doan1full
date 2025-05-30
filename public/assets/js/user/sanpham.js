/*
front-end
*/

const selFilter = document.querySelector('.filter select');
const selSort = document.querySelector('.sort select');
const contProduct = document.querySelector('.product_section');
const btnPage = document.querySelector('.loading_btn');
let seaParams = {};
// 1 page 12 sản phẩm
let page = 1;
let listProduct;

// lấy mảng
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
    seaParams[key] = value;
});
// giá trị mặc định
if (seaParams.hasOwnProperty('category')) {
    selFilter.value = seaParams['category'];
} else {
    selFilter.value = '';
}
if (seaParams.hasOwnProperty('sort')) {
    selSort.value = seaParams['sort'];
} else {
    selSort.value = 'ten';
}
// lọc sản phẩm
selFilter.addEventListener('change', (e) => {
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("category", e.target.value);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;
});
// sắp xếp sản phẩm
selSort.addEventListener('change', (e) => {
    let urlObject = new URL(window.location.href);
    urlObject.searchParams.set("sort", e.target.value);
    let newUrl = urlObject.toString();
    window.location.href = newUrl;
});
// bấm vào nút xem thêm
btnPage.addEventListener('click', (e) => {
    e.preventDefault();
    loadProduct();
})
// lấy dữ liệu sản phẩm
let formdata = new FormData();
// console.log(seaParams['find'] ?? '');
formdata.append("collection", seaParams['collection'] ?? "");
formdata.append("category", seaParams['category'] ?? '');
formdata.append("sort", !seaParams['sort'] ? 'ten' : seaParams['sort']);
formdata.append("find", seaParams['find'] ?? '');

let requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
};

fetch("api/getListProduct", requestOptions)
    .then(res => res.json())
    .then(result => {
        listProduct = result;
        // console.log(listProduct);
        loadProduct();
    });

//----------------------------------FUNCTIONS--------------------------------
// load sản phẩm
function loadProduct() {
    if (listProduct.length == 0) {
        document.querySelector('.none-found_product').style.display = 'block';
        document.querySelector('.filter_sort').style.display = 'none';
        // return;
    } else {
        document.querySelector('.none-found_product').style.display = 'none';
        document.querySelector('.filter_sort').style.display = 'flex';
    }
    let isStop = listProduct.length >= 12 ? 12 : listProduct.length;
    for (let i = 0; i < isStop; i++) {
        let product = listProduct.shift();
        let html = `
            <div class="product_card">
                ${product['soluong'] <= 0 ? ` <div class='sold-out_cover'>
                        <p class='sold-out_text'>Đã hết</p>
                    </div>` : ''}
                <a href="product/detail?id=${product['id']}">
                <div class="product_img">
                    <img class="before" src="${product['hinhanh'][0]}" alt="" />
                    <img src="${product['hinhanh'][1]}" alt="" class="after" />
                </div>
                <div class="card_content">
                    <h5 class="product_name">${product['ten']}</h5>
                    <p class="product_price">${formatPrice(product['gia'])}<span> vnđ</span></p>
                </div>
                </a>
            </div>
        `
        contProduct.innerHTML += html;
    }
    if (listProduct.length <= 0) {
        btnPage.style.display = 'none';
    }
}