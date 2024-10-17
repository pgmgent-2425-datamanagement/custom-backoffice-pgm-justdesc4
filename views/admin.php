<h1>Admin Panel - High Bass Audio</h1>

<div class="products">
    <h2>Products</h2>
    <a href="/admin/products/add">Add Product</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->id ?></td>
                    <td><?= $product->title ?></td>
                    <td><?= $product->price ?></td>
                    <td>
                        <a href="/admin/products/edit/<?= $product->id ?>">Edit</a>
                        <a href="/admin/products/delete/<?= $product->id ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="tracks">

</div>