//inotializing the map
const targetZone = document.querySelector("#map");
const latitude = 50.8144;
const longitude = 4.8855;
const map = L.map('map', {
    center: [latitude, longitude],
    zoom: 19,
})

const items = [];

//get map from osm
L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxNativeZoom: 19,
    maxZoom: 25,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

//check which type of item was dropped by user
document.querySelector(".items").addEventListener("mousedown", (e) => {
    removeActive();
    e.target.classList.add("active");
});

//remove active class
removeActive = () => {
    let items = document.querySelectorAll(".item");
    for (let i = 0; i < items.length; i++) {
        items[i].classList.remove("active");
    }
}

//drop new instance of image on the map
targetZone.ondragover = (e) => {
    e.preventDefault()
    e.dataTransfer.dropEffect = "move"
}
targetZone.ondrop = (e) => {
    e.preventDefault()

    itemType = document.querySelector(".active").dataset.itemType

    imagePath = e.dataTransfer.getData("text/plain")
    newIcon = L.icon({
        iconUrl: imagePath,
        iconSize: [50, 50]
    })

    coordinates = map.mouseEventToLatLng(e);
    //console.log(coordinates + itemType)
    newMarker = L.marker(coordinates, {
        icon: newIcon,
        draggable: true,
    }).addTo(map)
    items.push({ "coordinates": coordinates, "itemType": itemType })
    //console.log(items);
    removeActive();
}

saveItems = () => {
    console.log(items);
}

document.querySelector(".saveBtn").addEventListener("click", saveItems);