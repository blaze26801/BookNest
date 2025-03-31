// usuwanie elementów z wishlisty - poniższy kod tylko "ukrywa" elementy, nie ma jeszcze backendu!
document.querySelectorAll('.book').forEach(book => {
    book.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON' && e.target.classList.contains('wishlist-remove')) {
            book.style.display = 'none';
        }
    });
});

