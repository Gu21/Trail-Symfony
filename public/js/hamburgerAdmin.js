const DashboardNav = document.querySelector('.DashboardNav');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');




openMenu.addEventListener('click',show);
closeMenu.addEventListener('click',close);

function show(){
    DashboardNav.style.display = 'flex';
    DashboardNav.style.top = '0';
}
function close(){
    DashboardNav.style.top = '-100%';
}