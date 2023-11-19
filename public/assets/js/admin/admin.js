// biến toàn server
const ROOTFOLDER = "/doan1full/";
function clearSearchQuery() {
    // Lấy URL hiện tại
    var currentUrl = window.location.href;

    // Kiểm tra nếu có truy vấn tìm kiếm
    if (currentUrl.includes("?")) {
        // Cắt bỏ phần truy vấn tìm kiếm
        var baseUrl = currentUrl.slice(0, currentUrl.indexOf("?"));

        // Tải lại trang với URL đã được xóa truy vấn tìm kiếm
        window.location.href = baseUrl;
    } else {
        // Nếu không có truy vấn tìm kiếm, chỉ tải lại trang
        window.location.reload();
    }
}
