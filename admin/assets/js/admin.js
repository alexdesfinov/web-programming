let el = document.getElementById("wrapper");
let toggleButton = document.getElementById("menu-toggle");

toggleButton.onclick = function () {
    el.classList.toggle("toggled");
};

const navlink = document.querySelectorAll('.list-group-item');
const windowspath = window.location.pathname;
const navname = document.getElementById('navname').innerText;

navlink.forEach(navlink => {
    const navlinkpathname = new URL(navlink.href).pathname;

    if (windowspath === navlinkpathname) {
        navlink.classList.add('highlight');
        navlink.setAttribute('id','highlight')
    }
 })

 const colect = document.getElementById('highlight').innerText;

 if (navname != colect) {
    document.getElementById('navname').innerHTML = colect;
 }