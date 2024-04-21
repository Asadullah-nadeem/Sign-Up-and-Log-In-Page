<?php

session_start();

	include("connection.php");
	include("functions.php");

	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result); 
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-80">
        <div class="text-2xl font-semibold mb-4 text-center">Login</div>

        <form method="post" class="space-y-4">
            <input id="text" type="text" name="user_name" placeholder="Username" class="w-full border border-gray-300 rounded px-3 py-2">
            <input id="text" type="password" name="password" placeholder="Password" class="w-full border border-gray-300 rounded px-3 py-2">

            <button id="button" type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Login</button>

            <div class="text-center">
                <a href="signup.php" class="text-blue-500 hover:underline">Signup</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>

</html>