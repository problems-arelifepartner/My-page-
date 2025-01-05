document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Password must be 'login'
    const validPassword = 'login';

    if (password === validPassword) {
        alert('Login successful!');
        // Store login status in localStorage (for session persistence)
        localStorage.setItem('loggedIn', 'true');
        window.location.href = 'welcome.html';  // Redirect to welcome page
    } else {
        alert('Invalid password. Please try again.');
    }
});
