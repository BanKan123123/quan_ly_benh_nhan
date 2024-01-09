
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const modal = $('.form');
const btnCancel = $('.btn-cancel');
const btnAdd = $('.btn--add');
const close = $('.close');

btnCancel.addEventListener('click', () => {
    modal.classList.remove('appear');
})

close.addEventListener('click', () => {
    modal.classList.remove('appear');
})

btnAdd.addEventListener('click', () => {
    modal.classList.add('appear');
})
