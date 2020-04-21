// mapboxgl.accessToken = 'pk.eyJ1IjoidGltZWxlMDYiLCJhIjoiY2s3eW5nam5vMDA4cDNkcXNueXJ1azJ1eiJ9.4Il3ukY5BZTuHZN5YNhq2A';
// // var map = new mapboxgl.Map({
// //   container: 'map',
// //   style: 'mapbox://styles/mapbox/streets-v11'
// // });

// // .setView([latitude, longitude], zoom);
// //     var layers = {
// //       Streets: L.mapbox.tileLayer('mapbox.streets'),
// //       Satellite: L.mapbox.tileLayer('mapbox.satellite')
// //     };
// // layers.Streets.addTo(map);
// // L.control.layers(layers).addTo(map);
// // L.marker([latitude, longitude], {
// //   icon: L.mapbox.marker.icon({
// //     'marker-size': 'large',
// //     'marker-symbol': 'lodging', //'building'
// //     'marker-color': '#0080c0'
// //   })
// // }).addTo(map);

// var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
// mapboxClient.geocoding.forwardGeocode({
//     query: address, //'Wellington, New Zealand',
//     countries: ['IE'],
//     autocomplete: false,
//     limit: 1
//   })
//   .send()
//   .then(function(response) {
//     if (  response &&
//           response.body &&
//           response.body.features &&
//           response.body.features.length
//         ) {
//       var feature = response.body.features[0];
    
//       var map = new mapboxgl.Map({
//         container: 'map',
//         style: 'mapbox://styles/mapbox/streets-v11',
//         center: feature.center,
//         zoom: 10
//       });
//       new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
//     }
//   }
// );