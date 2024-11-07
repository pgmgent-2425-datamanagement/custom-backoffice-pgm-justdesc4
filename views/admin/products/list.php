<a href="/admin" class="text-blue-500 hover:text-blue-700"> < Back to Admin Panel</a>

<h1 class="text-3xl text-center font-bold mb-6">Products</h1>

<div class="products mb-8">
    
    <!-- Search Form -->
    <div class="flex justify-between p-2 pb-0">
        <div class="flex gap-1">
            <form method="GET" action="/admin/products" class="mb-4">
                <input type="text" name="search" placeholder="Search products..." class="border p-2">
                <button type="submit" class="bg-blue-500 text-white p-2">Search</button>
            </form>

            <!-- Filter Form -->
            <form method="GET" action="/admin/products" class="mb-4">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">€</span>
                    <input type="number" id="max_price" name="max_price" placeholder="Max price" class="border p-2 pl-8" step="0.01">
                    <button type="submit" class="bg-blue-500 text-white p-2">Filter</button>
                </div>
            </form>
        </div>
        <!-- Add Product -->
        <a href="/admin/products/new" class="text-white text-lg mr-4 bg-blue-500 p-2 rounded-md hover:bg-blue-600">Add product</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
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