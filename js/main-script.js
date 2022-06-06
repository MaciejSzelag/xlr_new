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


window.addEventListener("scroll", ()=> {
    var windowScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (windowScroll / height) * 100;
    const indicator = document.querySelector(".indicator");
    indicator.style.setProperty("width", `${scrolled}%`)

    const section_about = document.getElementById("section_about");
    const section_gigs = document.getElementById("section_gigs");
    const section_contact = document.getElementById("section_contact");
    const nav_about = document.getElementById("about");
    const nav_gigs = document.getElementById("gigs");
    const nav_contact = document.getElementById("contact");

    const slide = (window.scrollY + window.innerHeight / 5);
    if (slide < section_about.offsetTop) {
        nav_about.classList.remove("active-li");
        nav_gigs.classList.remove("active-li");
        nav_contact.classList.remove("active-li");
    }
    if (slide > section_about.offsetTop) {
        nav_about.classList.add("active-li");
        nav_gigs.classList.remove("active-li");
        nav_contact.classList.remove("active-li");
    }
    if (slide > section_gigs.offsetTop) {
        nav_gigs.classList.add("active-li");
        nav_about.classList.remove("active-li");
        nav_contact.classList.remove("active-li");
    }
    if (slide > section_contact.offsetTop) {
        nav_contact.classList.add("active-li");
        nav_gigs.classList.remove("active-li");
        nav_about.classList.remove("active-li");
}

})
  
