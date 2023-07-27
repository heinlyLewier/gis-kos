    var map = L.map('map', {
        fullscreenControl: {
            pseudoFullscreen: false
        }
    }).setView([-3.693580, 128.181137], 13)

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        minZoom: 13,
        attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly </small>'
    }).addTo(map);

    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        minZoom: 13,
        attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly </small>'
    });

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 20,
        minZoom: 13,
        attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly </small>'
    });

    var baseMap = {
        'Light': osm,
        'Satelite': Esri_WorldImagery
    };
    L.control.layers(baseMap).addTo(map);

    L.control.locate({
        strings: {
            title: "Lokasi saya"
        }
    }).addTo(map);