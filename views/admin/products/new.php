<h1 class="text-3xl font-bold mb-8 text-center text-gray-800">New product</h1>

<!-- Select product type -->
<form id="productTypeForm" class="mb-10">
    <label for="productType" class="block text-lg font-semibold mb-4 text-gray-700">Product type:</label>
    <select id="productType" name="productType" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">--Select--</option>
        <option value="music">Music</option>
        <option value="merchandise">Merchandise</option>
    </select>
</form>

<!-- Music form -->
<?php include 'forms/music_form.php'; ?>

<!-- Merchandise form -->
<div id="merchandiseForm" style="display:none;" class="mb-10">
    <h2 class="text-2xl mt-4 font-semibold text-gray-700 text-center">Coming soon...</h2>
</div>
