document.querySelector('.nav-switch').addEventListener('click', function(event) {
    event.preventDefault();
    const mobileNav = document.querySelector('.mobile-navigation');

    if (mobileNav.style.display === 'none' || mobileNav.style.display === '') {
        mobileNav.style.display = 'block';
        mobileNav.style.maxHeight = mobileNav.scrollHeight + 'px';
    } else {
        mobileNav.style.maxHeight = '0';
        setTimeout(() => {
            mobileNav.style.display = 'none';
        }, 400);
    }
});
