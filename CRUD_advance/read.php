<?php
include('config.php');

$id = $_GET['id'];
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
    <title>View Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Employee Details</h2>
        <p><strong>ID:</strong> <?php echo $employee['id']; ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($employee['Name']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($employee['Address']); ?></p>
        <p><strong>Salary:</strong> <?php echo htmlspecialchars($employee['Salary']); ?></p>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>
