<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "my_products_db";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
 
<?php
session_start();
 
$id = '';
$name = '';
$buying_price = '';
$selling_price = '';
$display = 'No';
$isEditing = false;
 
// === CREATE ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $buying_price = trim($_POST['buying_price']);
    $selling_price = trim($_POST['selling_price']);
    $display = isset($_POST['display']) ? 'Yes' : 'No';
 
    if ($name !== '' && $buying_price !== '' && $selling_price !== '') {
        $stmt = $conn->prepare("INSERT INTO products (name, buying_price, selling_price, display) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sdds', $name, $buying_price, $selling_price, $display);
        $stmt->execute();
        $stmt->close();
        $_SESSION['msg'] = "Product added successfully.";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
 
// === UPDATE ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $name = trim($_POST['name']);
    $buying_price = trim($_POST['buying_price']);
    $selling_price = trim($_POST['selling_price']);
    $display = isset($_POST['display']) ? 'Yes' : 'No';
 
    if ($id > 0 && $name !== '' && $buying_price !== '' && $selling_price !== '') {
        $stmt = $conn->prepare("UPDATE products SET name=?, buying_price=?, selling_price=?, display=? WHERE id=?");
        $stmt->bind_param('sddsi', $name, $buying_price, $selling_price, $display, $id);
        $stmt->execute();
        $stmt->close();
        $_SESSION['msg'] = "Product updated successfully.";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
 
// === DELETE ===
if (isset($_GET['delete'])) {
    $id = (int) $_GET['delete'];
    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();
        $_SESSION['msg'] = "Product deleted.";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
 
// === EDIT ===
if (isset($_GET['edit_id'])) {
    $id = (int) $_GET['edit_id'];
    if ($id > 0) {
        $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $buying_price = $row['buying_price'];
            $selling_price = $row['selling_price'];
            $display = $row['display'];
            $isEditing = true;
        }
        $stmt->close();
    }
}
 
// === SEARCH ===
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
if ($q === '') {
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC");
    $stmt->execute();
} else {
    $like = '%' . $q . '%';
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ? ORDER BY id DESC");
    $stmt->bind_param('s', $like);
    $stmt->execute();
}
$result = $stmt->get_result();
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Product Management</title>
</head>
<body>
 
<h2><?php echo $isEditing ? "Edit Product" : "Add Product"; ?></h2>
 
<?php
if (!empty($_SESSION['msg'])) {
    echo "<p>" . htmlspecialchars($_SESSION['msg']) . "</p>";
    unset($_SESSION['msg']);
}
?>
 
<form method="post">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    <label>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" required></label><br>
    <label>Buying Price: <input type="number" step="0.01" name="buying_price" value="<?php echo htmlspecialchars($buying_price); ?>" required></label><br>
    <label>Selling Price: <input type="number" step="0.01" name="selling_price" value="<?php echo htmlspecialchars($selling_price); ?>" required></label><br>
    <label>
        <input type="checkbox" name="display" value="Yes" <?php echo ($display === 'Yes') ? 'checked' : ''; ?>>
        Display
    </label><br>
    <?php if ($isEditing): ?>
        <button type="submit" name="update">Update</button>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Cancel</a>
    <?php else: ?>
        <button type="submit" name="save">Save</button>
    <?php endif; ?>
</form>
 
<hr>
 
<h2>Search Product</h2>
<form method="get">
    <input type="text" name="q" placeholder="Enter product name" value="<?php echo htmlspecialchars($q); ?>">
    <button type="submit">Search</button>
    <?php if ($q !== ''): ?>
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Clear</a>
    <?php endif; ?>
</form>
 
<hr>
 
<h2>Product List</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Buying Price</th>
        <th>Selling Price</th>
        <th>Profit</th>
        <th>Display</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo number_format((float)$row['buying_price'], 2); ?></td>
            <td><?php echo number_format((float)$row['selling_price'], 2); ?></td>
            <td><?php echo number_format((float)($row['selling_price'] - $row['buying_price']), 2); ?></td>
            <td><?php echo htmlspecialchars($row['display']); ?></td>
            <td>
                <a href="?edit_id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this product?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
 
<?php
$stmt->close();
$conn->close();
?>
 
</body>
</html>
 
 