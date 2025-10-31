<?php 
session_start();
include('conn/conn.php'); 
include('assets/modal.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Food Recipe</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/style.css">
    

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand ml-5" href="http://localhost/my-food-recipe/index.php">My Food Recipe</a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#category">Food Categories</a>
                </li>
      
            </ul>   
            <div class="form-inline my-2 my-lg-0 mr-5">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle link-unstyled" style="text-decoration: none; color: #eee;" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        My Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        <?php else: ?>
                            <a class="dropdown-item" href="signup.php">Sign Up</a>
                            <a class="dropdown-item" href="signin.php">Sign In</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <section id="home">
        <div class="main">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="image/bg4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="caption"><strong>Discover Your Next Favorite Recipe</strong></h1>
                            <p class="caption caption-p">From breakfast to dinner, appetizers to desserts - unlock a world of culinary possibilities! Save, create, and organize all your recipes in one place. Start cooking something amazing today!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-4">
                        <div class="card shadow h-100 border-0">
                            <div class="card-body text-center">
                                <span class="fa-stack fa-2x mb-3" style="color:#007bff;">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-utensils fa-stack-1x fa-inverse"></i>
                                </span>
                                <h5 class="card-title"><strong>Recipe Explorer</strong></h5>
                                <p class="card-text">Browse, search, and filter recipes by category, cuisine, or dietary needs. Find your next meal easily!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card shadow h-100 border-0">
                            <div class="card-body text-center">
                                <span class="fa-stack fa-2x mb-3" style="color:#fd7e14;">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-list-ol fa-stack-1x fa-inverse"></i>
                                </span>
                                <h5 class="card-title"><strong>Step-by-Step Guide</strong></h5>
                                <p class="card-text">Follow clear, numbered instructions with tips and images for perfect results every time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="category">

        <!-- Category Area -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/breakfast.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Breakfast Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#breakfastModal">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/lunch.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Lunch Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#lunchModal">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/dinner.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Dinner Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#dinnerModal">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/appetizer.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Appetizer Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#appetizerModal">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/dessert.jpeg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Dessert Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#dessertModal">View List</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/fastfood.jpg" class="card-img-top" alt="..." style="height: 240px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>Fast Food Recipes</strong></h5>
                            <a class="btn btn-dark btn-block" data-toggle="modal" data-target="#fastFoodModal">View List</a>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        
    </section>

    <?php if (isset($_SESSION['user_id'])): ?>
    <section id="food">
        <div class="card card-food-list">
            <h1 class="text-center"><strong>Food Lists</strong></h1>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-2 mr-auto">
                        <button type="button" class="btn btn-add-food btn-secondary" data-toggle="modal" data-target="#addRecipeModal">Add Recipe</button>
                    </div>
                    <div class="col-md-2">
                        <input class="form-control p-4" type="text" id="searchInput" placeholder="Search...">
                    </div>
                </div>
            </div>

            
            <table id="foodListTable" class="table table-responsive mt-4" style="text-align:center;">
                <thead>
                    <tr>
                    <th scope="col" style="width: 5%;">Food ID</th>
                    <th scope="col" style="width: 10%;">Recipe Image</th>
                    <th scope="col" style="width: 10%;">Recipe Name</th>
                    <th scope="col" style="width: 10%;">Category</th>
                    <th scope="col" style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                    
                    $stmt = $conn->prepare("
                        SELECT * 
                        FROM 
                            `tbl_recipe`
                        LEFT JOIN
                            `tbl_category` ON
                            `tbl_recipe`.`tbl_category_id` = `tbl_category`.`tbl_category_id` 
                        ");
                    $stmt->execute();

                    $result = $stmt->fetchAll();

                    foreach ($result as $row) {
                        $recipeID = $row['tbl_recipe_id'];
                        $categoryID = $row['tbl_category_id'];
                        $categoryName = $row['category_name'];
                        $recipeImage = $row['recipe_image'];
                        $recipeName = $row['recipe_name'];
                        $recipeIngredients = $row['recipe_ingredients'];
                        $recipeProcedure = $row['recipe_procedure'];
                        ?>

                        <tr>
                            <th id="recipeID-<?= $recipeID ?>"><?php echo $recipeID ?></th>
                            <td id="recipeImage-<?= $recipeID ?>"><img src="http://localhost/my-food-recipe/uploads/<?php echo $recipeImage ?>" class="img-fluid" style="height: 50px; width: 90px" alt="Recipe Image"></td>
                            <td id="recipeName-<?= $recipeID ?>"><?php echo $recipeName ?></td>
                            <td id="categoryName-<?= $recipeID ?>"><?php echo $categoryName ?></td>
                            <td id="recipeIngredients-<?= $recipeID ?>" hidden><?php echo $recipeIngredients ?></td>
                            <td id="recipeProcedure-<?= $recipeID ?>" hidden><?php echo $recipeProcedure ?></td>
                           
                            <td>
                                <button type="button" onclick="view_recipe('<?php echo $recipeID ?>')" title="View"><i class="fa-solid fa-list p-1"></i></button>
                                <button type="button" onclick="update_recipe('<?php echo $recipeID ?>')" title="Edit"><i class="fa-solid fa-pencil p-1"></i></button>
                                <button type="button" onclick="delete_recipe('<?php echo $recipeID ?>')" title="Delete"><i class="fa-solid fa-trash p-1"></i></button>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>

    </section>
    <?php endif; ?>
    
    
    <script src="assets/script.js"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>



</body>
</html>