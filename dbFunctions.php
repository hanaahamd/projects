<?php


function dbConnect()
{
    $user_name = 'root';
    $password = 'root';
    $localhost = 'localhost';
    $database = 'pms';

    $conn = new mysqli($localhost, $user_name, $password, $database);
    return $conn;
}


function createCategory($name)
{
    $conn = dbConnect();

    $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";

    $conn->query($sql);

    $conn->close();
}

function createProduct($name, $description, $price, $category_id)
{
    $conn = dbConnect();

    $sql = "INSERT INTO `products` (`name`, `description`, `price`, `category_id`) VALUES ('$name', '$description', '$price', '$category_id')";

    $conn->query($sql);

    $conn->close();
}

function getAllCategories()
{
    $conn = dbConnect();

    $sql = "SELECT * FROM categories";

    $data = $conn->query($sql);

    $categories = $data->fetch_all(MYSQLI_ASSOC);

    $conn->close();

    return $categories;
}


function getAllProducts() // getAllProductsWithCategories
{
    $conn = dbConnect();

    // $sql = "SELECT * FROM products";
    //  انا عايز كل حاجه من المنتجات وكل حاجه من التصنيفات ونعمل دمج بين الاتنين عن طريق ال category _id
    $sql = "SELECT products.*, categories.name AS category_name
    FROM products
    INNER JOIN categories ON products.category_id = categories.id
    ";

    $data = $conn->query($sql);

    $categories = $data->fetch_all(MYSQLI_ASSOC);

    $conn->close();

    return $categories;
}

function getAllProductsTesting($category_id = null)
{
    $conn = dbConnect();

    $sql = "SELECT products.*, categories.name AS category_name
    FROM products
    INNER JOIN categories ON products.category_id = categories.id
    ";


    if ($category_id) {
        $sql .= " WHERE products.category_id = $category_id";
    }

    // if (!is_null($category_id)) {
    //     $sql .= " WHERE products.category_id = $category_id";
    // }

    $data = $conn->query($sql);

    $categories = $data->fetch_all(MYSQLI_ASSOC);

    $conn->close();

    return $categories;
}
