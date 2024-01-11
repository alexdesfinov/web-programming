const navlink = document.querySelectorAll('.nav-link');
const windowspath = window.location.pathname;

navlink.forEach(navlink => {
    const navlinkpathname = new URL(navlink.href).pathname;

    if (windowspath === navlinkpathname) {
        navlink.classList.add('highlight');
    }
 })

 const navbarscroll = document.getElementsByTagName('nav')[0];

 window.addEventListener('scroll', function() {
    
    if (window.scrollY >1) {
        navbarscroll.classList.add('navscroll');
    }else if (window.scrollY <=0) {
        navbarscroll.classList.remove('navscroll');
    }
 })