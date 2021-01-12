<?php
include './library/configServer.php';
include './library/consulSQL.php';

?>
	<!DOCTYPE html>
	<html lang="es">

	<head>
	   
		<title>Admin</title>
		<?php include './inc/link.php'; ?>
		 <link rel="stylesheet" href="css/Stylo.css">
	   <link rel="stylesheet" href="cssf/estilo3.css">
	<link rel="stylesheet" href="fontsf/fonts.css">
	 <link rel="stylesheet" href="footer/css/footer-distributed-with-address-and-phones.css">
	<link rel="stylesheet" href="cssf/style.css">
		 <link rel="stylesheet" href="cssf/media.css">
		<script type="text/javascript" src="js/admin.js"></script>
		<script type="text/javascript" src="./js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="./dist/Chart.bundle.min.js"></script>

	</head>

	<body id="container-page-configAdmin">
		<?php include './inc/navbar.php'; ?>
		<section id="prove-product-cat-config">
			<div class="container">
		
				<!-- Nav tabs -->
			




					<!--==============================Panel productos===============================-->
					<div role="tabpanel" class="tab-pane fade in active" id="Productos">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-product">
									<h2 class="text-success text-center"><strong><i class="fa fa-plus"></i>
								&nbsp;&nbsp;POSTULAR</strong>
									</h2>
									<form position="center" role="form" action="process/regaspirante.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Nombre</label> <input type="text" class="form-control" placeholder="Código" required maxlength="30" name="nombre">
										</div>
										<div class="form-group">
											<label>Cédula</label> <input type="text" class="form-control" placeholder="Nombre" required maxlength="30" name="cedula">
										</div>
										<div class="form-group">
											<label>Teléfono</label> <input type="text" class="form-control" placeholder="Nombre" required maxlength="30" name="telefono">
										</div>
										<div class="form-group">
											<label>Correo</label> <input type="text" class="form-control" placeholder="Nombre" required maxlength="30" name="correo">
										</div>
										<div class="form-group">
											<label>Cargo a postular</label> <select class="form-control" name="tipo">
									<?php
						$categoriac = ejecutarSQL::consultar ( "select * from cargo" );
										while ( $catec = mysql_fetch_array ( $categoriac ) ) {
					echo '<option value="' . $catec ['tipo'] . '">' . $catec ['tipo'] . '</option>';
																																				}
																																				?>
								</select>
										</div>
										

										
									   
									
										<p class="text-center">
											<button type="submit" class="btn btn-success">Enviar</button>
										</p>
										<div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								
							</div>
							<div class="col-xs-12">
								<br>
								<br>
								
							</div>
						</div>
					</div>
																																						
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>















					
	   <!--============================== FIN FUNCION DISEÑO  CUADRO ESTADISTICA===============================-->             
		

 
	<!-- The content of your page would go here. -->

	<footer class="footer-distributed">

	  <div class="footer-left">

		<h3>LÁCTEOS FINO</h3>

		<p class="footer-company-about">
		  <span>Sobre Nosotros</span>
		   La mayor parte de la leche recibida de nuestros asociados es producida bajo las especificaciones establecidas en el Sistema de Aseguramiento de la Calidad, y toda la leche es enfriada en los mismos establecimientos. Se trata de un sistema que contempla el cumplimiento de un conjunto de normas que tiene como objetivo central el resguardo de la calidad de la leche. 
		</p>
		<br><br>
		<p class="footer-company-name">LACTEOS FINO 2020-DERECHOS RESERVADOS &copy; 2020</p>
	  </div>

	  <div class="footer-center">

		<div>
		  <i class="fa fa-map-marker"></i>
		  <p><span>Panamericana Norte Km 17 via Quito</span>   Latacunga</p>
		</div>

		<div>
		  <i class="fa fa-phone"></i>
		  <p>Tel: (032)-719-388,</p>
					<p> 0991977284</p>
		</div>

		<div>
		  <i class="fa fa-envelope"></i>
		  <p><a href=" ">drive.p8@hotmail.com</a></p>
		</div>

	  </div>

	  <div style="float: right;">

					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3989.4352807652094!2d-78.61703308600416!3d-0.7939375994208052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sec!4v1581314857885!5m2!1ses-419!2sec" width="320" height="240" frameborder="0" style=";padding: 5px; border-width: 1px;" allowfullscreen></iframe>

	  </div>

	</footer>
</body>
</html>