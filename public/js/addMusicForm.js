(function () {
  const productTypeSelect = document.getElementById("productType");
  const musicForm = document.getElementById("musicForm");
  const merchandiseForm = document.getElementById("merchandiseForm");
  const albumField = document.getElementById("albumField");
  const singleField = document.getElementById("singleField");
  const artistList = document.getElementById("artistList");
  const artistSelectAlbum = document.getElementById("artistSelectAlbum");
  const artistSelectSingle = document.getElementById("artistSelectSingle");
  const trackList = document.getElementById("trackList");

  // Event Listeners
  productTypeSelect.addEventListener("change", showForm);
  document
    .getElementById("addArtistButton")
    .addEventListener("click", addArtist);
  document.getElementById("addTrackButton").addEventListener("click", addTrack);
  document
    .getElementById("single")
    .addEventListener("change", () => toggleAlbumField(false));
  document
    .getElementById("album")
    .addEventListener("change", () => toggleAlbumField(true));

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

  // Toggle album/single fields
  function toggleAlbumField(show) {
    albumField.style.display = show ? "block" : "none";
    singleField.style.display = show ? "none" : "block";
  }

  // Add artist to the artist list and dropdowns
  function addArtist() {
    const artistName = document.getElementById("artist").value.trim();
    const firstname = document.getElementById("firstname").value.trim();
    const lastname = document.getElementById("lastname").value.trim();
    const country = document.getElementById("country").value.trim();

    if (!artistName || !firstname || !lastname || !country) return;

    const listItem = document.createElement("li");
    listItem.classList.add(
      "flex",
      "justify-between",
      "items-center",
      "p-3",
      "border",
      "border-gray-300",
      "rounded-lg"
    );
    listItem.innerHTML = `
                    <span>${artistName} (${firstname} ${lastname}, ${country})</span>
                    <button type="button" class="remove-btn px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Remove</button>
                    <input type="hidden" name="artists[]" value="${artistName}">
                    <input type="hidden" name="firstnames[]" value="${firstname}">
                    <input type="hidden" name="lastnames[]" value="${lastname}">
                    <input type="hidden" name="countries[]" value="${country}">
            `;
    artistList.appendChild(listItem);

    addArtistToDropdowns(artistName);

    // Clear inputs
    document.getElementById("artist").value = "";
    document.getElementById("firstname").value = "";
    document.getElementById("lastname").value = "";
    document.getElementById("country").value = "";

    listItem
      .querySelector(".remove-btn")
      .addEventListener("click", () => removeItem(listItem, artistName));
  }

  // Add artist to both dropdowns
  function addArtistToDropdowns(artistName) {
    const option = document.createElement("option");
    option.value = artistName;
    option.text = artistName;
    artistSelectAlbum.appendChild(option.cloneNode(true));
    artistSelectSingle.appendChild(option);
  }

  // Add track to the track list
  function addTrack() {
    const trackName = document.getElementById("trackAlbum").value.trim();
    const artistSelect = Array.from(
      document.getElementById("artistSelectAlbum").selectedOptions
    );
    const trackFile = document.getElementById("trackFileAlbum").files[0];

    if (!trackName || artistSelect.length === 0 || !trackFile) return;

    const artistNames = artistSelect.map((option) => option.value);

    const listItem = document.createElement("li");
    listItem.classList.add(
      "flex",
      "justify-between",
      "items-center",
      "p-3",
      "border",
      "border-gray-300",
      "rounded-lg"
    );
    listItem.innerHTML = `
                    <span>${trackName} (${trackFile.name})</span>
                    <button type="button" class="remove-btn px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Remove</button>
                    <input type="hidden" name="tracks[]" value="${trackName}">
                    <input type="hidden" name="trackFiles[]" value="${
                      trackFile.name
                    }">
                    ${artistNames
                      .map(
                        (artist) =>
                          `<input type="hidden" name="artistNames[${trackName}][]" value="${artist}">`
                      )
                      .join("")}
            `;
    trackList.appendChild(listItem);

    listItem
      .querySelector(".remove-btn")
      .addEventListener("click", () => listItem.remove());

    // Clear inputs
    document.getElementById("trackAlbum").value = "";
    document.getElementById("artistSelectAlbum").value = "";
    document.getElementById("trackFileAlbum").value = "";
  }

  // Remove artist from the list and dropdowns
  function removeItem(listItem, artistName) {
    removeOption(artistSelectAlbum, artistName);
    removeOption(artistSelectSingle, artistName);
    listItem.remove();
  }

  // Remove option from a dropdown
  function removeOption(selectElement, value) {
    const options = selectElement.options;
    for (let i = 0; i < options.length; i++) {
      if (options[i].value === value) {
        selectElement.remove(i);
        break;
      }
    }
  }

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
        countrySelect.appendChild(option);
      });
    })
    .catch((error) => console.error("Error fetching country data:", error));
})();
