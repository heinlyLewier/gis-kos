<div class="row">
    <div class="col">
        <a name="" id="" class="btn btn-primary border-0 btn-sm float-right mb-3" style="background-color: #298505;" href="<?= site_url('terbaru'); ?>" role="button"> <i class="fas fa-external-link-alt"></i> Lihat Website</a>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card row border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Kos
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $list->num_rows(); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4 mx-2">
        <div class="card row border-0 h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah User
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= $total_user->num_rows(); ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4 border-0" style="min-height: 62vh;">
    <div class="card-body" id="map"></div>
</div>
<script>
    <?php if ($list->num_rows() > 0) { ?>
        //map view
        // console.log(location.coords.latitude, location.coords.longitude);
        var data = [
            <?php foreach ($list->result() as $key => $value) : ?> {
                    "loc": [<?= $value->latitude; ?>, <?= $value->longitude; ?>],
                    "title": "<?= $value->nama_kos; ?>, " + "<?= $value->kecamatan; ?>, " + "<?= $value->alamat_kos; ?>"
                },
            <?php endforeach; ?>
        ];

        var map = L.map('map', {
            zoom: 13,
            center: new L.latLng(data[0].loc),
            fullscreenControl: {
                pseudoFullscreen: false
            }
        }).setView([-3.693580, 128.181137], 13)

        map.addLayer(new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            minZoom: 13,
            attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly_lewier </small>'
        }));

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            minZoom: 13,
            attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly_lewier </small>'
        });

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 20,
            minZoom: 13,
            attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly_lewier </small>'
        });

        var baseMap = {
            'Light': osm,
            'Satelite': Esri_WorldImagery
        };
        L.control.layers(baseMap).addTo(map);

        var markersLayer = new L.LayerGroup(); //layer contain searched elements

        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 19,
            marker: false,
        });

        map.addControl(new L.Control.Search({
            layer: markersLayer,
            initial: false,
            zoom: 19,
            collapsed: true
        }));

        ////////////populate map with markers from sample data
        for (i in data) {
            var title = data[i].title, //value searched
                loc = data[i].loc, //position found
                marker = new L.Marker(new L.latLng(loc), {
                    title: title,
                }); //se property searched
            marker.bindPopup(title);
            markersLayer.addLayer(marker);
        }


        navigator.geolocation.getCurrentPosition(function(location) {
            var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
            <?php foreach ($list->result() as $key => $value) : ?>
                L.marker([<?= $value->latitude; ?>, <?= $value->longitude; ?>]).addTo(map)
                    .bindPopup(
                        '<?php if ($value->gambar1 != null) { ?>' +
                        '<img class="img-fluid mb-2" src="<?= base_url("uploads/kos/" . $value->gambar1); ?>"  style="object-fit: cover; width:100%; height:100px;" alt="">' +
                        '<?php } else { ?>' +
                        '<img class="img-thumbnail mb-2" src="<?= base_url("uploads/kos/default.jpg"); ?>" style="object-fit: cover; width:100%; height:100px;" alt="">' +
                        '<?php }  ?>' +
                        '<div class="row mr-5 col-md-12">' +
                        '<h6>' + '<?= $value->nama_kos; ?>' + '</h6>' + '</div>' + '<div class="row mr-5 col-md-12">' +
                        '<span>' + '<?= $value->alamat_kos; ?>, <?= $value->kecamatan; ?>' + '</span>' + '</div>' +
                        '<a href="<?= base_url('kos/detail/' . $value->id_kos); ?>" class="btn btn-sm btn-primary border-0 text-light mt-4" role=""button">' + '<i class= "fas fa-eye"></i> Detail' + '</a>' +
                        "<a href='https://www.google.com/maps/dir/?api=1&origin=" +
                        location.coords.latitude + "," + location.coords.longitude + "&destination=<?= $value->latitude ?>,<?= $value->longitude ?>' class='btn btn-sm btn-success border-0 text-light mt-4 mx-2' target='_blank' style='background-color:#298505'><i class= 'fas fa-route' ></i> Rute</a>"
                    );
            <?php endforeach; ?>
        });
    <?php } else { ?>

        var map = L.map('map', {
            zoom: 13,
            fullscreenControl: {
                pseudoFullscreen: false
            }
        }).setView([-3.693580, 128.181137], 13)

        map.addLayer(new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            minZoom: 13,
            attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly_lewier </small>'
        }));

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            minZoom: 13,
            attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly_lewier </small>'
        });

        var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            maxZoom: 20,
            minZoom: 13,
            attribution: '<small>&copy; Skripsi GIS Pemetaan Rumah Kos Kota Ambon 2023 | Design by heinly_lewier </small>'
        });

        var baseMap = {
            'Light': osm,
            'Satelite': Esri_WorldImagery
        };
        L.control.layers(baseMap).addTo(map);
    <?php } ?>
</script>