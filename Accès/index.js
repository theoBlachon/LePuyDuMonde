

const map = L.map('map').setView([45.0415, 3.8839], 15);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

const LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'img/shadow.png',
        iconSize:     [60, 60],
        shadowSize:   [50, 64],
        iconAnchor:   [20, 60],
        shadowAnchor: [4, 62],
        popupAnchor:  [-3, -76]
    }
});

const ParkIcon = L.Icon.extend({
    options: {
        iconSize:     [60, 60],
        shadowSize:   [50, 64],
        iconAnchor:   [30, 60],
        shadowAnchor: [20, 60],
        popupAnchor:  [-3, -76]
    }
});

const japonIcon = new LeafIcon({iconUrl: 'img/japon.png'});
const mexiqueIcon = new LeafIcon({iconUrl: 'img/mexique.png'});
const indeIcon = new LeafIcon({iconUrl: 'img/inde.webp'});
const egypteIcon = new LeafIcon({iconUrl: 'img/egypte.png'});
const parkIcon = new ParkIcon({iconUrl: 'img/parkicon.png'});
const gareIcon = new ParkIcon({iconUrl: 'img/gare.png'});

const mjapon = L.marker([45.0390, 3.883], {icon: japonIcon}).bindPopup('<b>Japon</b><br>Jardin Henry Vinay').addTo(map);
const mmexique = L.marker([45.0435, 3.881], {icon: mexiqueIcon}).bindPopup('<b>Mexique</b><br>Place du marché couvert').addTo(map);
const minde = L.marker([45.0432, 3.8840], {icon: indeIcon}).bindPopup('<b>Inde</b><br>Place de la Mairie').addTo(map);
const megypte = L.marker([45.0415, 3.8839], {icon: egypteIcon}).bindPopup('<b>Egypte</b><br>Place du Breuil').addTo(map);
const mpark = L.marker([45.0440, 3.8930], {icon: parkIcon}).bindPopup('Parking Pôle intermodal').addTo(map);
const mpark2 = L.marker([45.041, 3.8858], {icon: parkIcon}).bindPopup('Parking Michelet').addTo(map);
const mpark3= L.marker([45.0461, 3.8794], {icon: parkIcon}).bindPopup('Parking Place Carnot').addTo(map);
const mgare = L.marker([45.0430, 3.8925], {icon: gareIcon}).bindPopup('Gare').addTo(map);

