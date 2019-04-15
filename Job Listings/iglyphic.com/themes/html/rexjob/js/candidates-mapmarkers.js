jQuery(document).ready(function () {
   'use strict';
    /** =====================================
    * Counter
    * =====================================***/
    if( $('#gmap-list').length){
        //dropdown example
        var LocsA = [
            {
                lat: 40.705859,
                lon: -73.943288,
                title: 'Title A1',
                html: 'Mc Carren Park',
                icon: 'images/map-marker.png',
                animation: google.maps.Animation.DROP
            },
            {
                lat: 40.7102875,
                lon: -73.9360566,
                title: 'Title A1',
                html: 'Mc Carren Park',
                icon: 'images/map-marker.png',
                animation: google.maps.Animation.DROP
            },
            {
                lat: 40.702651,
                lon: -73.9505196,
                title: 'Title B1',
                icon: 'images/map-marker.png',
                show_infowindow: true ,
                animation: google.maps.Animation.DROP
            },
            {
                lat: 40.7014309,
                lon: -73.9461208,
                title: 'Title C1',
                html: 'Flushing Avenue2',
                zoom: 8,
                icon: 'images/map-marker.png',
                animation: google.maps.Animation.DROP
            },
            {
                lat: 40.7054309,
                lon: -73.9601208,
                title: 'Title C2',
                html: 'Morgan Avenue Subway',
                zoom: 8,
                icon: 'images/map-marker.png',
                animation: google.maps.Animation.DROP
            },
            {
                lat: 40.707859,
                lon: -73.935788,
                title: 'Title C2',
                html: 'Morgan Avenue Subway',
                zoom: 8,
                icon: 'images/map-marker.png',
                animation: google.maps.Animation.DROP
            },
            {
                lat: 40.707859,
                lon: -73.952788,
                title: 'Title C2',
                html: 'Morgan Avenue Subway',
                zoom: 8,
                icon: 'images/map-marker.png',
                animation: google.maps.Animation.DROP
            },
        ];
        //ul list example
        new Maplace({
            locations: LocsA,
            map_div: '#gmap-list',
            controls_type: 'list',
            controls_on_map:false,
            stroke_options:{
                strokeColor: '#cbe6a3',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#f3f1e9',
                fillOpacity: 0.4
            },
            map_options:{
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 16
            },
            controls_title: 'Choose a location:'
        }).Load();
    }
});
