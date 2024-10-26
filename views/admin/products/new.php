<h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Add New Product</h1>
<form id="productTypeForm" class="mb-8">
    <label for="productType" class="block text-xl font-semibold mb-3 text-gray-700">Select Product Type:</label>
    <select id="productType" name="productType" onchange="showForm()" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">--Select--</option>
        <option value="music">Music</option>
        <option value="merchandise">Merchandise</option>
    </select>
</form>

<div id="musicForm" style="display:none;" class="mb-8">
    <form id="mainForm" action="/admin/products/savemusic" method="post" class="space-y-6">
        <div>
            <label for="artist" class="block text-xl font-semibold mb-2 text-gray-700">Artist name:</label>
            <input type="text" id="artist" name="artist" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <h2 class="block text-xl font-semibold mb-2 text-gray-700">Composer:</h2>
            <label for="firstname" class="block text-sm font-medium mb-2 text-gray-600">First name:</label>
            <input type="text" id="firstname" name="firstname" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <label for="lastname" class="block text-sm font-medium mb-2 text-gray-600">Last name:</label>
            <input type="text" id="lastname" name="lastname" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <label for="country" class="block text-sm font-medium mb-2 text-gray-600">Country:</label>
            <input type="text" id="country" name="country" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="button" onclick="addArtist()" class="mt-3 px-5 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add Artist</button>
        <ul id="artistList" class="mt-5 space-y-3"></ul>

        <div>
            <label class="block text-xl font-semibold mb-2 text-gray-700">Type:</label>
            <div class="flex items-center space-x-6">
                <div>
                    <input type="radio" id="single" name="type" value="single" checked onclick="toggleAlbumField(false)" class="mr-2">
                    <label for="single" class="text-gray-700">Single</label>
                </div>
                <div>
                    <input type="radio" id="album" name="type" value="album" onclick="toggleAlbumField(true)" class="mr-2">
                    <label for="album" class="text-gray-700">Album</label>
                </div>
            </div>
        </div>
        <div id="albumField" style="display:none;">
            <label for="albumTitle" class="block text-xl font-semibold mb-2 text-gray-700">Album Title:</label>
            <input type="text" id="albumTitle" name="albumTitle" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

            <div>
                <label for="trackAlbum" class="block text-xl font-semibold mb-2 text-gray-700">Track name:</label>
                <input type="text" id="trackAlbum" name="track" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <label for="artistSelectAlbum" class="block text-xl font-semibold mb-2 text-gray-700">Artist:</label>
                <select id="artistSelectAlbum" name="artistSelect" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">--Select Artist--</option>
                </select>

                <label for="trackFileAlbum" class="block text-xl font-semibold mb-2 text-gray-700">Track file:</label>
                <input type="file" id="trackFileAlbum" name="trackFile" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="button" onclick="addTrack()" class="mt-3 px-5 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add Track</button>

            <ul id="trackList" class="mt-5 space-y-3"></ul>
            
            <label for="albumFile" class="block text-xl font-semibold mb-2 text-gray-700">Album file (.zip):</label>
            <input type="file" id="albumFile" name="albumFile" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div id="singleField">
            <label for="trackSingle" class="block text-xl font-semibold mb-2 text-gray-700">Track name:</label>
            <input type="text" id="trackSingle" name="track" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label for="artistSelectSingle" class="block text-xl font-semibold mb-2 text-gray-700">Artist:</label>
            <select id="artistSelectSingle" name="artistSelect" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">--Select Artist--</option>
            </select>

            <label for="trackFileSingle" class="block text-xl font-semibold mb-2 text-gray-700">Track file:</label>
            <input type="file" id="trackFileSingle" name="trackFile" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <input type="submit" value="Submit" class="px-5 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
    </form>
</div>

<div id="merchandiseForm" style="display:none;" class="mb-8">
    <h2 class="text-xl font-semibold text-gray-700">Coming soon...</h2>
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

    function toggleAlbumField(show) {
        const albumField = document.getElementById('albumField');
        const singleField = document.getElementById('singleField');
        if (show) {
            albumField.style.display = 'block';
            singleField.style.display = 'none';
        } else {
            albumField.style.display = 'none';
            singleField.style.display = 'block';
        }
    }

    function addArtist() {
        const artistName = document.getElementById('artist').value;
        const firstname = document.getElementById('firstname').value;
        const lastname = document.getElementById('lastname').value;
        const country = document.getElementById('country').value;

        if (artistName.trim() === '' || firstname.trim() === '' || lastname.trim() === '' || country.trim() === '') return;

        const artistList = document.getElementById('artistList');
        const listItem = document.createElement('li');
        listItem.classList.add('flex', 'justify-between', 'items-center', 'p-3', 'border', 'border-gray-300', 'rounded-lg');
        listItem.innerHTML = `
            <span>${artistName} (${firstname} ${lastname}, ${country})</span>
            <button type="button" onclick="removeItem(this)" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Remove</button>
            <input type="hidden" name="artists[]" value="${artistName}">
            <input type="hidden" name="firstnames[]" value="${firstname}">
            <input type="hidden" name="lastnames[]" value="${lastname}">
            <input type="hidden" name="countries[]" value="${country}">
        `;
        artistList.appendChild(listItem);

        // Add artist to the dropdowns
        const artistSelectAlbum = document.getElementById('artistSelectAlbum');
        const artistSelectSingle = document.getElementById('artistSelectSingle');
        const option = document.createElement('option');
        option.value = artistName;
        option.text = artistName;
        artistSelectAlbum.appendChild(option.cloneNode(true));
        artistSelectSingle.appendChild(option);

        document.getElementById('artist').value = '';
        document.getElementById('firstname').value = '';
        document.getElementById('lastname').value = '';
        document.getElementById('country').value = '';
    }

    function addTrack() {
        const trackName = document.getElementById('trackAlbum').value;
        const artistName = document.getElementById('artistSelectAlbum').value;
        const trackFile = document.getElementById('trackFileAlbum').files[0];

        if (trackName.trim() === '' || artistName === '' || !trackFile) return;

        const trackList = document.getElementById('trackList');
        const listItem = document.createElement('li');
        listItem.classList.add('flex', 'justify-between', 'items-center', 'p-3', 'border', 'border-gray-300', 'rounded-lg');
        listItem.innerHTML = `
            <span>${trackName} (${trackFile.name})</span>
            <button type="button" onclick="removeItem(this)" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Remove</button>
            <input type="hidden" name="tracks[]" value="${trackName}">
            <input type="hidden" name="artistNames[]" value="${artistName}">
            <input type="hidden" name="trackFiles[]" value="${trackFile.name}">
        `;
        trackList.appendChild(listItem);

        document.getElementById('trackAlbum').value = '';
        document.getElementById('artistSelectAlbum').value = '';
        document.getElementById('trackFileAlbum').value = '';
    }

    function removeItem(button) {
        const listItem = button.parentElement;
        const artistName = listItem.querySelector('input[name="artists[]"]').value;

        // Remove artist from the dropdowns
        const artistSelectAlbum = document.getElementById('artistSelectAlbum');
        const artistSelectSingle = document.getElementById('artistSelectSingle');
        removeOption(artistSelectAlbum, artistName);
        removeOption(artistSelectSingle, artistName);

        listItem.remove();
    }

    function removeOption(selectElement, value) {
        const options = selectElement.options;
        for (let i = 0; i < options.length; i++) {
            if (options[i].value === value) {
                selectElement.remove(i);
                break;
            }
        }
    }
</script>