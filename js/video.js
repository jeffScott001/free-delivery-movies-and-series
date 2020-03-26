// video elements
const add_to_cart_container = document.querySelector('.icon-add');
const episodes_container = document.querySelector('.select-episodes');
const season_container = document.querySelector('.select-season');
const confirm_container = document.querySelector('.confirm-order');

const add_to_cart_btn = document.querySelector('#add-to-cart-btn');
const season_forward_btn = document.querySelector('#foward-season-btn');
const episodes_forward_btn = document.querySelector('#foward-episodes-btn');
const episodes_backward_btn = document.querySelector('#backward-episodes-btn');
const confirm_backward_btn = document.querySelector('#confirm-backward-btn');

const confirm_btn = document.querySelector('.btn-confirm');

// Event Listeners
add_to_cart_btn.addEventListener('click', seasonContainer);
season_forward_btn.addEventListener('click', episodesContainer);
episodes_backward_btn.addEventListener('click', backToSeasonContainer);
episodes_forward_btn.addEventListener('click', confirmContainer);
confirm_backward_btn.addEventListener('click', backToEpisodesContainer);
confirm_btn.addEventListener('click', completeOrder);

// Functions
// Transitions
function seasonContainer(e){
    add_to_cart_container.classList.remove('active');
    add_to_cart_container.classList.add('domant');
    season_container.classList.remove('inactive');
    season_container.classList.add('active');
}

function episodesContainer(){
    add_to_cart_container.classList.remove('domant');
    add_to_cart_container.classList.add('domant2');
    season_container.classList.remove('active');
    season_container.classList.add('domant');
    episodes_container.classList.remove('inactive');
    episodes_container.classList.add('active');
}

function backToSeasonContainer(){
    add_to_cart_container.classList.remove('domant2');
    add_to_cart_container.classList.add('domant');
    season_container.classList.remove('domant');
    season_container.classList.add('active');
    episodes_container.classList.remove('active');
    episodes_container.classList.add('inactive');
}

function confirmContainer(){
    add_to_cart_container.classList.remove('domant2');
    add_to_cart_container.classList.add('domant3');
    season_container.classList.remove('domant');
    season_container.classList.add('domant2');
    episodes_container.classList.remove('active');
    episodes_container.classList.add('domant');
    confirm_container.classList.remove('inactive');
    confirm_container.classList.add('active');
}
function backToEpisodesContainer(){
    add_to_cart_container.classList.remove('domant3');
    add_to_cart_container.classList.add('domant2');
    season_container.classList.remove('domant2');
    season_container.classList.add('domant');
    episodes_container.classList.remove('domant');
    episodes_container.classList.add('active');
    confirm_container.classList.remove('active');
    confirm_container.classList.add('inactive');
}





// Selection
// const add_to_cart_container = document.querySelector('.icon-add');
// const episodes_container = document.querySelector('.select-episodes');
// const season_container = document.querySelector('.select-season');
// const confirm_container = document.querySelector('.confirm-order');

// EventListeners
season_container.addEventListener('click', seasonSelection)
episodes_container.addEventListener('click', episodeSelection)

// Functions
// let object = {
//     S01: ["E01","E02","E03","E04","E05","E06"],
//     S02: ["E01","E02","E03","E04","E05","E06"],
//     S03: ["E01","E02","E03","E04","E05","E06"],
//     S04: ["E01","E02","E03","E04","E05","E06"],
//     S05: ["E01","E02","E03","E04","E05","E06"],
//     S06: ["E01","E02","E03","E04","E05","E06"],
//     S07: ["E01","E02","E03","E04","E05","E06"],
//     S08: ["E01","E02","E03","E04","E05","E06"],
//     S09: ["E01","E02","E03","E04","E05","E06"],
//     S10: ["E01","E02","E03","E04","E05","E06"]
// }
let seasons = [];
function seasonSelection(e){
    
    if(e.target.tagName == "LI"){
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

    // const filtered = Object.keys(object)
    // .filter(key => seasons.includes(key))
    // .reduce((obj, key) => {
    //     obj[key] = object[key];
    //     return obj;
    // }, {});

    // console.log(filtered); 
}


let episodes = [];
function episodeSelection(e){
    
    if(e.target.tagName == "LI"){
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

    // const filtered = Object.keys(object)
    // .filter(key => episodes.includes(key))
    // .reduce((obj, key) => {
    //     obj[key] = object[key];
    //     return obj;
    // }, {});

    // console.log(filtered); 
}

function completeOrder(){
    const title = document.querySelector('#title-video').value
    const thumnail_url = document.querySelector('#thumnail-video').value
  
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
    
    add_to_cart_container.classList.remove('domant3');
    add_to_cart_container.classList.add('active');
    season_container.classList.remove('domant2');
    season_container.classList.add('inactive');
    episodes_container.classList.remove('domant');
    episodes_container.classList.add('inactive');
    confirm_container.classList.remove('active');
    confirm_container.classList.add('inactive');
}

function addToCart() {
    let data = JSON.parse(localStorage.getItem('cart_data'));
    const container = document.querySelector('.cart-items-container');
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
    seasons = [];
    episodes = [];
}
// let keys = document.querySelectorAll('.seasons-list');
// // console.log(Array.from(keys));
// keys = Array.from(keys).map(key => key.textContent);
// let properties = [];
// let arrays = document.querySelectorAll('.episodes-lists');
// arrays.forEach(array => {
//     properties.push(Array.from(array.children).map(child => child.textContent));
// })
// // console.log(properties)

// let object = {};
// for(const key of keys) {
//     properties.forEach(property => {
//         object[key] = property
//     });
// }
// console.log(object)

