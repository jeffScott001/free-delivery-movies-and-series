const container = document.querySelector('#items-container');

const data = JSON.parse(localStorage.getItem('cart_data'));

console.log(data);

let content = `<input type="hidden" name="data" value="" />`;
data.forEach(obj => {
    content += `<div class="order-container-shoe">
    <div class="order-shoe-img-container">
        <img class="order-img" src=${obj.thumnail_url} alt="NON" />
    </div>
    <div class="order-shoe-prop-container">
        <p class="order-shoe-name">Name - <span>${obj.title}</span></p>
        <p class="order-shoe-price">Ksh. <span>30</span></p>
        <p class="order-shoe-color">Season(s) - <span>${obj.seasons.toString()}</span></p>
        <p class="order-shoe-color">Episode(s) - <span>${obj.episodes.toString()}</span></p>
    </div>
    </div>`
})
container.innerHTML = content;

const form = document.querySelector('form');

form.addEventListener('submit', completeOrder);

function completeOrder(e) {
    e.preventDefault();
    
    if(e.target.className = 'place-order') {
        console.log(e.target)
        const cart_items = {
            'user_id': document.querySelector('#user_id').value,
            'phone_number': document.querySelector('#phone').value,
            'area': document.querySelector('#location').value,
            'mpesa_code': document.querySelector('#m_pesa_code').value,
            'items': data
        }
        const data2 = JSON.stringify(cart_items)
        console.log(data2)
        fetch('item/ordered_items.php', {
            method:'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: data2
        })
        .then((res) => res.json())
        .then((msg) => {
            localStorage.removeItem('cart_data');
            window.location.replace(`http://localhost/online_freedelivery_movies_series/index.php?msg=${msg.msg}`)
        })
    }
}


