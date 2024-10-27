<h1 class="text-3xl font-bold mb-8 text-center text-gray-800">New product</h1>
<form id="productTypeForm" class="mb-10">
    <label for="productType" class="block text-lg font-semibold mb-4 text-gray-700">Product type:</label>
    <select id="productType" name="productType" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">--Select--</option>
        <option value="music">Music</option>
        <option value="merchandise">Merchandise</option>
    </select>
</form>

<div id="musicForm" style="display:none;" class="mb-10">
    <form id="mainForm" action="/admin/products/savemusic" method="post" class="space-y-6" enctype="multipart/form-data">
        <div class="space-y-6 border-solid border-2 border-black p-4 rounded-md">
            <h2 class="text-3xl font-semibold mb-2 text-gray-700">Artists:</h2>
            <label for="artist" class="block text-lg font-semibold mb-2 text-gray-700">Artist Name:</label>
            <input type="text" id="artist" name="artist" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        
        <div class="space-y-4">
            <h2 class="text-lg font-semibold mb-2 text-gray-700">Composer:</h2>
            <div>
                <label for="firstname" class="block text-sm font-medium mb-2 text-gray-600">First Name:</label>
                <input type="text" id="firstname" name="firstname" class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="lastname" class="block text-sm font-medium mb-2 text-gray-600">Last Name:</label>
                <input type="text" id="lastname" name="lastname" class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="country" class="block text-sm font-medium mb-2 text-gray-600">Country:</label>
                <select id="country" name="country" class="block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">--Select Country--</option>
                </select>
            </div>
        </div>

        <button type="button" id="addArtistButton" class="mt-4 mb-4 px-5 py-3 w-full cursor-pointer bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2">Save artist</button>
        <ul id="artistList" class="mt-5 space-y-3"></ul>

        <div>
            <label class="block text-lg font-semibold mb-2 text-gray-700">Type:</label>
            <div class="flex items-center space-x-8">
                <div >
                    <input type="radio" id="single" name="type" value="single" checked class="mr-2">
                    <label for="single" class="text-gray-700">Single</label>
                </div>
                <div>
                    <input type="radio" id="album" name="type" value="album" class="mr-2 ml-2">
                    <label for="album" class="text-gray-700">Album</label>
                </div>
            </div>
        </div>

        <div id="albumField" style="display:none;" class="space-y-6">
            <div class="space-y-6 border-solid border-2 border-black p-4 rounded-md">
                <h2 class="text-3xl font-semibold mb-2 text-gray-700">Tracks:</h2>
                <label for="trackAlbum" class="block text-lg font-semibold mb-2 text-gray-700">Track Name:</label>
                <input type="text" id="trackAlbum" name="track" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <label for="artistSelectAlbum" class="block text-lg font-semibold mt-4 mb-2 text-gray-700">Artists:</label>
                <p class="text-sm text-gray-600 mb-1">Select multiple artists by holding &lt;CTRL&gt; (&lt;Command&gt; on Mac).</p>
                <select id="artistSelectAlbum" name="artistSelectAlbum[]" multiple class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></select>

                <label for="trackFileAlbum" class="block text-lg font-semibold mt-4 mb-2 text-gray-700">Track File:</label>
                <input type="file" id="trackFileAlbum" name="trackFile" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" id="addTrackButton" class="mt-4 mb-4 px-5 py-3 w-full cursor-pointer bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2">Save track</button>

                <ul id="trackList" class="mt-5 space-y-3"></ul>

                <label for="pricePerTrack" class="block text-lg font-semibold mb-2 text-gray-700">Price per Track:</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">€</span>
                    <input type="number" id="productPrice" name="productPrice" step="0.01" value="0.00" class="block w-full pl-10 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div>
                <h2 class="text-3xl font-semibold mb-2 text-gray-700">Album info:</h2>
                <label for="albumTitle" class="block text-lg font-semibold mb-2 text-gray-700">Album Name:</label>
                <input type="text" id="albumTitle" name="albumTitle" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <label for="albumFile" class="block text-lg font-semibold mb-2 text-gray-700">Album File (.zip):</label>
                <input type="file" id="albumFile" name="albumFile" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div id="singleField" class="space-y-6 border-solid border-2 border-black p-4 rounded-md">
                <h2 class="text-3xl font-semibold mb-2 text-gray-700">Track:</h2>
                <label for="trackSingle" class="block text-lg font-semibold mb-2 text-gray-700">Track Name:</label>
                <input type="text" id="trackSingle" name="track" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <label for="trackFileSingle" class="block text-lg font-semibold mb-2 text-gray-700">Track File:</label>
                <input type="file" id="trackFileSingle" name="trackFile" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div id="productInfo" class="mt-6 space-y-6">
            <h2 class="text-3xl font-semibold mb-2 text-gray-700">Product info:</h2>
            <label for="productTitle" class="block text-lg font-semibold mb-2 text-gray-700">Product Name:</label>
            <input type="text" id="productTitle" name="productTitle" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <label for="productDescription" class="block text-lg font-semibold mb-2 text-gray-700">Description:</label>
            <textarea id="productDescription" name="productDescription" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            
            <label for="productPrice" class="block text-lg font-semibold mb-2 text-gray-700">Price:</label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">€</span>
                <input type="number" id="productPrice" name="productPrice" step="0.01" value="0.00" class="block w-full pl-10 p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <label for="productImage" class="block text-lg font-semibold mb-2 text-gray-700">Image:</label>
            <input type="file" id="productImage" name="productImage" class="block w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <input type="submit" value="Save product" class="mt-4 w-full py-4 bg-blue-500 text-white text-lg font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
    </form>
</div>
</div>

<div id="merchandiseForm" style="display:none;" class="mb-10">
    <h2 class="text-2xl mt-4 font-semibold text-gray-700 text-center">Coming soon...</h2>
</div>
