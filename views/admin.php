<h1 class="text-3xl font-bold mb-4">Admin Panel - High Bass Audio</h1>

<div class="products mb-8">
    <h2 class="text-2xl font-semibold mb-2">Products</h2>
    <a href="/admin/products/new" class="text-blue-500 hover:text-blue-700">Add Product</a>
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="text-start py-2 px-4 border-b">Image</th>
                <th class="text-start py-2 px-4 border-b">Title</th>
                <th class="text-start py-2 px-4 border-b">Price</th>
                <th class="text-start py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_reverse($products) as $product): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-r">
                        <img src="/images/<?= $product->image_path ?>" alt="<?= $product->title ?>" class="max-w-24">
                    </td>
                    <td class="py-2 px-4 border-b border-r"><?= $product->title ?></td>
                    <td class="py-2 px-4 border-b border-r">€ <?= $product->price ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="/admin/products/edit/<?= $product->id ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <form action="/admin/products/delete/<?= $product->id ?>" method="POST" style="display:inline;">
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>