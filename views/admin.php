<h1 class="text-3xl font-bold mb-4">Admin Panel - High Bass Audio</h1>

<div class="tracks">
    <h2 class="text-2xl font-semibold mb-2">Tracks</h2>
    <a href="/admin/tracks/new" class="text-blue-500 hover:text-blue-700">Add Track</a>
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr >
                <th class="text-start
                py-2 px-4 border-b">Title</th>
                <th class="text-start py-2 px-4 border-b">Duration</th>
                <th class="text-start py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach ($tracks as $track): ?>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b border-r"><?= $track->title ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= $track->duration ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="/admin/tracks/edit/<?= $track->id ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="/admin/tracks/delete/<?= $track->id ?>" class="text-red-500 hover:text-red-700 ml-2">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="products mb-8">
    <h2 class="text-2xl font-semibold mb-2">Products</h2>
    <a href="/admin/products/new" class="text-blue-500 hover:text-blue-700">Add Product</a>
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr >
                <th class="text-start py-2 px-4 border-b">Image</th>
                <th class="text-start py-2 px-4 border-b">Title</th>
                <th class="text-start py-2 px-4 border-b">Price</th>
                <th class="text-start py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b border-r">
                        <img src="/images/<?= $product->image_path ?>" alt="<?= $product->title ?>" class="max-w-24">
                    </td>
                    <td class="py-2 px-4 border-b border-r"><?= $product->title ?></td>
                    <td class="py-2 px-4 border-b border-r">€ <?= $product->price ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="/admin/products/edit/<?= $product->id ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="/admin/products/delete/<?= $product->id ?>" class="text-red-500 hover:text-red-700 ml-2">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

