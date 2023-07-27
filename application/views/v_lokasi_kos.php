<div class="row">
    <div class=" col-md-12">
        <a name="" id="" class="border-0 mb-3 d-md-block d-none" style="position: fixed;
width: 60px;
height: 60px;
bottom: 20px;
right: 40px;
background-color: #E74A3B;
color: #fff;
border-radius: 50px;
text-align: center;
font-size: 30px;
box-shadow: 2px 0px 5px #000;
z-index: 100;" href="<?= site_url('terbaru'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true" style="margin-top: 16px;"></i></a>
    </div>
</div>
<div class="card min-vh-100 border-0" style="margin-top: 50px;">
    <div class="card-body" id="map"></div>
</div>
<script>
    var map = L.map('map', {
        fullscreenControl: {
            pseudoFullscreen: false
        }
    }).setView([-3.693580, 128.181137], 13)

    var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        minZoom: 19,
        attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos di Kota Ambon 2023 | Design by heinly_lewier</small>'
    }).addTo(map);

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 19,
        minZoom: 19,
        attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos di Kota Ambon 2023 | Design by heinly_lewier</small>'
    });

    var baseMap = {
        'Light': osm,
        'Satelite': Esri_WorldImagery
    };
    L.control.layers(baseMap).addTo(map);

    navigator.geolocation.getCurrentPosition(function(location) {
        var marker = L.marker([<?= $list->latitude; ?>, <?= $list->longitude; ?>]).addTo(map);
        marker.bindPopup(
            '<h6 class="mb-0">' + '<?= $list->latitude; ?>,' + '<?= $list->longitude; ?>' + '</h6>' +
            "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
            location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $list->latitude ?>,<?= $list->longitude ?>' class='btn btn-sm border-0 btn-success text-light mt-2' target='_blank' style='background-color:#298505' ><i class= 'fas fa-route' ></i> Rute</a>"
        ).openPopup();
    });
</script>