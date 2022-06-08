'use strict';

    const $care1fl = document.querySelector('Score--0');
    const $care2fl = document.getElementById('Score--1');

    const diceFl = document.querySelector('.dice');
    const btnNew = document.querySelector('.btn--new');
    const btnHold = document.querySelector('.btn--hold');
    const btnRoll = document.querySelector('.btn--roll');



    $care1fl.textContent =0;
    $care2fl.textContent =0;

    diceFl.classList.add("hidden");

    btnRoll.addEventListener('click', function() {
        const dice = Math.trunc(Math.random()* 6)+1;
        console.log(dice);
    })

    


