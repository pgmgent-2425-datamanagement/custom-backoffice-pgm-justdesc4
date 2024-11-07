<div id="editArtistForm" class="mb-10">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Artist</h1>
    <form id="editForm" action="/admin/artists/update" method="post" enctype="multipart/form-data" class="space-y-6">
        <!-- Hidden ID Field for Artist -->
        <input type="hidden" name="artist_id" value="<?= htmlspecialchars($artist->id) ?>">

        <!-- Artist Name -->
        <div>
            <label for="artist" class="block text-lg font-semibold mb-2 text-gray-700">Artist Name:</label>
            <input type="text" id="artist" name="artist" value="<?= htmlspecialchars($artist->artist_name) ?>"
                class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <!-- Composer Details -->
        <div class="space-y-4">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Composer:</h2>
            <div>
                <label for="firstname" class="block text-sm font-medium mb-2 text-gray-600">First Name:</label>
                <input type="text" id="firstname" name="firstname" value="<?= htmlspecialchars($artist->firstname) ?>"
                    class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div>
                <label for="lastname" class="block text-sm font-medium mb-2 text-gray-600">Last Name:</label>
                <input type="text" id="lastname" name="lastname" value="<?= htmlspecialchars($artist->lastname) ?>"
                    class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div>
                <label for="country" class="block text-sm font-medium mb-2 text-gray-600">Country:</label>
                <select id="country" name="country"
                    class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="">--Select Country--</option>
                </select>
            </div>
        </div>

        <!-- Save Changes Button -->
        <div>
            <input type="submit" value="Save Changes"
                class="mt-4 w-full py-4 bg-blue-500 text-white text-lg font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
        </div>
    </form>
</div>

<script>
  // Fetch country data and populate the dropdown
  fetch("https://restcountries.com/v3.1/all")
    .then((response) => response.json())
    .then((data) => {
      const countrySelect = document.getElementById("country");
      data.sort((a, b) => a.name.common.localeCompare(b.name.common));
      data.forEach((country) => {
        const option = document.createElement("option");
        option.value = country.cca2;
        option.text = country.name.common;
        if (country.cca2 === "<?= htmlspecialchars($artist->country) ?>") {
          option.selected = true;
        }
        countrySelect.appendChild(option);
      });
    })
    .catch((error) => console.error("Error fetching country data:", error));
</script>