<?php
include('config.php');

// Fetch employees
$sql = "SELECT * FROM employees";
$stmt = $conn->prepare($sql);
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Employees List</h2>
        <a href="create.php" class="btn btn-primary mb-3">Add Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                    <tr>
                        <td><?php echo $employee['id']; ?></td>
                        <td><?php echo htmlspecialchars($employee['Name']); ?></td>
                        <td><?php echo htmlspecialchars($employee['Address']); ?></td>
                        <td><?php echo htmlspecialchars($employee['Salary']); ?></td>
                        <td>
                            <a href="read.php?id=<?php echo $employee['id']; ?>" class="btn btn-info">View</a>
                            <a href="update.php?id=<?php echo $employee['id']; ?>" class="btn btn-warning">Update</a>
                            <a href="delete.php?id=<?php echo $employee['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
