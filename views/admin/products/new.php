
<?php
// Form handling logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $album_id = $_POST['album_id'] ?? '';
    $track_id = $_POST['track_id'] ?? '';

    if (!empty($album_id) && !empty($track_id)) {
        // Both album and track are selected, show an error
        $error = "You can only select either an album or a track, not both.";
    } elseif (empty($album_id) && empty($track_id)) {
        // Neither album nor track is selected, show an error
        $error = "You must select either an album or a track.";
    } else {
        // Album or track is selected, continue with the form submission
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $release_date = $_POST['release_date'];
        $stock = $_POST['stock'];

        $image_path = $_FILES['image_path']['name'];
        $image_path_tmp = $_FILES['image_path']['tmp_name'];

        $image_path = time() . '_' . $image_path;

        move_uploaded_file($image_path_tmp, 'images/' . $image_path);

        $query = "INSERT INTO product (title, description, image_path, price, release_date, stock, album_id, track_id) VALUES (:title, :description, :image_path, :price, :release_date, :stock, :album_id, :track_id)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'image_path' => $image_path,
            'price' => $price,
            'release_date' => $release_date,
            'stock' => $stock,
            'album_id' => $album_id,
            'track_id' => $track_id
        ]);

        header('Location: /admin');
    }
}
?>
<a href="/admin" class="text-blue-500 hover:text-blue-700 font-semibold">Go back</a>
<h1 class="text-3xl font-bold mb-4">New Product</h1>
<form action="/admin/products/create" method="POST" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
        <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
        <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
    </div>
    <div class="mb-4">
        <label for="image_path" class="block text-gray-700 font-bold mb-2">Image:</label>
        <input type="file" name="image_path" id="image_path" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
        <input type="number" name="price" id="price" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="release_date" class="block text-gray-700 font-bold mb-2">Release date:</label>
        <input type="date" name="release_date" id="release_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="stock" class="block text-gray-700 font-bold mb-2">Stock:</label>
        <input type="number" name="stock" id="stock" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-4">
        <label for="album_id" class="block text-gray-700 font-bold mb-2">Album release:</label>
        <select name="album_id" id="album_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <option value="" selected disabled>Select an album</option>
            <?php foreach($albums as $album) : ?>
                <option value="<?= $album->id ?>"><?= $album->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="track_id" class="block text-gray-700 font-bold mb-2">Single release:</label>
        <select name="track_id" id="track_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        <option value="" selected disabled>Select a track</option>
            <?php foreach($tracks as $track) : ?>
                <option value="<?= $track->id ?>"><?= $track->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add Product
        </button>
    </div>
</form>