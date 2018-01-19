<style>
    #map{
        width: 100%;
        height: 100%;
    }
    .marker-icon{
        float: left;
        margin-right: 10px;
    }
</style>

<template>
    <div id="map"></div>
</template>

<script>     
    export default {
        props: {
            center: { type: Object },
            zoom:{ type: Number }, 
            markers: { type: Array }
        },
        data(){
            return {
                map: null
            }
        },
        mounted() {
            this.createMap();
        },
        watch: {
            markers(){
                this.renderMarkers();
            }
        },
        methods: {
            createMap() {
                this.map = new google.maps.Map(document.getElementById('map'), { center: this.center,zoom: this.zoom});
            },
            closeAllInfoWindows(){
                this.markers.forEach((marker) => {
                    if(marker.infowindow) {
                        marker.infowindow.close();
                    }
                });
            },
            renderMarkers() {
                this.markers.forEach((marker) => {
                    if(marker.instance) {
                        marker.instance.setMap(null);
                        marker.instance = undefined;
                    }
                });
                this.markers.forEach((marker) => {
                    let contentString =
                        '<div class="container">'+
                            '<h2>' +
                                '<a href="' + marker.title_link +'">' +
                                    '<img src="' + marker.icon + '" class="img-responsive marker-icon">' +
                                '</a>' +
                                marker.title +
                            '</h2>'+
                            '<div class="container">'+
                                '<p class="lead">' + marker.content +'</p>'+
                            '</div>'+
                        '</div>';
                    marker.infowindow = new google.maps.InfoWindow({ content: contentString });
                    marker.instance = new google.maps.Marker({
                        position: marker.position,
                        map: this.map,
                        title: marker.title,
                        icon: marker.icon
                    });
                    marker.instance.addListener('click', () => {
                        this.closeAllInfoWindows();
                        marker.infowindow.open(this.map, marker.instance);
                        this.map.setCenter(marker.position);
                    });
                });
            }
        }
    }
</script>
