document.addEventListener('DOMContentLoaded', function () {
    const booksContainer = document.getElementById('books');
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    if (cart.length === 0) {
        booksContainer.innerHTML = '<p>Koszyk jest pusty.</p>';
        return;
    }

    cart.forEach((book, index) => {
        const bookElement = document.createElement('div');
        bookElement.classList.add('book');

        bookElement.innerHTML = `
            <img src="${book.image}" alt="okładka książki">
            <h2>${book.title}</h2>
            <p>${book.author}</p>
            <p>${book.price}</p>
            <button class="basket-remove" data-index="${index}">Usuń z koszyka</button>
        `;

        booksContainer.appendChild(bookElement);
    });

    document.querySelectorAll('.basket-remove').forEach(button => {
        button.addEventListener('click', function () {
            const index = this.getAttribute('data-index');
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            location.reload(); // przeładuj stronę, żeby pokazać zmiany
        });
    });
    document.querySelectorAll('.payment-option').forEach(button => {
            button.addEventListener('click', () => {
                const method = button.getAttribute('data-method');
                localStorage.setItem('selectedPayment', method);
                alert(`Wybrano metodę płatności: ${method.toUpperCase()}`);
            });
        });
    });