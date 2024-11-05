<h1 class="text-3xl tex-center font-bold mb-4">Products</h1>

<div class="products mb-8">
    <a href="/admin/products/new" class="text-blue-500 hover:text-blue-700">Add Product</a>
    
    <!-- Search Form -->
    <form method="GET" action="/admin/products" class="mb-4">
        <input type="text" name="search" placeholder="Search products..." class="border p-2">
        <button type="submit" class="bg-blue-500 text-white p-2">Search</button>
    </form>

    <!-- Filter Form -->
    <form method="GET" action="/admin/products" class="mb-4">
        <input type="number" name="max_price" placeholder="Max price" class="border p-2" step="0.10">
        <button type="submit" class="bg-blue-500 text-white p-2">Filter</button>
    </form>

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