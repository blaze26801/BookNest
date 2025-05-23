
function createAddToCartListeners() {
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function () {
            const bookElement = button.closest('.book');
            const title = bookElement.querySelector('h2')?.innerText || '';
            const author = bookElement.querySelector('p')?.innerText || '';
            const image = bookElement.querySelector('img')?.getAttribute('src') || '';
            const price = bookElement.querySelector('.price')?.innerText || '';

            const book = { title, author, image, price };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push(book);
            localStorage.setItem('cart', JSON.stringify(cart));

            alert('Dodano do koszyka!');
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    createAddToCartListeners()
});




document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.wishlist-add').forEach(button => {
        button.addEventListener('click', function() {
            console.log('Kliknięto przycisk dodania do listy życzeń');

            const bookElement = button.closest('.book');
            if (!bookElement) {
                console.error('Nie znaleziono elementu książki!');
                return;
            }

            const bookTitle = bookElement.querySelector('h2') ? bookElement.querySelector('h2').innerText : 'Brak tytułu';
            const bookAuthor = bookElement.querySelector('p') ? bookElement.querySelector('p').innerText : 'Brak autora';
            const bookImage = bookElement.querySelector('img') ? bookElement.querySelector('img').src : 'Brak obrazka';
            const bookPrice = bookElement.querySelector('.price') ? bookElement.querySelector('.price').innerText : 'Brak ceny';

            const book = {
                title: bookTitle,
                author: bookAuthor,
                image: bookImage,
                price: bookPrice
            };

            console.log('Dane książki: ', book);

            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            wishlist.push(book);
            localStorage.setItem('wishlist', JSON.stringify(wishlist));

            alert('Książka dodana do listy życzeń!');
        });
    });
});



