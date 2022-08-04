let downArrow = document.querySelector('.down');

downArrow.addEventListener('click', function() {
    document.querySelector('.header').classList.toggle('active');

    document.cookie = 'header=active';
});

if( document.cookie.indexOf('header=active') > -1 ) {
    document.querySelector('.header').classList.add('hidden');
}