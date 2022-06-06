//navigation
const line_container = document.querySelector(".line-container");
const line_box = document.querySelector(".line-box");
let active = false;

const menu_wrap = document.querySelector(".menu-wrap");
const menu_container = document.querySelector(".menu-container");

const menu_a = document.querySelectorAll(".menu-list ul li a");

const menu = () => {
    if (active) {
        line_box.classList.add("line-box-active");
        menu_wrap.classList.add("menu-wrap-active");
        setTimeout(() => {
            menu_container.classList.add("menu-container-active");
        }, 300)
        active = !active
    } else if (!active) {
        line_box.classList.remove("line-box-active");
        menu_container.classList.remove("menu-container-active");
        setTimeout(() => {
            menu_wrap.classList.remove("menu-wrap-active");
        }, 700)
        active = !active
    }
}




line_container.addEventListener("click", menu);
menu_a.forEach((a) => {
    a.addEventListener("click", menu);
})