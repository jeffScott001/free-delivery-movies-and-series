// Dom Elements
const cart_active = document.querySelector('.cart-active');
const cart_items_container = document.querySelector('.cart-items-container');
const show_videos = document.querySelector('.trailers-container');
const body = document;

// Event listners
// cart_active.addEventListener('change', cartActivate);
body.addEventListener('click', cartActivateDeactivate);

// Cart deactivate
function cartActivateDeactivate(e) {
        if(e.target.checked || e.target.className == 'cart-items-container active' || e.target.className == 'each-item' || e.target.className == 'img-container' || e.target.className == 'img-container-a' || e.target.className == 'far fa-trash-alt' || e.target.className == 'color-white'){
            cart_items_container.classList.remove('domant');
            cart_items_container.classList.add('active');  
        }else {
              cart_items_container.classList.remove('active');
              cart_items_container.classList.add('domant'); 
              cart_active.checked = false;
        }
        if(e.target.className == 'far fa-trash-alt') {
            console.log(e.target.id);
            const data = JSON.parse(localStorage.getItem('cart_data'));
            const filtered = data.filter((array, index) => {
                if(index != e.target.id){
                    return array;
                }
            })
            const string = JSON.stringify(filtered);
            localStorage.setItem('cart_data', string);
            addToCart()
        }
}

window.onload = addToCart();

function addToCart() {
    if(localStorage.getItem('cart_data') != null) {
        let data = JSON.parse(localStorage.getItem('cart_data'));
        const container = document.querySelector('.cart-items-container2');
        document.querySelector('.count-container').innerHTML = data.length;
        let content = ``
        data.forEach((obj, index) => {
           let tag = `<div class="each-item">
            <div class="img-container">
                <img class="img-container-a" src=${obj.thumnail_url} alt="NON">
                <i id= ${index} class="far fa-trash-alt"></i>
            </div>
            <div>
                <p class="color-white">${obj.title}</p>
                <p class="color-white">${obj.seasons.toString()}</p>
            </div>
          </div>`
          content += tag
        })
        container.innerHTML = content

    }
}

// Drop down
if(document.querySelector('#list') != null) {
    const btn = document.querySelector('#drop-down-index');
    const drop = document.querySelector('#list');
    
    document.addEventListener('click', activateDeactivateDropdown);
    
    function activateDeactivateDropdown(e) {
        console.log(drop.className)
        if(e.target.className == 'fas fa-caret-down domant') {
            btn.classList.remove('domant');
            btn.classList.add('active');
            drop.classList.remove('domant');
            drop.classList.add('active');
        }else {
            btn.classList.remove('active');
            btn.classList.add('domant');
            drop.classList.remove('active');
            drop.classList.add('domant');
        }
    }
}
