<h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Product</h1>

<form action="/admin/products/update/<?= $product->id ?>" method="post" enctype="multipart/form-data" class="space-y-6">
    <!-- Product Title -->
    <div>
        <label for="productTitle" class="block text-lg font-semibold mb-2 text-gray-700">Product Name:</label>
        <input type="text" id="productTitle" name="productTitle" value="<?= htmlspecialchars($product->title) ?>"
            class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required>
    </div>

    <!-- Description -->
    <div>
        <label for="productDescription" class="block text-lg font-semibold mb-2 text-gray-700">Description:</label>
        <textarea id="productDescription" name="productDescription"
            class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required><?= htmlspecialchars($product->description) ?></textarea>
    </div>

    <!-- Price -->
    <div>
        <label for="productPrice" class="block text-lg font-semibold mb-2 text-gray-700">Price:</label>
        <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">€</span>
            <input type="number" id="productPrice" name="productPrice" step="0.01"
                value="<?= htmlspecialchars($product->price) ?>"
                class="block w-full pl-10 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>
    </div>

    <!-- Image Upload -->
    <div>
        <label for="productImage" class="block text-lg font-semibold mb-2 text-gray-700">Image:</label>
        <input type="file" id="productImage" name="productImage" accept="image/*"
            class="block w-full p-4 border border-gray-300 rounded-md">
        <small class="text-gray-600">Current Image:
            <?= htmlspecialchars($product->image_path) ?>
        </small>
    </div>

    <!-- Update Button -->
    <div>
        <input type="submit" value="Update Product"
            class="mt-4 w-full py-4 bg-blue-500 text-white text-lg font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
    </div>
</form>