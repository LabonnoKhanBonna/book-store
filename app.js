// Fetch and display book list
function getBooks() {
    fetch('api.php?action=getBooks')
        .then(response => response.json())
        .then(books => {
            const bookList = document.getElementById('bookList');
            bookList.innerHTML = '<h2>Book List</h2>';
            books.forEach(book => {
                bookList.innerHTML += `<p>${book.title} by ${book.author} - $${book.price}</p>`;
            });
        });
}

// Submit user information
function submitUserInfo() {
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    fetch('api.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=submitUserInfo&username=${username}&email=${email}&password=${password}`,
    })
    .then(response => response.json())
    .then(data => {
        console.log('User information submitted successfully');
    });
}

// Fetch and display book list when the page loads
window.onload = function() {
    getBooks();
};
