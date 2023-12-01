<?php 
    include('partials_front/header.php');
?>

<section class="food-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>food_search.php" method="POST">
            <input type="search" name="search" placeholder="Search Foods" required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<blockquote>
    <h1>Special Deals</h1>
</blockquote>

<?php 
    include('partials_front/footer.php'); 
?>