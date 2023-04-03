const button = document.querySelector('#dad-mobile-btn');
button.addEventListener('click', function () {
    ShowHideMobileMenu();
});

function ShowHideMobileMenu(){
    event.preventDefault();
    document.getElementsByClassName('main-menu')[0].classList.toggle('show-mobile-menu');
    document.getElementById('dad-mobile-btn').classList.toggle('mobile-btn-view-2');
};