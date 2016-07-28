    
     var dataSource = [];
     var dataSource2 = [];
     var prueba_tiempo = [];
     //var tiempo_temp = 1950;
     //var temp_temp = 5;


     function funcion_graficar_diario(datos){
        DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
            //console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
          //console.log(dataSource3);
        $("#Equipo_diario").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
          series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#1691be',style: { opacity: 0.38 } },
             /* { valueField: "temp_baja", point: { visible: true },color: '#FE2C2C',style: { opacity: 1 } }    */
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Hrs" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimas 24 Horas C°/Horas',
              font: { size: 13, color: 'white' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'white',
                  opacity:1
              }       
          }
        }); 
     }
     function funcion_graficar_diario_e2(datos){
        DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
            //console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
          //console.log(dataSource3);
        $("#Equipo_2_diario").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
          series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#1691be',style: { opacity: 0.38 } },
             /* { valueField: "temp_baja", point: { visible: true },color: '#FE2C2C',style: { opacity: 1 } }    */
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Hrs" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimas 24 Horas C°/Horas',
              font: { size: 13, color: 'white' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'white',
                  opacity:1
              }       
          }
        }); 
     }
     function funcion_graficar_semanal(datos){
        DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
           // console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
         // console.log(dataSource3);
        $("#Equipo_semanal").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
           series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Dia" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimos 7 dias C°/Dias',
              font: { size: 13, color: 'white' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'white',
                  opacity:1
              }       
          }
        }); 
     }

     function funcion_graficar_quincenal(datos){
       //DevExpress.viz.core.currentPalette('Soft Pastel');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
            //console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
          //console.log(dataSource3);
        $("#Equipo_1_quincenal").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
           series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Dia" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimos 15 dias C°/Dias',
              font: { size: 18, color: 'gray'}
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'gray',
                  opacity:1
              }       
          }
        }); 
     }
     function funcion_graficar_mensual(datos){
        //DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
           // console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
          //console.log(dataSource3);
        $("#Equipo_1_mensual").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
             type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
           series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Dia" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimos 30 dias C°/Dias',
              font: { size: 18, color: 'gray' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'gray',
                  opacity:1
              }       
          }
        }); 
     }


     function funcion_graficar(t1,t2,p1,p2){
       DevExpress.viz.core.currentTheme('android');
        //console.log(t1,"-",t2,"-",p1,"-",p2);
        var d = new Date();
        var tiempo_temp = d.getHours()+":"+d.getMinutes()+":"+d.getSeconds(); 
        var temp_temp = parseFloat(t1);
        //console.log(tiempo_temp);

       
      

        //for(var i = 0;i<20;i++){
          dataSource_tem = {};
          dataSource_tem['tiempo'] = tiempo_temp;
          dataSource_tem['temp1'] = temp_temp;
         // dataSource_tem['temp1'] = t2;
          dataSource.push(dataSource_tem);
          dataSource2.push(dataSource_tem);          

          /*dataSource_tem2 = {};
          dataSource_tem2['tiempo'] = tiempo_temp;
          dataSource_tem2['p2'] = p2;
          dataSource_tem2['p1'] = p1;
          dataSource2.push(dataSource_tem2);*/
          //tiempo_temp += 10;
          /*var dataSource = [
            { tiempo: 1950, temp: 227 },
            { tiempo: 1960, temp: 283 },
            { tiempo: 1970, temp: 361 },
            { tiempo: 1980, temp: 471 },
            { tiempo: 1990, temp: 623 },
            { tiempo: 2000, temp: 797 },
            { tiempo: 2010, temp: 982 },
            { tiempo: 2020, temp: 1189 },
            { tiempo: 2030, temp: 1416 },
            { tiempo: 2040, temp: 1665 }
          ];*/
          //temp_temp += 5;
        //} 
        //console.log(dataSource);
        var numerodataSource = dataSource.length;
         if(numerodataSource > 12){
          dataSource.shift();
        }
        var numerodataSource = dataSource2.length;
         if(numerodataSource > 12){
          dataSource2.shift();
        }

        //console.log(numerodataSource);
        $("#RequestChartContainer").dxChart({
          dataSource: dataSource,
          commonSeriesSettings: {
             type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
          series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: true }              
          },
          valueAxis: {
            name: 'percentAxis',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Dia" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimas 24 Horas C°/T',
              font: { size: 18, color: 'white' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'white',
                  opacity:1
              }       
          }
        }); 

         $("#RequestChartContainer2").dxChart({
          dataSource: dataSource,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
           series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: true,
              grid:{visible: true }              
          },
          valueAxis: {
            name: 'percentAxis',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Dia" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimos 7 Dias',
              font: { size: 18, color: 'white' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'white',
                  opacity:1
              }       
          }
        }); 
      }
      function funcion_graficar_informe_diario(datos){
        //DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
            //console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
          //console.log(dataSource3);
        $("#Equipo_1_diario").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "spline",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 20,
                    right: 36
                },
         series: [
              { valueField: "Ib",name: "Ampere Bateria", point: { visible: false },color: '#00AAB5'},
              { valueField: "Vb",name: "Voltaje Bateria", point: { visible: false },color: 'red'},
              { valueField: "Il",name: "Ampere Consumo", point: { visible: false },color: 'grey'},
              
             /* { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }  */  
          ],
          argumentAxis:{
              valueMarginsEnabled: true,
              grid:{visible: true }              
          },
          valueAxis: {
            name: 'Rangos',
            min: -30,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                  if(this.seriesName == "Ampere Bateria"){
                    return this.argumentText + " Hrs" + "<br/>" + this.valueText + " (A)";
                  }
                  if(this.seriesName == "Voltaje Bateria"){
                    return this.argumentText + " Hrs" + "<br/>" + this.valueText + " (v)";
                  }
                  if(this.seriesName == "Ampere Consumo"){
                    return this.argumentText + " Hrs" + "<br/>" + this.valueText + " (A)";
                  }
              },
               font: { size: 15},

          },
          title: {
              text: 'Grafico ultimas 24 Horas',
              font: { size: 18, color: 'gray' }
          },
           legend: { 
              verticalAlignment: "bottom",
              horizontalAlignment: "center"
            },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'gray',
                  opacity:1
              }       
          }
        });
     } 
     function funcion_graficar_informe_semanal(datos){
        //DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);    
        var i=0;
        var j=0; 
           // console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
         // console.log(dataSource3);
        $("#Equipo_1_semanal").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
           series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Dia" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura ultimos 7 dias C°/Dias',
              font: { size: 18, color: 'gray' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'gray',
                  opacity:1
              }       
          }
        }); 
     }
     function funcion_graficar_informe_fechas(datos, desde , hasta){
        //DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);
        var desde = desde;
        var hasta = hasta;    
        var i=0;
        var j=0; 
        //console.log(desde);
        //console.log(hasta);
        var desde_temp = desde.split("/");
        var dia = desde_temp[1];
        var mes = desde_temp[0];
        var ano = desde_temp[2];

        desde = dia+"-"+mes+"-"+ano;

        var hasta_temp = hasta.split("/");
        var dia = hasta_temp[1];
        var mes = hasta_temp[0];
        var ano = hasta_temp[2];
       
        hasta = dia+"-"+mes+"-"+ano;
           // console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
         // console.log(dataSource3);
        $("#Equipo_1_fechas").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "splineArea",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 5,
                    right: 36
                },
           series: [
              { type:"Line", valueField: "temp_control", point: { visible: false }, color: 'yellow',style: { opacity: 1 }},
              { valueField: "temp_alta", point: { visible: true },color: '#FE2C2C',style: { opacity: 0.38 } },
              { valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: false,
              grid:{visible: false }              
          },
          valueAxis: {
            name: 'time',
            min: 0,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                return this.argumentText + " Hrs" + "<br/>" + this.valueText+ " °c";
              }
          },
          title: {
              text: 'Temperatura Desde ' + desde +' Hasta '+ hasta,
              font: { size: 18, color: 'gray' }
          },
           legend: { visible: false },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'gray',
                  opacity:1
              }       
          }
        }); 
     }
     function funcion_graficar_informe_fecha(datos, dia_f){
        //DevExpress.viz.core.currentTheme('android');
        //console.log(datos);
        var dataSource_tem = {};
        var dataSource3 = new Array();
        var dataJson = eval(datos);
        var dia_final = dia_f;
        var i=0;
        var j=0; 
        //console.log(desde);
        //console.log(hasta);
        var dia_temp = dia_final.split("/");
        var dia = dia_temp[1];
        var mes = dia_temp[0];
        var ano = dia_temp[2];

        dia_a = dia+"-"+mes+"-"+ano;

           // console.log(datos);     
            /*while(i<dataJson.length){
                 dataSource_tem['tiempo'] = dataJson.fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson.temp_alta);
                 dataSource3[i] = dataSource_tem;
                 i++;
                 j++;
            }
            console.log(dataSource3);*/
            for(var i in dataJson){
                //console.log(dataJson[i]);
                //console.log(dataJson[i].fecha + " _ " + dataJson[i].temp_alta);
                 /*dataSource_tem['tiempo'] = dataJson[0].fecha;
                 dataSource_tem['temp1'] = parseFloat(dataJson[0].temp_alta);*/
                 dataSource3[j] = dataJson[j];
                 j++;
            }            
         // console.log(dataSource3);
        $("#Equipo_1_fechas").dxChart({
          dataSource: dataSource3,
          commonSeriesSettings: {
              type: "spline",
              argumentField: 'fecha',
          },
          margin: {
                    top: 5,
                    bottom: 20,
                    right: 36
                },
           series: [
             { valueField: "Ib",name: "Ampere Bateria", point: { visible: false },color: '#00AAB5'},
              { valueField: "Vb",name: "Voltaje Bateria", point: { visible: false },color: 'red'},
              { valueField: "Il",name: "Ampere Consumo", point: { visible: false },color: 'grey'},
            
              //{ valueField: "temp_baja", point: { visible: true },color: '#1691be',style: { opacity: 1 } }    
          ],
          argumentAxis:{
              valueMarginsEnabled: true,
              grid:{visible: true }              
          },
            valueAxis: {
            name: 'Rangos',
            min: -30,
            max: 37
        },
          tooltip:{
              enabled: true,
              customizeText: function() { 
                  if(this.seriesName == "Ampere Bateria"){
                    return this.argumentText + " Hrs" + "<br/>" + this.valueText + " (A)";
                  }
                  if(this.seriesName == "Voltaje Bateria"){
                    return this.argumentText + " Hrs" + "<br/>" + this.valueText + " (v)";
                  }
                  if(this.seriesName == "Ampere Consumo"){
                    return this.argumentText + " Hrs" + "<br/>" + this.valueText + " (A)";
                  }
              },
               font: { size: 15},

          },
          title: {
              text: 'Grafico Dia ' + dia_a,
              font: { size: 18, color: 'gray' }
          },
           legend: { 
              verticalAlignment: "bottom",
              horizontalAlignment: "center"
            },
          commonPaneSettings: {
              border:{
                  visible: true,
                  color: 'gray',
                  opacity:1
              }       
          }
        }); 
     }

    function graficar_reloj_psi(psi){
      $('#reloj_psi').highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false,
            backgroundColor: 'black',
        },

        title: {
            text: null
        },

        credits: {
            enabled: false
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#333',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 700,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'Psi'
            },
            plotBands: [{
                from: 0,
                to: 420,
                color: '#55BF3B' // green
            }, {
                from: 420,
                to: 600,
                color: '#DDDF0D' // yellow
            }, {
                from: 600,
                to: 700,
                color: '#DF5353' // red
            }]
        },

        exporting: {
          enabled: false
        },

        tooltip: {
          enabled: false
        },

        plotOptions: {
            series: {
               animation: false
            }
        },

        series: [{
            data: [psi]            
        }]

      });
    }