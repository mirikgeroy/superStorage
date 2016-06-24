<?php
include 'head.php';
include 'Queries/categoryQueries.php';
include 'Forms/categoryForm.php';
$categories = getCategories();
include 'Tables/category.php';
