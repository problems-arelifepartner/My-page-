document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Sample credentials (for demo purposes only)
    const validUsername = 'admin';
    const validPassword = 'password123';

    if (username === validUsername && password === validPassword) {
        alert('Login successful!');
        // Store login status in localStorage (for session persistence)
        localStorage.setItem('loggedIn', 'true');
        window.location.href = 'welcome.html';  // Redirect to welcome page
    } else {
        alert('Invalid username or password. Please try again.');
    }
});
