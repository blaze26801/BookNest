// usuwanie elementów z koszyka - poniższy kod tylko "ukrywa" elementy, nie ma jeszcze backendu!
document.querySelectorAll('.book').forEach(book => {
    book.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON' && e.target.classList.contains('basket-remove')) {
            book.style.display = 'none';
        }
    });
});