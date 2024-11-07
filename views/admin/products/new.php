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
<?php include 'forms/merchandise_form.php'; ?>

<script>
  const musicForm = document.getElementById("musicForm");
  const merchandiseForm = document.getElementById("merchandiseForm");
  const productTypeSelect = document.getElementById("productType");

  // Event listener
  productTypeSelect.addEventListener("change", showForm);

  // Show form based on selected product type
  function showForm() {
    const productType = productTypeSelect.value;
    musicForm.style.display = "none";
    merchandiseForm.style.display = "none";

    if (productType === "music") {
      musicForm.style.display = "block";
    } else if (productType === "merchandise") {
      merchandiseForm.style.display = "block";
    }
  }
</script>