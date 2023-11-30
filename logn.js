function submitLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Validation: Add your own validation logic here

    fetch('api.php?action=login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${username}&password=${password}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'dashboard.html'; // Redirect to the dashboard on successful login
        } else {
            document.getElementById('loginMessage').innerText = 'Invalid username or password.';
        }
    });
}
