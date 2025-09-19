<?php
require_once 'classloader.php';

if (!$userObj->isLoggedIn() || $userObj->getRole() !== 'admin') {
    header('Location: login.php');
    exit();
}

$categories = $categoryObj->getCategories();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <h2>Manage Categories</h2>
        <form action="core/handleForms.php" method="post">
            <input type="hidden" name="form_type" value="add_category">
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>

        <hr>

        <h2>Manage Subcategories</h2>
        <form action="core/handleForms.php" method="post">
            <input type="hidden" name="form_type" value="add_subcategory">
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory_name">Subcategory Name</label>
                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </form>

        <hr>

        <h2>Existing Categories and Subcategories</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Subcategories</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category['category_name']; ?></td>
                        <td>
                            <ul>
                                <?php
                                $subcategories = $subcategoryObj->getSubcategoriesByCategoryId($category['category_id']);
                                foreach ($subcategories as $subcategory) {
                                    echo '<li>' . $subcategory['subcategory_name'] . '</li>';
                                }
                                ?>
                            </ul>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>