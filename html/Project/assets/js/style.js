let LineBar = document.getElementById("m_underline");
let Menus = document.querySelectorAll(".menu a");

function LineBarIndicator(e) {
    LineBar.style.left = e.offsetLeft + "px";
    LineBar.style.width = e.offsetWidth + "px";
    LineBar.style.top = e.offsetTop + e.offsetHeight + "px";
}

Menus.forEach((menu) =>
  menu.addEventListener("mousemove", (e) =>
  LineBarIndicator(e.currentTarget)
  )
);
