<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <nav class="flex justify-between items-center mb-6 bg-gray-800 text-white p-4">
            <p class="text-lg text-white-700">Hello, <?php echo $user_data['user_name']; ?></p>
            <a href="logout.php" class="text-blue-300 hover:text-blue-200">Logout</a>
        </nav>
        <div class="text-center">
    <h1 class="text-3xl font-bold text-gray-800">Hello Demo Page</h1>
</div>


    </div>
</body>

</html>