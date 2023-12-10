<?php
include 'dbcon.php';
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== TRUE) {
   header("Location: admin_reglog.php");
   exit();
}

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tb_admin WHERE id = $id"; // Fetch details of the logged-in admin
$result = $conn->query($sql);

$admins = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<style type="text/css">
   body {
      padding: 0;
            margin: 0;
            background-image: url('https://i.pinimg.com/564x/54/6d/5e/546d5e096868f30d366baba3b3195ed9.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: "Poppins", sans-serif;

}


   table {
   border-collapse: collapse;
   width: 50%;
   }

   th, td {
   text-align: left;
   padding: 5px;
   }  
   tr:nth-child(odd) {
   background-color: #E6E6E6;
   }
   tr:nth-child(even) {
   background-color: #D6EEEE;
   }
   .navbar-brand {
            text-decoration: none;
            color: white;
            transition: transform 0.3s ease;
            display: inline-block;
        }

        .navbar-brand:hover {
            transform: scale(1.1);
        }

</style>

<header class="navbar border-bottom border-2 flex-md-nowrap p-0 shadow" style="width: 1999px; height: 100px; background-color:#892bcc;" data-bs-theme="dark">
    <ul class="nav">
 
    <li><a class="navbar-brand fas fa-home  col-1 me-0 px-5 fs-10 text-white" href="home.php">Home</a></li>
        <li><a class="navbar-brand fas fa-user col-1 me-0 px-5 fs-8 text-white" href="profile.php">Profile</a></li>
        <li><a class="navbar-brand fas fa-user-cog col-1 me-0 px-5 fs-8 text-white" href="viewusers.php">Admin</a></li>

    </ul>
    <a class="px-4 btn" style="color:darkblue" href="loggedout.php">Logout</a>
</header><br><br>
   <table align = "center" border = "1" cellpadding = "3" cellspacing = "0">
   <center><h1>Account User</h1><br>
   		<tr>
   			<th>ID</th>
            <th>Full Name</th>
   			<th>Username</th>
   			<th>Password</th>
            <th>Edit User</th>
   		</tr>

   		<?php while ($users = $result->fetch_assoc())  :?>
   		<tr>
   			<td><?php echo $users['id']; ?> </td>
            <td><?php echo $users['username']; ?> </td>
   			<td><?php echo $users['email']; ?> </td>
   			<td><?php echo $users['password']; ?> </td>
            <td> <a href="admin_editpage.php?id=<?php echo $users['id']; ?>"style="color: green;">Edit</a>
            <a href="admin_deleteuser.php?id=<?php echo $users['id']; ?>" style="color: red;">Remove</a>
            </td>

   		</tr>
   	<?php endwhile; ?>

   </table>
   	<?php 	$conn->close(); ?>
</body>
</html>