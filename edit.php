<?php include('../includes/header.php'); ?>
<div class="col-8 mx-auto">
    <h1 class="text-center p-3 my-2">
        Edit Product
    </h1>
    <form action="" class="form border p-3" method="POST">
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Price</label>
            <input type="number" name="price"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Description</label>
            <textarea name="description" rows="7"  class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="1">First Category</option>
                <option value="2">Second Category</option>
                <option value="3">Third Category</option>
            </select>
        </div>
        <div class="mb-3">
            <input type="submit" value="Save" class="form-control text-white bg-success">
        </div>
    </form>
</div>
<?php include('../includes/footer.php'); ?>