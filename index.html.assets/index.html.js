document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('header');
    window.onscroll = function() {
        if (window.pageYOffset > 50) {
            header.style.backgroundColor = '#0056b3';
        } else {
            header.style.backgroundColor = '#0084ff';
        }
    };
});