<!-- Registration Form HTML -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link rel="stylesheet" href="../assets/css/style.css">
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYz1HIz4Jt4DkzjE2xBujm7uHkshj5jMQu3znd3P3pZ8bR" crossorigin="anonymous">

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QY6ktJTwK9z2Ij8wZV0xL8rHF8Q2OqLzYECv3ibK+7OtRwaAxAqXxqOCDX2yf40d" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>


     <title>TUT System</title>


</head>
<form method="POST" action="../backend/register_Process.php" class="container mt-5 p-4 bg-white shadow rounded" style="max-width: 600px;">
    <h2 class="mb-4 text-center">Register</h2>

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name:</label>
        <input type="text" id="first_name" name="first_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name:</label>
        <input type="text" id="last_name" name="last_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone:</label>
        <input type="text" id="phone" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="id_number" class="form-label">ID Number:</label>
        <input type="text" id="id_number" name="id_number" class="form-control" required>
    </div>

    <div class="mb-4">
        <label for="role" class="form-label">Role:</label>
        <select id="role" name="role" class="form-select" required>
            <option value="student">Student</option>
            <option value="faculty">Faculty</option>
            <option value="maintenance">Maintenance</option>
            <option value="admin">Admin</option>
        </select>
    </div>

    <button type="submit" class="btn btn-dark w-100">Register</button>
</form>

