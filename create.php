<?php include('../includes/header.php'); ?>
<?php include('../../classes/Session.php'); ?>
<div class="col-8 mx-auto">
    <h1 class="text-center p-3 my-2">
        Add Product
    </h1>

    <?php if (Session::checkSession('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= Session::getSession('success') ?>
        </div>
    <?php endif ?>

    <?php if (Session::checkSession('errors')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= Session::getSession('errors') ?>
        </div>
    <?php endif ?>

    <form action="<?= route('dashboard/controllers/products/createProductController.php') ?>" class="form border p-3" method="POST">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Price</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Description</label>
            <textarea name="description" rows="7" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id" id="" class="form-control">
                <?php foreach (getAllCategories() as $category) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="form-control text-white bg-success">
        </div>
    </form>
</div>
<?php include('../includes/footer.php'); ?>