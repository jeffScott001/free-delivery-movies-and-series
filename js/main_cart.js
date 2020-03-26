// video elements
const cart_container = document.querySelector('.trailers-container');




// Event Listeners
cart_container.addEventListener('click', transitionsContainer);


// Functions
let seasons = [];
let episodes = [];
function transitionsContainer(e){
    console.log(e.target.className);
    if(e.target.id == 'add-to-cart-btn'){
    e.target.parentElement.classList.remove('active');
    e.target.parentElement.classList.add('domant');
    e.target.parentElement.nextElementSibling.classList.remove('inactive');
    e.target.parentElement.nextElementSibling.classList.add('active');
    console.log(e.target)
    }

    if(e.target.id == 'foward-season-btn'){
        e.target.parentElement.parentElement.previousElementSibling.classList.remove('domant');
        e.target.parentElement.parentElement.previousElementSibling.classList.add('domant2');
         e.target.parentElement.parentElement.classList.remove('active');
         e.target.parentElement.parentElement.classList.add('domant');
         e.target.parentElement.parentElement.nextElementSibling.classList.remove('inactive');
         e.target.parentElement.parentElement.nextElementSibling.classList.add('active');
    }

    if(e.target.id == 'backward-episodes-btn'){
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.classList.remove('domant2');
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.classList.add('domant');
        e.target.parentElement.parentElement.previousElementSibling.classList.remove('domant');
        e.target.parentElement.parentElement.previousElementSibling.classList.add('active');
        e.target.parentElement.parentElement.classList.remove('active');
        e.target.parentElement.parentElement.classList.add('inactive');   
    }

    if(e.target.id == 'foward-episodes-btn'){
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.classList.remove('domant2');
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.classList.add('domant3');
        e.target.parentElement.parentElement.previousElementSibling.classList.remove('domant');
        e.target.parentElement.parentElement.previousElementSibling.classList.add('domant2');
        e.target.parentElement.parentElement.classList.remove('active');
        e.target.parentElement.parentElement.classList.add('domant');
        e.target.parentElement.parentElement.nextElementSibling.classList.remove('inactive');
        e.target.parentElement.parentElement.nextElementSibling.classList.add('active');
    }

    if(e.target.id == 'confirm-backward-btn'){
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.classList.remove('domant3');
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.classList.add('domant2');
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.classList.remove('domant2');
        e.target.parentElement.parentElement.previousElementSibling.previousElementSibling.classList.add('domant');
        e.target.parentElement.parentElement.previousElementSibling.classList.remove('domant');
        e.target.parentElement.parentElement.previousElementSibling.classList.add('active');
        e.target.parentElement.parentElement.classList.remove('active');
        e.target.parentElement.parentElement.classList.add('inactive');
    }

    
    // Selection
    if(e.target.className == "seasons-lists"){
        // console.log(e.target.textContent);
        let values = seasons.filter(season => season == e.target.textContent);
        // console.log(values);
        if(values.length == 0){
            seasons.push(e.target.textContent);
            e.target.style.background = 'green';
        } else {
            seasons = seasons.filter(season => season != e.target.textContent);
            e.target.style.background = '#333';
        }
    }

    if(e.target.className == "episode-lists"){
        // console.log(e.target.textContent);
        let values = episodes.filter(season => season == e.target.textContent);
        // console.log(values);
        if(values.length == 0){
            episodes.push(e.target.textContent);
            e.target.style.background = 'green';
        } else {
            episodes = episodes.filter(season => season != e.target.textContent);
            e.target.style.background = '#333';
        }
    }

    if(e.target.id == 'btn-confirm'){
        console.log( e.target.parentElement.parentElement.firstElementChild.attributes['value'].value)
        const title = e.target.parentElement.parentElement.firstElementChild.attributes['value'].value
        const thumnail_url =  e.target.parentElement.parentElement.firstElementChild.nextElementSibling.attributes['value'].value
  
        const cart_data = {
            title,
            thumnail_url,
            episodes,
            seasons
        }
    if(localStorage.getItem('cart_data') != null) {
        const data = localStorage.getItem('cart_data');
        let data2 = JSON.parse(data);
        data2.push(cart_data);
        const data3 = JSON.stringify(data2);
        localStorage.setItem('cart_data', data3);
    } else {
        let array = [];
        array.push(cart_data);
        const to_string = JSON.stringify(array);
        localStorage.setItem('cart_data', to_string); 
    }
    

    if(seasons.length != 0 || episodes.length != 0){
        addToCart();
    }

        e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.classList.remove('domant3');
        e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.classList.add('active');
        e.target.parentElement.previousElementSibling.previousElementSibling.classList.remove('domant2');
        e.target.parentElement.previousElementSibling.previousElementSibling.classList.add('inactive');
        e.target.parentElement.previousElementSibling.classList.remove('domant');
        e.target.parentElement.previousElementSibling.classList.add('inactive');
        e.target.parentElement.classList.remove('active');
        e.target.parentElement.classList.add('inactive');
    }

}


function addToCart() {
    let data = JSON.parse(localStorage.getItem('cart_data'));
    const container = document.querySelector('.cart-items-container');
    document.querySelector('.count-container').innerHTML = data.length;
    let content = `<a href="http://localhost/online_freedelivery_movies_series/Order_details.php" class="confirm-order-cart">Order</a>`
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
    seasons = [];
    episodes = [];
}

  



