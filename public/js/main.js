// function anhMoTa() {
//     const anhsanpham = document.querySelector("#anhsanpham");
//     const anhmota = document.querySelectorAll(".anhmota");
//     anhmota.forEach((e) => {
//         e.onclick = () => {
//             const url = e.getAttribute("src");
//             anhsanpham.setAttribute("src", url);
//         };
//     });
// }
// anhMoTa();

const start = {
    backToTop() {
        const btn_top = document.querySelector(".btn-top");

        window.addEventListener("scroll", () => {
            const _Y = window.scrollY;
            if (_Y >= 400) {
                btn_top.style.display = 'block';
            } else {
                btn_top.style.display = 'none';
            }
        });

        btn_top.addEventListener("click", () => {
            document.documentElement.scrollTop = 0;
        });
    },
    previewAvatar() {
        var upload_avatar = document.querySelector("#upload_avatar");
        var preview_avatar = document.querySelector("#avatar_khachhang");
        // Preview Avatar
        // upload_avatar.onchange = (e) => {};
        window.addEventListener("change", function (e) {
            const file = e.target.files[0];
            const url_image = URL.createObjectURL(file);
            preview_avatar.setAttribute("src", `${url_image}`);
        });
    },
    // changeTitle() {
    //     let titles = [
    //         "Chào mừng đến với web bán áo",
    //         "Nam Le - Chi Hao",
    //     ];
    //     let index = 0;
    //     setInterval(() => {
    //         index += 1;
    //         if (index >= titles.length) {
    //             index = 0;
    //         }
    //         document.title = titles[index];
    //     }, 1500);
    // },
};
start.backToTop();
start.previewAvatar();
