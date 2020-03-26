const btn = document.querySelector('#drop-down-index');
const drop = document.querySelector('#list');

document.addEventListener('click', activateDeactivateDropdown);

function activateDeactivateDropdown(e) {
    if(e.target.className == 'fas fa-caret-down domant') {
        e.target.classList.remove('domant');
        e.target.classList.add('active');
        drop.classList.remove('domant');
        drop.classList.add('active');
    }else {
        btn.classList.remove('active');
        btn.classList.add('domant');
        drop.classList.remove('active');
        drop.classList.add('domant');
    }
}
document.querySelector('.cancel').addEventListener('click', remove);
function remove(){
    document.querySelector('.cancel').parentElement.classList.add('remove');
} 