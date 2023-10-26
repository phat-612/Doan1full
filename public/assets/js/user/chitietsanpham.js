let seaParams = {};
let detailProduct;
const mainImg = document.querySelector('.main_img img');

const eleColor = document.querySelector('.choose.ccolor');
const eleSize = document.querySelector('.choose.csize');

const eleDescCtrl = document.querySelector('.js_desc_ctrl');
const eleDescContent = document.querySelector('.js_desc_content');
// lấy mảng 
let searchParams = new URLSearchParams(window.location.search);
searchParams.forEach(function (value, key) {
    seaParams[key] = value;
});

// kiểm tra id sản phẩm
if (!seaParams.hasOwnProperty('id')) {
    console.log('có id');
    window.location.href = '/doan1full/product';
}
// lấy dữ liệu sản phẩm
let formdata = new FormData();
formdata.append("id", seaParams['id']);

let requestOptions = {
    method: 'POST',
    body: formdata,
    redirect: 'follow'
};

fetch("/doan1full/api/getDetailProduct", requestOptions)
    .then(res => res.json())
    .then(result => {
        detailProduct = result;
        console.log(detailProduct);
        loadPage();
    });
// FUNCTION
function loadPage() {
    // nav
    document.querySelector('.tag_comeback li:last-child a').textContent = detailProduct['ten'];
    // load ảnh
    let imgs = detailProduct['hinhanh'];
    imgs.forEach(img => {
        document.querySelector('.left_img').innerHTML += `
            <div class="left_img_item">
                <img src="${"/doan1full/" + img}" alt="" class="detail">
            </div>
        `
    });
    mainImg.src = "/doan1full/" + imgs[0];
    // chọn xem ảnh sản phẩm
    let leftImgs = document.querySelectorAll('.left_img_item');
    leftImgs.forEach((img) => {
        img.addEventListener('click', (e) => {
            mainImg.src = e.target.src;
        })
    })
    // tên
    document.querySelector('.title_product').textContent = detailProduct['ten'];
    // giá
    document.querySelector('.js_price_pro').innerHTML = detailProduct['gia'] + ` vnđ`;
    // chi tiết
    let ctsp = detailProduct['chitietsanpham'];
    let listColor = new Set();
    let listSize = new Set();
    ctsp.forEach(e => {
        listColor.add(e.mausac);
        listSize.add(e.kichthuoc);
    });
    // chi tiết màu sắc
    listColor.forEach(color => {
        eleColor.innerHTML += `<span class="select color">${color}</span>`
    })
    // chi tiết kích thước
    listSize.forEach(size => {
        eleSize.innerHTML += `<span class="select size">${size}</span>`
    })
    // xư lý chọn
    let eleColors = document.querySelectorAll('.select.color');
    let eleSizes = document.querySelectorAll('.select.size');
    eleColors.forEach(color => {
        color.addEventListener('click', (e) => {
            eleColors.forEach(color => {
                if (color == e.target && !e.target.classList.contains('bold_border') && !e.target.classList.contains('disabled')) {
                    e.target.classList.add('bold_border');
                    let tempSize = ctsp.filter((item) => item['mausac'] == e.target.textContent).map(item => item['kichthuoc']);
                    eleSizes.forEach(item => {
                        if (!tempSize.includes(item.textContent)) {
                            item.classList.add('disabled');
                            item.style.opacity = '0.5';
                        } else {
                            item.classList.remove('disabled');
                            item.style.opacity = '1';
                        }
                    })

                } else if (color == e.target && e.target.classList.contains('bold_border')) {
                    eleSizes.forEach(item => {
                        item.classList.remove('disabled');
                        item.style.opacity = '1';

                    })
                    color.classList.remove('bold_border');
                }


                else {
                    color.classList.remove('bold_border');
                }
            })

        })
    })
    eleSizes.forEach(size => {
        size.addEventListener('click', (e) => {
            eleSizes.forEach(size => {
                if (size == e.target && !e.target.classList.contains('bold_border') && !e.target.classList.contains('disabled')) {
                    e.target.classList.add('bold_border');


                    let tempColor = ctsp.filter((item) => item['kichthuoc'] == e.target.textContent).map(item => item['mausac']);
                    eleColors.forEach(item => {
                        if (!tempColor.includes(item.textContent)) {
                            item.classList.add('disabled');
                            item.style.opacity = '0.5';
                        } else {
                            item.classList.remove('disabled');
                            item.style.opacity = '1';
                        }
                    })



                } else if (size == e.target && e.target.classList.contains('bold_border')) {
                    eleColors.forEach(item => {
                        item.classList.remove('disabled');
                        item.style.opacity = '1';

                    })
                    size.classList.remove('bold_border');
                }

                else {
                    size.classList.remove('bold_border');
                }
            })
        })
    })
    // mô tả
    eleDescCtrl.addEventListener('click', (e) => {
        eleDescContent.classList.toggle('showElement');
    });
    eleDescContent.textContent = detailProduct['mota'];
}












// // render màu sắc kích thước
