<?php
  include_once('conn.php'); 
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Noticias</title>
        <link rel="shortcut icon" href="images/icono.png">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <?php include_once("menu2.html") ?>      

      <div id="page">
      <div id="content-other">

      <h2 id="otro" align="center">Lista Noticias</h2>
        <div class="text-right">

        </div>  
        
        <div class="datagrid"><br>
            <table class="table table-bordered table-striped" id="example1">
                      <thead>
                          <tr class="headings">                        
                              <th class="column-title">Fecha </th>
                              <th class="column-title">Noticia </th>
                </tr>
              </thead>

                      <tbody>
                <?php                 
                  $productosq=mysql_query("SELECT * FROM noticia WHERE estado=1 order by fecha DESC ");               
                  if(mysql_num_rows($productosq)>0)
                    while($productosf=mysql_fetch_assoc($productosq)) { ?>
                                <tr>
                                    <td class=" "><?php echo $productosf['fecha'];?></td>
                                    <td class=" "><?php echo $productosf['descripccion'];?></td>                            
                                </tr>                 
                  <?php }
                  else { ?>
                                  <tr>
                      <td colspan="4" class="text-center">No hay Noicias registrados.</td>
                    </tr> 
                  <?php } 
                ?>
              </tbody>      
            </table>
        </div>
      </div>
    </div>

      <?php include_once("footer.php") ?>               

      <script src="js/vendor/jquery-1.11.2.min.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>
