<h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Add New Product</h1>
<form id="productTypeForm" class="mb-8">
    <label for="productType" class="block text-xl font-semibold mb-3 text-gray-700">Select Product Type:</label>
    <select id="productType" name="productType" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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
            <select id="country" name="country" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">--Select Country--</option>
</select>
        </div>
        <button type="button" id="addArtistButton" class="mt-3 px-5 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add Artist</button>
        <ul id="artistList" class="mt-5 space-y-3"></ul>

        <div>
            <label class="block text-xl font-semibold mb-2 text-gray-700">Type:</label>
            <div class="flex items-center space-x-6">
                <div>
                    <input type="radio" id="single" name="type" value="single" checked class="mr-2">
                    <label for="single" class="text-gray-700">Single</label>
                </div>
                <div>
                    <input type="radio" id="album" name="type" value="album" class="mr-2">
                    <label for="album" class="text-gray-700">Album</label>
                </div>
            </div>
        </div>
        <div id="albumField" style="display:none;">
            <div>
                <h2 class="block text-xl font-semibold mb-2 text-gray-700">Tracks:</h2>
                <label for="trackAlbum" class="block text-xl font-semibold mb-2 text-gray-700">Track name:</label>
                <input type="text" id="trackAlbum" name="track" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <label for="artistSelectAlbum" class="block text-xl font-semibold mb-2 text-gray-700">Artist:</label>
                <select id="artistSelectAlbum" name="artistSelectAlbum[]" multiple class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">--Select Artist--</option>
                </select>

                <label for="trackFileAlbum" class="block text-xl font-semibold mb-2 text-gray-700">Track file:</label>
                <input type="file" id="trackFileAlbum" name="trackFile" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="button" id="addTrackButton" class="mt-3 px-5 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">Add Track</button>

            <ul id="trackList" class="mt-5 space-y-3"></ul>

            <h2 class="block text-xl font-semibold mb-2 text-gray-700">Album info:</h2>

            <label for="albumTitle" class="block text-xl font-semibold mb-2 text-gray-700">Album Title:</label>
            <input type="text" id="albumTitle" name="albumTitle" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label for="albumFile" class="block text-xl font-semibold mb-2 text-gray-700">Album file (.zip):</label>
            <input type="file" id="albumFile" name="albumFile" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div id="singleField">
            <h2 class="block text-xl font-semibold mb-2 text-gray-700">Track:</h2>
            <label for="trackSingle" class="block text-xl font-semibold mb-2 text-gray-700">Track name:</label>
            <input type="text" id="trackSingle" name="track" class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <label for="artistSelectSingle" class="block text-xl font-semibold mb-2 text-gray-700">Artist:</label>
            <select id="artistSelectSingle" name="artistSelectSingle[]" multiple class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
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