L.Control.Overview = L.Control.extend({

    // In order to keep the overview map in sync with the main map, each layer
    // must have a 'name' attribute
    //
    // e.g. var osm = L.tileLayer('http://...', name: 'osm', attribution: ...)
    onAdd: function (map) {
        this._map = map;
        this._layers = [];

        for (var idx in map._layers) {
            if (map._layers.hasOwnProperty(idx)) {
                var layer = map._layers[idx];
                if (layer._url) {
                    this._layers.push(new L.tileLayer(layer._url, {name: layer.name + '$overview$' + idx}));
                }
            }
        }

        this._initLayout();
        this._update();

        map.on('moveend', this._update, this);

        return this._container;
    },

    onRemove: function (map) {
        map.off('moveend', this._update, this);
    },

    _initLayout: function () {
        var container = this._container = L.DomUtil.create('div', 'leaflet-control-overview'),
            mapDiv = L.DomUtil.create('div', 'leaflet-control-overview-map', container);

        var overview = this._overview = new L.Map(mapDiv, {
            layers: this._layers,
            dragging: this.options.dragging || false,
            touchZoom: false,
            scrollWheelZoom: false,
            doubleClickZoom: false,
            boxZoom: false,
            zoomControl: false,
            attributionControl: false
        });

        var rectangle = this._rectangle = new L.Rectangle(this._map.getBounds(), {weight: 2, clickable: false, color: '#4183c4'});
        overview.addLayer(rectangle);

        if (typeof(this.options.onAfterInitLayout) == 'function') {
            this.options.onAfterInitLayout(overview);
        }

        setTimeout(function () {
            overview.invalidateSize();
        }); // hack
    },

    _update: function () {
        var zoomDifference = this.options.zoomDifference || 6;
        var center = this._map.getCenter(), zoom = Math.max(this._map.getZoom() - zoomDifference, 0);
        this._overview.setView(center, zoom);
        this._rectangle.setBounds(this._map.getBounds());
    }
});

L.control.overview = function (options) {
    return new L.Control.Overview(options);
};