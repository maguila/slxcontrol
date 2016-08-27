<style>

  .navbar-nav li{
    transition: all 300ms;
  }

  .navbar-nav li:hover{
    background: #F3F3F3;
    border-radius: 5px;
  }
</style>


<nav class="navbar navbar-default navbar-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SLXcontrol</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">

      <ul class="nav navbar-nav">

        <?php
            $class_index  = "";
            $class_host   = "";
            $class_campos = "";
            $class_lectura = "";
            $class_alertas = "";
            $class_procesos = "";
            $class_categorias = "";

            if(strpos($_SERVER['PHP_SELF'], 'index.php')) {
              $class_index = "active";
            }
            if(strpos($_SERVER['PHP_SELF'], 'equipos.php')) {
              $class_host = "active";
            }
            if(strpos($_SERVER['PHP_SELF'], 'campos.php')) {
              $class_campos = "active";
            }
            if(strpos($_SERVER['PHP_SELF'], 'lecturas.php')) {
              $class_lectura = "active";
            }
            if(strpos($_SERVER['PHP_SELF'], 'alertas.php')) {
              $class_alertas = "active";
            }
            if(strpos($_SERVER['PHP_SELF'], 'procesos.php')) {
              $class_procesos = "active";
            }
            if(strpos($_SERVER['PHP_SELF'], 'categorias.php')) {
              $class_categorias = "active";
            }
        ?>

        <li class="<?php  echo $class_index; ?>" ><a href="index.php"> <span class="glyphicon glyphicon-wrench"></span>  Conexión BD</a></li>
        <li class="<?php  echo $class_procesos; ?>" ><a href="procesos.php"> <span class="glyphicon glyphicon-copy"></span> Procesos</a></li>
        <li class="<?php  echo $class_categorias; ?>" ><a href="categorias.php"> <span class="glyphicon glyphicon-indent-right"></span> Categorias</a></li>
        <li class="<?php  echo $class_campos; ?>" ><a href="campos.php"> <span class="glyphicon glyphicon-tasks"></span> Campos de Lectura</a></li>
        <li class="<?php  echo $class_host; ?>"   ><a href="equipos.php"> <span class="glyphicon glyphicon-phone"></span> Equipos</a></li>
        <li class="<?php  echo $class_alertas; ?>" ><a href="alertas.php"> <span class="glyphicon glyphicon-alert"></span> Alertas</a></li>
        <li class="<?php  echo $class_lectura; ?>" ><a href="lecturas.php"> <span class="glyphicon glyphicon-list-alt"></span> Ultimas Lecturas</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>