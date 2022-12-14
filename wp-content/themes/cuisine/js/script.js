let downArrow = document.querySelector('.down');

downArrow.addEventListener('click', function() {
    document.querySelector('.header').classList.toggle('active');
    document.querySelector('body').classList.remove('first-visite');

    document.cookie = 'header=active';
});

if( document.cookie.indexOf('header=active') > -1 ) {
    document.querySelector('.header').classList.add('hidden');
} else {
    document.querySelector('body').classList.add('first-visite');
}

let ingredientsList = document.querySelectorAll('.ingredients li');
ingredientsList.forEach(function(item) {
    item.addEventListener('click', function() {
        item.classList.toggle('taken');
    });
})

let StepsList = document.querySelectorAll('.steps li');
StepsList.forEach(function(item) {
    item.addEventListener('click', function() {
        item.classList.toggle('taken');
    });
})