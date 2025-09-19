<?php require_once 'E:/xampp/htdocs/fiverr_clone/freelancer/classloader.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark p-4" style="background-color: #0077B6;">
  <a class="navbar-brand" href="index.php">Freelancer Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="your_proposals.php">Your Proposals</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="offers_from_clients.php">Offers From Clients</a>
      </li>
      <?php
        $categories = $categoryObj->getCategories();
        foreach ($categories as $category) {
            echo '<li class="nav-item dropdown">';
            echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $category['category_id'] . '" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $category['category_name'] . '</a>';
            echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown' . $category['category_id'] . '">';
            $subcategories = $subcategoryObj->getSubcategoriesByCategoryId($category['category_id']);
            foreach ($subcategories as $subcategory) {
                echo '<a class="dropdown-item" href="#">' . $subcategory['subcategory_name'] . '</a>';
            }
            echo '</div>';
            echo '</li>';
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="core/handleForms.php?logoutUserBtn=1">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>