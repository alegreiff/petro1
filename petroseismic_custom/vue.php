<div class="app">
   <div class="contenedor_mapa">
    <div class="layout">
        <div id="paises_mapa" class="col col-mapa"></div>
        <div class="col col-datosmapa">
          <div id="informapa" v-cloak>
          <ul v-if="allempresas">
          <li v-for="empresa in allempresas"> {{ empresa.cliente}} </li>
          </ul>
          
          </div>
          <ul v-if="empresas" v-cloak>
              <li v-for="item in empresas">
                <b>{{item.anio}}</b> {{item.cliente}} - {{item.objeto}}
              </li>
          </ul>
          <!-- <div><pre>{{ logos_empresas }}</pre></div> -->
          <span v-for="item in logos_empresas" class="spanimage">
              <img :src="'<?php echo get_stylesheet_directory_uri(); ?>/petroseismic_custom/logoempresas/'+item.logo+'.jpg'" alt="" class="logomini">
          </span>
        </div>
      </div>
   </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.3/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alasql/0.4.3/alasql.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/ammaps/3.13.0/ammap.js"></script>-->
<!--
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>  
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>  
-->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>


<script>

var y = "<?php echo get_stylesheet_directory_uri(); ?>/petroseismic_custom/datosmapa.json";

    $.getJSON( y, function( data ) {
      console.log(data);
      this.j = data;
    });


