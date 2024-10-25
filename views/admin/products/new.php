<h1 class="text-2xl font-bold mb-4">Add New Product</h1>
<form id="productTypeForm" class="mb-6">
    <label for="productType" class="block text-lg font-medium mb-2">Select Product Type:</label>
    <select id="productType" name="productType" onchange="showForm()" class="block w-full p-2 border border-gray-300 rounded-md">
        <option value="">--Select--</option>
        <option value="music">Music</option>
        <option value="merchandise">Merchandise</option>
    </select>
</form>

<div id="musicForm" style="display:none;" class="mb-6">
        <form action="add_artist.php" method="post">
                <label for="artist" class="block text-lg font-medium mb-1">Artist name:</label>
                <input type="text" id="artist" name="artist" required class="block w-full p-2 border border-gray-300 rounded-md">
                <h2 class="block text-lg font-medium mb-1">Composer:</h2>
                <label for="firstname">Firstname:</label>
                <input type="text" id="firstname" name="firstname" required class="block w-full p-2 border border-gray-300 rounded-md">
                <label for="lastname">Lastname:</label>
                <input type="text" id="lastname" name="lastname" required class="block w-full p-2 border border-gray-300 rounded-md">
                <label for="country">Country:</label>
                <input type="text" id="country" name="country" required class="block w-full p-2 border border-gray-300 rounded-md">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Artist</button>
        </form>
        <form action="add_music.php" method="post" class="space-y-4">
        <div>
            <label for="track" class="block text-lg font-medium mb-1">Track name:</label>
            <input type="text" id="track" name="track" required class="block w-full p-2 border border-gray-300 rounded-md">
            
            <label for="artistSelect" class="block text-lg font-medium mb-1">Artist:</label>
            <select id="artistSelect" name="artistSelect" required class="block w-full p-2 border border-gray-300 rounded-md">
            <option value="">--Select Artist--</option>
            <?php foreach ($artists as $artist): ?>
            <option value="<?php echo $artist->id; ?>"><?php echo $artist->artist_name; ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <input type="submit" value="Add Music" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
    </form>
</div>

<div id="merchandiseForm" style="display:none;" class="mb-6">
    <h2>Coming soon...</h2>
</div>

<script>
    function showForm() {
        const productType = document.getElementById('productType').value;
        document.getElementById('musicForm').style.display = 'none';
        document.getElementById('merchandiseForm').style.display = 'none';

        switch (productType) {
            case 'music':
            document.getElementById('musicForm').style.display = 'block';
            break;
            case 'merchandise':
            document.getElementById('merchandiseForm').style.display = 'block';
            break;
        }
    }
</script>