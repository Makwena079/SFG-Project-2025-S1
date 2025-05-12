<!-- Login Form HTML -->


<form method="POST" action="./backend/login_process.php" class="container mt-5 p-4 bg-white rounded shadow" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Login</h2>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-dark w-100">Login</button>
</form>