var app = new Vue({
  el: '.app',
  data: {
    nombre: 'Petroseismic Services',
    idioma: 'es',
    servicios: '',
    MENU: '',
    mapacontratos: '',
    dato_mapa: '',
    empresas: '',
    logos_empresas: '',
    allempresas: '',
    j: null,
  },
  mounted: function () {
    var t = '[{"numero":"24","cliente":"CANACOL","contrato":"CNE-025-2016","objeto":"LLA23 3D","departamento":"CAS","f1":"2-sep.-16","f2":"En ejecución","d2":"","d3":"138","anio":"2016","logo":"canacol"},{"numero":"25","cliente":"CANACOL","contrato":"CNE-019-2016","objeto":"CHANDÉ 3D","departamento":"SUC,BOL","f1":"2-sep.-16","f2":"En ejecución","d2":"","d3":"141","anio":"2016","logo":"canacol"},{"numero":"26","cliente":"CANACOL","contrato":"","objeto":"CORRALERO 3D","departamento":"COR","f1":"2-sep.-16","f2":"En ejecución","d2":"","d3":"41","anio":"2016","logo":"canacol"},{"numero":"20","cliente":"DRUMMOND USA","contrato":"CDUSA-7500000008","objeto":"CESAR RANCHERÍA 2D","departamento":"CES,LAG","f1":"20-abr-15","f2":"En ejecución","d2":"400","d3":"","anio":"2016","logo":"drummond"},{"numero":"23","cliente":"ECOPETROL","contrato":"5227282","objeto":"CARDÓN 2D","departamento":"CAQ","f1":"4-abr-16","f2":"En ejecución","d2":"228","d3":"","anio":"2016","logo":"ecopetrol"},{"numero":"22","cliente":"EMERALD ENERGY","contrato":"6878","objeto":"NOGAL 2D","departamento":"CAQ","f1":"1-mar.-16","f2":"En ejecución","d2":"90","d3":"","anio":"2016","logo":"ee"},{"numero":"21","cliente":"AGENCIA NACIONAL DE HIDROCARBUROS","contrato":"229-2015","objeto":"PROGRAMA SISMICO REGIONAL PAILITAS 2015","departamento":"CES,MAG","f1":"27-ago.-15","f2":"31-dic-15","d2":"596","d3":"","anio":"2015","logo":"anh"},{"numero":"19","cliente":"MANSAROVAR ENERGY COLOMBIA LIMITED","contrato":"-","objeto":"LLANOS 69 PRUEBA EXPERIMENTAL","departamento":"CUN","f1":"2-dic-14","f2":"31-ene-15","d2":5.7,"d3":"","anio":"2015","logo":"mansarovar"},{"numero":"17","cliente":"ECOPETROL","contrato":"MA-0030689","objeto":"SILVESTRE 2D","departamento":"LAG","f1":"10-oct-13","f2":"ago-14","d2":"451","d3":"","anio":"2014","logo":"ecopetrol"},{"numero":"18","cliente":"EMERALD ENERGY","contrato":"6878","objeto":"MANZANO 2D","departamento":"CAQ","f1":"1-ago.-14","f2":"31-dic-14","d2":"61","d3":"","anio":"2014","logo":"ee"},{"numero":"16","cliente":"HOCOL S.A.","contrato":"C130205","objeto":"LLANOS 65 3D","departamento":"MET","f1":"10-ene-14","f2":"25-abr-14","d2":"","d3":"144","anio":"2014","logo":"hocol"},{"numero":"14","cliente":"TELPICO","contrato":"1","objeto":"VSM22-3D","departamento":"HUI","f1":"7-may.-13","f2":"8-abr-14","d2":"","d3":"158.6","anio":"2014","logo":"telpico"},{"numero":"12","cliente":"CEPCOLSA","contrato":"3107001053","objeto":"SIRUNI 2D","departamento":"VID","f1":"15-ene-13","f2":"15-abr-13","d2":"580.6","d3":"","anio":"2013","logo":"cepcolsa"},{"numero":"15","cliente":"CEPCOLSA","contrato":"3107001097","objeto":"PEGUITA HR 3D","departamento":"MET","f1":"20-ago.-13","f2":"6-dic-13","d2":"","d3":"67.48","anio":"2013","logo":"cepcolsa"},{"numero":"13","cliente":"HOCOL S.A.","contrato":"C12-0264","objeto":"VSM9-2D-2012","departamento":"HUI","f1":"9-feb.-13","f2":"16-jul-13","d2":"202","d3":"","anio":"2013","logo":"hocol"},{"numero":"10","cliente":"CANACOL","contrato":"RHSA 2010-191","objeto":"CEDRELA 2D","departamento":"CAQ","f1":"3-feb.-12","f2":"6-jun-12","d2":"125.6","d3":"","anio":"2012","logo":"canacol"},{"numero":"6","cliente":"ECOPETROL","contrato":"5210279","objeto":"VMM 2D","departamento":"SAN,ANT","f1":"20-ene-11","f2":"28-ago.-12","d2":"78.28","d3":"","anio":"2012","logo":"ecopetrol"},{"numero":"8","cliente":"HOCOL S.A.","contrato":"C11 0336","objeto":"VIM6-11-3D","departamento":"BOL,SUC","f1":"15-feb.-12","f2":"30-oct-12","d2":"","d3":"400.34","anio":"2012","logo":"hocol"},{"numero":"11","cliente":"PACIFIC RUBIALES","contrato":"MET-SC-002-11","objeto":"CR1 2D","departamento":"LAG","f1":"12-ago.-11","f2":"15-jul-12","d2":"131.57","d3":"","anio":"2012","logo":"pacific"},{"numero":"9","cliente":"CANACOL","contrato":"RHSA 2010-191","objeto":"SANGRETORO 2D","departamento":"CAQ","f1":"11-ene-11","f2":"10-sep.-11","d2":"166.59","d3":"","anio":"2011","logo":"canacol"},{"numero":"7","cliente":"MPX COLOMBIA S.A.","contrato":"MPX-01623-C0119-10","objeto":"SAN JUAN - EL MOLINO 3D","departamento":"LAG","f1":"14-mar.-11","f2":"30-sep.-11","d2":"","d3":"112","anio":"2011","logo":"mpx"},{"numero":"5","cliente":"VETRA EXPLORACIÓN","contrato":"C-256-2010 C6-190-2010","objeto":"ALEA 1848A- QUINDE 3D","departamento":"PUT","f1":"23-nov-10","f2":"24-abr-11","d2":"","d3":"132.6","anio":"2011","logo":"vetra"},{"numero":"1","cliente":"EMERALD ENERGY","contrato":"6282","objeto":"MIRTO 3D","departamento":"PUT","f1":"21-oct-09","f2":"21-ene-10","d2":"","d3":"30.375","anio":"2010","logo":"ee"},{"numero":"3","cliente":"EMERALD ENERGY","contrato":"6290","objeto":"CEIBA 2D","departamento":"CAQ","f1":"1-ene-10","f2":"28-feb.-10","d2":"90.45","d3":"","anio":"2010","logo":"ee"},{"numero":"4","cliente":"EMERALD ENERGY","contrato":"6322","objeto":"OMBÚ 3D","departamento":"CAQ","f1":"3-mar.-10","f2":"5-ago.-10","d2":"","d3":"184.212","anio":"2010","logo":"ee"},{"numero":"2","cliente":"EMERALD ENERGY","contrato":"6283","objeto":"DURILLO 2D","departamento":"CAQ","f1":"15-oct-09","f2":"26-jun-09","d2":"36.75","d3":"","anio":"2009","logo":"ee"},{"numero": "30","cliente": "UNIÓN TEMPORAL IJP","contrato": "NA","objeto": "VOLUMEN C 3D","departamento": "SAN,BOY","f1": "NA","f2": "NA","d2": "","d3": "","anio": "2017","logo": "ijp"},{"numero": "31","cliente": "AGENCIA NACIONAL DE HIDROCARBUROS","contrato": "NA","objeto": "Cauca patía 2D","departamento": "CAU,VAC","f1": "NA","f2": "NA","d2": "NA","d3": "","anio": "2017","logo": "anh"}]';
    


    this.mapacontratos = JSON.parse(t);
    //this.mapacontratos = JSON.parse(this.json);
    //this.mapacontratos = "<?php echo get_stylesheet_directory_uri(); ?>/petroseismic_custom/datosmapa.json";
    
    this.allempresas = alasql('SELECT cliente, logo FROM ? GROUP by cliente, logo ORDER BY cliente asc', [this.mapacontratos]);this.datosmapacontratos();
    },
  watch: {
  },

  methods: {
    datosmapacontratos: function () {
      val = this.mapacontratos;
      console.log(val)
      var datos = [];

      for (var i in val) {
        var dep = val[i].departamento;

        //if (dep.includes(",")) {
        if (dep.indexOf(",")>=0) {
          var departamentos = dep.split(",");
          for (var j = 0; j < departamentos.length; j++) {
            datos.push({
              id: "CO-" + departamentos[j],
              numero: 1
            })
          }
        } else {
          datos.push({
            id: "CO-" + dep,
            numero: 1
          })
        }
      }
      var mapadato = alasql('SELECT id, SUM(numero::NUMBER) as numero FROM ? GROUP BY id', [datos]);
      console.log(mapadato)
      this.dato_mapa = mapadato;

    },
    muestramapa: function () {
      datos = this.dato_mapa;
      for (var i in datos) {
        datos[i].value = datos[i].numero;
      }

      console.log("LOS DATOS PARA EL MAPA SON: ")
      console.log(datos);
      var map = AmCharts.makeChart("paises_mapa", {
        dragMap: false,
        zoomOnDoubleClick: false,
        zoomControl: {
          zoomControlEnabled: false,
          panControlEnabled: false
        },
        "colorSteps": 10,
        "balloon": {
          "adjustBorderColor": true,
          "color": "#ffffff", //naranja suave
          "cornerRadius": 2,
          "fillColor": "#0D47A1", //limon
          "fontSize": 15
        },
        "type": "map",
        "theme": "light",
        "projection": "miller",

        "dataProvider": {
          //"map": "colombiaHigh",
          "mapURL": "<?php echo get_stylesheet_directory_uri();?>/petroseismic_custom/js/colombiaHigh.svg",
          "getAreasFromMap": false,

          "areas": datos

        },
        "zoomControl": {
          "homeButtonEnabled": false,
          "zoomControlEnabled": false

        },
        "areasSettings": {

          "color": "#7ee4ff", //OK
          "colorSolid": "#023e50", //OK
          "selectedColor": "#ea2a76",
          "outlineColor": "#666666",
          "rollOverColor": "#de4b28", //OK
          "rollOverOutlineColor": "#FFFFFF",
          "selectable": true,
          "unlistedAreasColor": "#C1DBD7",
          "balloonText": "[[title]] - [[value]]"
        },
        "export": {
          "enabled": false,
          "position": "bottom-right"
        }
      });

      var currentItem;
      map.addListener("rollOverMapObject", function (event) {
        //var list = $('.dato_retina tr');
        app.informapa(event.mapObject.id, event.mapObject.title)
        
        console.log(event.mapObject)
        /*for (var key in list) {
          if (list[key].id == event.mapObject.id) {
            list[key].className = 'selected';
            currentItem = list[key];
          }
        }*/
      });
      map.addListener("rollOutMapObject", function (event) {
        app.informapa('', '<ul><li>AGENCIA NACIONAL DE HIDROCARBUROS </li><li> CANACOL </li><li> CEPCOLSA </li><li> DRUMMOND USA </li><li> ECOPETROL </li><li> EMERALD ENERGY </li><li> HOCOL S.A. </li><li> MANSAROVAR ENERGY COLOMBIA LIMITED </li><li> MPX COLOMBIA S.A. </li><li> PACIFIC RUBIALES </li><li> TELPICO </li><li> UNIÓN TEMPORAL IJP </li><li> VETRA EXPLORACIÓN </li></ul>')
      });

    //this.proyectos_year();
    },
    proyectos_year: function(){
      
        var datos = alasql('SELECT anio, SUM(d2::NUMBER) as d2, SUM(d3::NUMBER) as d3 FROM ? GROUP BY anio ORDER BY anio ASC', [this.mapacontratos]);
        //var datos = alasql('SELECT anio, 2d, 3d FROM ? GROUP BY anio', [this.mapacontratos]);
        console.log("DATOS AÑO")
        console.log(datos)

var chart = AmCharts.makeChart("years", {
	"type": "serial",
     "theme": "light",
	"categoryField": "anio",
	"rotate": false,
	"startDuration": 1,
	"categoryAxis": {
		"gridPosition": "start",
		"position": "left"
	},
	"trendLines": [],
	"graphs": [
		{
			"balloonText": "[[category]] 2D: [[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-1",
			"lineAlpha": 0.2,
			"title": "2D",
			"type": "column",
			"valueField": "d2"
		},
		{
			"balloonText": "[[category]] 3D:[[value]]",
			"fillAlphas": 0.8,
			"id": "AmGraph-2",
			"lineAlpha": 0.2,
			"title": "3D",
			"type": "column",
			"valueField": "d3"
		}
	],
	"guides": [],
	"valueAxes": [
		{
			"id": "ValueAxis-1",
			"position": "top",
			"axisAlpha": 0
		}
	],
	"allLabels": [],
	"balloon": {},
	"titles": [],
	"dataProvider": datos,


});


    },
    informapa: function(val, dep){
      val = val.substring(3, 6);
      $("#informapa").html(dep);
      if (val !==''){
      this.empresas = alasql('SELECT anio, cliente, objeto FROM ? WHERE departamento LIKE "%'+val+'%" ORDER BY anio desc', [this.mapacontratos]);
      var logos = alasql('SELECT logo FROM ? WHERE departamento LIKE "%'+val+'%" GROUP BY logo', [this.mapacontratos]);
      console.log("logos")
      this.logos_empresas = logos;
      
      
      }else{
        this.empresas = '';
        this.logos_empresas = '';
      }
    },
    
  }
})    
</script>
<script>
    app.muestramapa();
</script>