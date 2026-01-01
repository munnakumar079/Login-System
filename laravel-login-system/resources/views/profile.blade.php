<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>profile</title>

<style>
body {
    margin: 0;
    min-height: 100vh;
    font-family: 'Segoe UI', system-ui;
    background: linear-gradient(135deg, #6366f1, #8b5cf6, #ec4899);
    display: flex;
    align-items: center;
    justify-content: center;
}

.card {
    width: 420px;
    background: #fff;
    border-radius: 22px;
    padding: 40px;
    text-align: center;
    box-shadow: 0 30px 60px rgba(0,0,0,0.35);
    animation: fade 0.6s ease;
}

@keyframes fade {
    from {opacity:0; transform:translateY(20px);}
    to {opacity:1;}
}

.avatar {
    width: 90px;
    height: 90px;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 34px;
    font-weight: bold;
    margin: auto;
}

h1 {
    margin-top: 20px;
    font-size: 26px;
    color: #111827;
}

p {
    color: #6b7280;
    font-size: 14px;
}

button {
    margin-top: 30px;
    padding: 14px;
    width: 100%;
    border-radius: 14px;
    border: none;
    background: linear-gradient(135deg,#6366f1,#8b5cf6);
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    opacity: 0.9;
}
</style>
</head>
<body>

<div class="card">
    <div class="avatar" id="avatar">U</div>
    <h1 id="welcome">Welcome</h1>
    <p>You are successfully logged in 🚀</p>

    <button onclick="logout()">Logout</button>
</div>

<script>
const token = localStorage.getItem('token');

if (!token) {
    window.location.href = "/login";
}

// Fetch user profile
fetch("http://127.0.0.1:8000/api/profile", {
    headers: {
        "Authorization": "Bearer " + token,
        "Accept": "application/json"
    }
})

.then(res => res.json())
.then(user => {
    document.getElementById('welcome').innerText = `Welcome, ${user.name} 👋`;
    document.getElementById('avatar').innerText = user.name.charAt(0).toUpperCase();
})
.catch(() => {
    localStorage.removeItem('token');
    window.location.href = "/login";
});

// Logout
function logout() {
    fetch("http://127.0.0.1:8000/api/logout", {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token
        }
    }).finally(() => {
        localStorage.removeItem('token');
        window.location.href = "/login";
    });
}
</script>

</body>
</html>
