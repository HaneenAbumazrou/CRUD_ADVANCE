<?php
include('config.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM employees WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: index.php"); // Redirect to the index page after deletion
}

// Fetch employee data for confirmation
$sql = "SELECT * FROM employees WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    die("Employee not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Delete Employee</h2>
        <p>Are you sure you want to delete the following employee?</p>
        <p><strong>ID:</strong> <?php echo $employee['id']; ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($employee['Name']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($employee['Address']); ?></p>
        <p><strong>Salary:</strong> <?php echo htmlspecialchars($employee['Salary']); ?></p>
        <form method="post">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
