<div id="mapdiv" style="width: 100%; height: 370px;"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/ammap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/maps/js/worldLow.js"></script>
<script>
AmCharts.ready(function() {
    map = new AmCharts.AmMap();
    map.pathToImages = "http://www.ammap.com/lib/3/images/";
    //map.panEventsEnabled = true; // this line enables pinch-zooming and dragging on touch devices
    map.balloon.color = "#000000";

    var dataProvider = {
        mapVar: AmCharts.maps.worldLow,
        getAreasFromMap: true
    };

    map.dataProvider = dataProvider;

    map.areasSettings = {
        autoZoom: true,
        selectedColor: "#CC0000"
    };

    map.smallMap = new AmCharts.SmallMap();

    map.write("mapdiv");
});

</script>