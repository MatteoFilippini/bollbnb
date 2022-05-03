let center = [14.02761, 37.59107]
const map = tt.map({
    key: "Mkf8SDlv7IXjC285PFjO8O6lFhDYeFdx",
    container: "map",
    center: center,
    zoom: 10
})
map.on('load', () => {
    new tt.Marker().setLngLat(center).addTo(map)
})