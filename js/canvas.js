        function iniciaCanvas(idCanvas){
          var elemento = document.getElementById(idCanvas);
          if (elemento &&  elemento.getContext){
            var contexto = elemento.getContext('2d');
            contexto.width = elemento.clientWidth;
            contexto.height = elemento.clientHeight;
            if (contexto) {
              return contexto;
            }
          }
          return false;
        }

        function canvas_ca_amp(deg, tipo){
          if(tipo == "il"){
            var cxt=iniciaCanvas("panel_amp");
          }
          if(tipo == "ip"){
             var cxt=iniciaCanvas("load_amp");
          }
          
          var valor_f = 40;
          var rango = 20;
          var valor_f_temp = valor_f;
          var r1 = rango; 
          var r2 = valor_f;

          if(deg <= r1){  
            var deg_fin = 36;
            if(deg == r1){           
              deg_f = -171 + deg_fin;
               //console.log("deg_f 1 ==="+deg_fin);
            }
            else{
              //console.log("deg 1 ==="+deg);
              var deg_f = Math.round((deg*100)/r1);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = -171 + deg_f;
            }
          }
          if(deg <= r2  && deg > r1){  
            var deg_fin = 70;
            if(deg == r2){           
              deg_f = -171 + deg_fin;
              // console.log("deg_f 6 ==="+deg_fin);
            }
            else{
             // console.log("deg 6 ==="+deg);
              var deg_f = Math.round((deg*100)/r2);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = -171 + deg_f;
            }
          }

          var radians = -171 * Math.PI / 180;
          var radians_fin = -100 * Math.PI / 180;
          /*console.log("deg ==="+deg);
          var deg_f = parseInt((deg*100)/272);
          console.log("deg_f ==="+deg_f);

          deg_f = -226 + deg_f;*/
         // console.log("deg_f 7 ==="+deg_f);
          var radians_f = deg_f * Math.PI / 180;
          if (cxt) {
            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#00AAB5"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians,radians_f,false); 
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians_f,radians_fin,false);  
            cxt.stroke();
          }
        }
        function canvas_ca_amp2(deg, tipo){
          if(tipo == "ib"){
            var cxt=iniciaCanvas("bat_amp");
          }
         
        

        if(deg < 0){
          //console.log(deg);
          var valor_f = -60;
          var rango = 30;
          var valor_f_temp = valor_f;
          var r1 = rango; 
          var r2 = valor_f;

          if(deg <= r1){  
            //console.log(2);
            var deg_fin = 36;
            if(deg == r1){           
              deg_f = -135 + deg_fin;
               //console.log("deg_f 1 ==="+deg_fin);
            }
            else{
              //console.log("deg 1 ==="+deg);
              var deg_f = Math.round((deg*100)/r1);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = -135 + deg_f;
               //console.log("deg_f 2 ==="+deg_f);
            }
          }
          if(deg <= r2  && deg > r1){  
            var deg_fin = 70;
            if(deg == r2){           
              deg_f = -135 + deg_fin;
              // console.log("deg_f 6 ==="+deg_fin);
            }
            else{
             // console.log("deg 6 ==="+deg);
              var deg_f = Math.round((deg*100)/r2);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = -135 + deg_f;
            }
          }

          var radians = -135 * Math.PI / 180;
          var radians_fin = -50 * Math.PI / 180;
          //console.log("radians ==="+radians);
           //console.log("radians_fin ==="+radians_fin);
          /*console.log("deg ==="+deg);
          var deg_f = parseInt((deg*100)/272);
          console.log("deg_f ==="+deg_f);

          deg_f = -226 + deg_f;*/
         // console.log("deg_f 7 ==="+deg_f);
          var radians_f = deg_f * Math.PI / 180;
          // console.log("radians_f ==="+radians_f);
          if (cxt) {

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,71,36,false);  
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#00AAB5"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians,radians_f,true); 
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians_f,radians_fin,true);  
            cxt.stroke();
          }

        }
        else{

          var valor_f = 60;
          var rango = 30;
          var valor_f_temp = valor_f;
          var r1 = rango; 
          var r2 = valor_f;
          
          if(deg <= r1){  
            //console.log(1);
            var deg_fin = 36;
            if(deg == r1){           
              deg_f = -171 + deg_fin;
               //console.log("deg_f 1 ==="+deg_fin);
            }
            else{
              //console.log("deg 1 ==="+deg);
              var deg_f = Math.round((deg*100)/r1);
            //  console.log("deg_f 1 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = -135 + deg_f;
            }
          }
          if(deg <= r2  && deg > r1){  
            var deg_fin = 70;
            if(deg == r2){           
              deg_f = -135 + deg_fin;
              // console.log("deg_f 6 ==="+deg_fin);
            }
            else{
             // console.log("deg 6 ==="+deg);
              var deg_f = Math.round((deg*100)/r2);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = -135 + deg_f;
            }
          }

          var radians = -135 * Math.PI / 180;
          var radians_fin = -100 * Math.PI / 180;
          /*console.log("deg ==="+deg);
          var deg_f = parseInt((deg*100)/272);
          console.log("deg_f ==="+deg_f);

          deg_f = -226 + deg_f;*/
         // console.log("deg_f 7 ==="+deg_f);
          var radians_f = deg_f * Math.PI / 180;
          if (cxt) {
            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,71,36,false);  
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#00AAB5"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians,radians_f,false); 
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians_f,radians_fin,false);  
            cxt.stroke();
            
          }
        }
        }

        function canvas_ca_volt(deg, tipo){
          if(tipo == "vb"){
           var cxt=iniciaCanvas("bat_volt");
           console.log(cxt);
           console.log(deg);
          }
          if(tipo == "vl"){
           var cxt=iniciaCanvas("load_volt");
          }
          if(tipo == "vp"){
            var cxt=iniciaCanvas("panel_volt");
          }
          var valor_f = 40;
          var rango = 20;
          var valor_f_temp = valor_f;
          var r1 = rango; 
          var r2 = valor_f;
          if(deg <= r1){  
            var deg_fin = 34;
            if(deg == r1){           
              deg_f = -171 + deg_fin;
               //console.log("deg_f 1 ==="+deg_fin);
            }
            else{
              //console.log("deg 1 ==="+deg);
              var deg_f = Math.round((deg*100)/r1);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = -171 + deg_f;
            }
          }
          if(deg <= r2  && deg > r1){  
            var deg_fin = 70;
            if(deg == r2){           
              deg_f = -171 + deg_fin;
              // console.log("deg_f 6 ==="+deg_fin);
            }
            else{
             // console.log("deg 6 ==="+deg);
              var deg_f = Math.round((deg*100)/r2);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = -171 + deg_f;
            }
          }

          var radians = -171 * Math.PI / 180;
          var radians_fin = -100 * Math.PI / 180;
          /*console.log("deg ==="+deg);
          var deg_f = parseInt((deg*100)/272);
          console.log("deg_f ==="+deg_f);

          deg_f = -226 + deg_f;*/
         // console.log("deg_f 7 ==="+deg_f);
          var radians_f = deg_f * Math.PI / 180;
          if (cxt) {
            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#00AAB5"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians,radians_f,false); 
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=17; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,137,100,radians_f,radians_fin,false);  
            cxt.stroke();
          }
        }

        function canvas_mano_baja(deg){
          //console.log("deg === "+deg);
          //Recibimos el elemento canvas
          var cxt=iniciaCanvas("mano_baja");
          var valor_f = 300;
          var rango = 50;
          var valor_f_temp = valor_f;
          var r1 = rango; 
          var r2 = r1+rango;
          var r3 = r2+rango;
          var r4 = r3+rango;
          var r5 = r4+rango;
          var r6 = valor_f;

          if(deg <= r1){  
            var deg_fin = 47;
            if(deg == r1){           
              deg_f = -226 + deg_fin;
               //console.log("deg_f 1 ==="+deg_fin);
            }
            else{
              //console.log("deg 1 ==="+deg);
              var deg_f = Math.round((deg*100)/r1);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
              //console.log("deg_f 1 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }

          if(deg <= r2 && deg > r1){
            //console.log("deg 2.1 ==="+r2);
            var deg_fin =92;
            if(deg == r2){           
              deg_f = -226 + deg_fin;
               //console.log("deg_f 2 ==="+deg_fin);
            }
            else{
              //console.log("deg 2 ==="+deg);
              var deg_f = Math.round((deg*100)/r2);
              //console.log("deg_f 2 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 2 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r3 && deg > r2){
            //console.log("deg 3.1 ==="+r3);
            var deg_fin =138;
            if(deg == r3){           
              deg_f = -226 + deg_fin;
               //console.log("deg_f 3 ==="+deg_fin);
            }
            else{
             // console.log("deg 3 ==="+deg);
              var deg_f = Math.round((deg*100)/r3);
              //console.log("deg_f 3 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 3 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r4 && deg > r3){
           // console.log("deg 4.1 ==="+r4);
            var deg_fin =183;
            if(deg == r4){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 4 ==="+deg_fin);
            }
            else{
              //console.log("deg 4 ==="+deg);
              var deg_f = Math.round((deg*100)/r4);
             // console.log("deg_f 4 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 4 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r5 && deg > r4){
           // console.log("deg 5.1 ==="+r5);
            var deg_fin =229;
            if(deg == r5){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 5 ==="+deg_fin);
            }
            else{
             // console.log("deg 5 ==="+deg);
              var deg_f = Math.round((deg*100)/r5);
             // console.log("deg_f 5 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 5 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r6  && deg > r5){  
            var deg_fin = 272;
            if(deg == r6){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 6 ==="+deg_fin);
            }
            else{
             // console.log("deg 6 ==="+deg);
              var deg_f = Math.round((deg*100)/r6);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
             // console.log("deg_f 6 ==="+deg_f);
              deg_f = -214 + deg_f;
            }
          }

          var radians = -226 * Math.PI / 180;
          var radians_fin = 46 * Math.PI / 180;
          /*console.log("deg ==="+deg);
          var deg_f = parseInt((deg*100)/272);
          console.log("deg_f ==="+deg_f);

          deg_f = -226 + deg_f;*/
         // console.log("deg_f 7 ==="+deg_f);
          var radians_f = deg_f * Math.PI / 180;
          if (cxt) {
            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#00AAB5"; //color de línea
            cxt.lineWidth=15; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,105,95,radians,radians_f,false); 
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=15; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,105,95,radians_f,radians_fin,false);  
            cxt.stroke();
          }
        }

        function canvas_mano_alta(deg){
         // console.log("deg === "+deg);
          //Recibimos el elemento canvas
          var cxt=iniciaCanvas("mano_alta");
          var valor_f = 700;
          var rango = 150;
          var valor_f_temp = valor_f;
          var r1 = rango; 
          var r2 = r1+100;
          var r3 = r2+100;
          var r4 = r3+100;
          var r5 = r4+100;
          var r6 = valor_f;

          if(deg <= r1){  
            var deg_fin = 47;
            if(deg == r1){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 1 ==="+deg_fin);
            }
            else{
             // console.log("deg 1 ==="+deg);
              var deg_f = Math.round((deg*100)/r1);
             // console.log("deg_f 1 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
            //  console.log("deg_f 1 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }

          if(deg <= r2 && deg > r1){
          //  console.log("deg 2.1 ==="+r2);
            var deg_fin =92;
            if(deg == r2){           
              deg_f = -226 + deg_fin;
             //  console.log("deg_f 2 ==="+deg_fin);
            }
            else{
            //  console.log("deg 2 ==="+deg);
              var deg_f = Math.round((deg*100)/r2);
            //  console.log("deg_f 2 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
            //  console.log("deg_f 2 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r3 && deg > r2){
           // console.log("deg 3.1 ==="+r3);
            var deg_fin =138;
            if(deg == r3){           
              deg_f = -226 + deg_fin;
             //  console.log("deg_f 3 ==="+deg_fin);
            }
            else{
             // console.log("deg 3 ==="+deg);
              var deg_f = Math.round((deg*100)/r3);
            //  console.log("deg_f 3 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
            //  console.log("deg_f 3 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r4 && deg > r3){
           // console.log("deg 4.1 ==="+r4);
            var deg_fin =183;
            if(deg == r4){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 4 ==="+deg_fin);
            }
            else{
             // console.log("deg 4 ==="+deg);
              var deg_f = Math.round((deg*100)/r4);
            //  console.log("deg_f 4 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
            //  console.log("deg_f 4 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r5 && deg > r4){
           // console.log("deg 5.1 ==="+r5);
            var deg_fin =229;
            if(deg == r5){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 5 ==="+deg_fin);
            }
            else{
             // console.log("deg 5 ==="+deg);
              var deg_f = Math.round((deg*100)/r5);
            //  console.log("deg_f 5 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
            //  console.log("deg_f 5 ==="+deg_f);
              deg_f = -226 + deg_f;
            }
          }
          if(deg <= r6  && deg > r5){  
            var deg_fin = 272;
            if(deg == r6){           
              deg_f = -226 + deg_fin;
              // console.log("deg_f 6 ==="+deg_fin);
            }
            else{
            //  console.log("deg 6 ==="+deg);
              var deg_f = Math.round((deg*100)/r6);
            //  console.log("deg_f 6 ==="+deg_f);
              deg_f = deg_f /100;
              deg_f = Math.round(deg_fin*deg_f);
            //  console.log("deg_f 6 ==="+deg_f);
              deg_f = -214 + deg_f;
            }
          }

          var radians = -226 * Math.PI / 180;
          var radians_fin = 46 * Math.PI / 180;          
          var radians_f = deg_f * Math.PI / 180;
          if(cxt){
            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#F7941E"; //color de línea
            cxt.lineWidth=15; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,105,95,radians,radians_f,false); 
            cxt.stroke();

            cxt.beginPath(); //iniciar ruta
            cxt.strokeStyle="#555658"; //color de línea
            cxt.lineWidth=15; //grosor de línea
            cxt.beginPath(); //nueva ruta
            cxt.arc(115,105,95,radians_f,radians_fin,false);  
            cxt.stroke();
          }
        }

        function canvas_combustible(deg){
           var cxt=iniciaCanvas("porcentaje_com");
           //deg = 1;
           var numero = deg;
           //console.log(deg);
           deg = deg / 100;
           //console.log(deg);
           var maximo = 150;
           var difirencia = Math.round(deg*maximo);
           //console.log(difirencia);
           var dif_final = maximo - difirencia;
           //console.log(dif_final);
           
          if (cxt) {
             var dif = parseInt(difirencia);
             var dif_f = parseInt(dif_final);

            cxt.beginPath(); //iniciar ruta
            cxt.fillStyle="#555658"; //color de línea
            //cxt.lineWidth=17; //grosor de línea
            //cxt.beginPath(); //nueva ruta
           // cxt.moveTo(0,0);
           // cxt.lineTo(0,10);
            //cxt.arc(115,137,100,radians_f,radians_fin,false); 
            cxt.fillRect(0,0,350,dif_f); 

            cxt.stroke();
           
            cxt.beginPath(); //iniciar ruta
            //var numero = parseInt(deg);
            //console.log(numero);
            if(numero > 40){
              //console.log(1);
              cxt.fillStyle="#00AAB5";//color de línea
            }
            if(numero >= 30 && numero <= 40){
             // console.log(2);
              cxt.fillStyle="#EBC134";//color de línea
            }
            if(numero < 30){
             // console.log(3);
              cxt.fillStyle="#BF0411";//color de línea
            }
             
            //cxt.lineWidth=17; //grosor de línea
            //cxt.arc(115,137,100,radians,radians_f,false); 
           // cxt.moveTo(0,10);
           // cxt.lineTo(0,0);
           cxt.fillRect(0,dif_f,350,dif);
            cxt.stroke();
          }
        }