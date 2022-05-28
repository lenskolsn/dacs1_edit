var file_image = document.querySelector("#file_image");
var preview_image = document.querySelector("#preview_image");

// Preview Avatar
file_image.onchange = (e) => {
    const file = e.target.files[0];
    const url_image = URL.createObjectURL(file);
    preview_image.setAttribute("src", `${url_image}`);
};
// Thêm ảnh mô tả
// function themAnhMoTa() {
//     const file_anhmota = document.querySelector(".file_anhmota");
//     const anhmota = document.querySelectorAll(".anhmota");
//     file_anhmota.onchange = (e) => {
//         const file = e.target.files;
//         if (file.length <= 4) {
//             for (var i = 0; i < file.length; i++) {
//                 const url = URL.createObjectURL(file[i]);
//                 anhmota[i].setAttribute("src", url);
//             }
//         } else {
//             alert("Chỉ chọn tối đa 4 hình ảnh!!!");
//         }
//     };
// }
// themAnhMoTa();
