

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

const japonIcon = new LeafIcon({iconUrl: 'img/japon.png'});
const mexiqueIcon = new LeafIcon({iconUrl: 'img/mexique.png'});
const indeIcon = new LeafIcon({iconUrl: 'img/inde.webp'});
const egypteIcon = new LeafIcon({iconUrl: 'img/egypte.png'});

const mjapon = L.marker([45.0390, 3.883], {icon: japonIcon}).bindPopup('Jardin Henry vinay').addTo(map);
const mmexique = L.marker([45.0435, 3.881], {icon: mexiqueIcon}).bindPopup('Place du marché couvert').addTo(map);
const minde = L.marker([45.0432, 3.8840], {icon: indeIcon}).bindPopup('Place de la Mairie').addTo(map);
const megypte = L.marker([45.0415, 3.8839], {icon: egypteIcon}).bindPopup('Place du Breuil').addTo(map);

