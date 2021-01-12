<?php
include './library/configServer.php';
include './library/consulSQL.php';
include './process/securityPanel.php';
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
				<div >
					 
					<br>
				   
								   
					<h1 class="text-success text-center"><strong>EMPRESA "LÁCTEOS FINO"</strong>
					 </h1>
					 <h3 class="text-success text-center">Panel de Administración
					 </h3>
					
				</div>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#Productos" role="tab" data-toggle="tab">Productos</a></li>
					<li role="presentation" ><a href="#Categorias" role="tab" data-toggle="tab">Categorías</a></li>
					<li role="presentation"><a href="#Admins" role="tab" data-toggle="tab">Administrador</a></li>
					<li role="presentation"><a href="#Pedidos" role="tab" data-toggle="tab">Pedidos</a></li>
					<li role="presentation"><a href="#Proveedores" role="tab"
					data-toggle="tab">Proveedor</a></li>
					<li role="presentation"><a href="#Trabajadores" role="tab" data-toggle="tab">Trabajadores</a></li>
					<li role="presentation"><a href="#Cargos" role="tab" data-toggle="tab">Cargo</a></li>
					<li role="presentation"><a href="#Vacantes" role="tab" data-toggle="tab">Vacantes</a></li>
				    <li role="presentation"><a href="#Aspirantes" role="tab" data-toggle="tab">Aspirantes</a></li>
				     
				</ul>
				<div class="tab-content">
				<!--==============================Panel Aspirantes===============================-->
					<div role="tabpanel" class="tab-pane " id="Aspirantes">
						<div class="row">
				
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								
							</div>
							<div class="col-xs-12">
								
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										
										<h3>Lista de aspirantes</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">Nombre</th>
													<th class="text-center">Cédula</th>
													<th class="text-center">Correo</th>
													<th class="text-center">Cargo</th>

													
													
												</tr>
											</thead>
											<tbody>
												<?php
							$productos = ejecutarSQL::consultar ( "select * from aspirante" );
										$upr = 1;
						while ( $prod = mysql_fetch_array ( $productos ) ) {
																																							echo '
												<div id="update-product">
												  <form method="post" action="process/updvacante.php" id="res-update-product-' . $upr . '">
													<tr>

													    <td>
													      <input class="form-control" type="" name="nombre" disabled maxlength="30" required="" value="' . $prod ['nombre'] . '">
														  </td>
														  <td>
														  <input class="form-control" type="" name="cedula" disabled maxlength="30" required="" value="' . $prod ['cedula'] . '">
														 </td>
														  <td>
														  <input class="form-control" type="" name="correo" disabled maxlength="30" required="" value="' . $prod ['correo'] . '">
														 </td>

														  </td>
													    
														<td>';
																																							$categoriac3 = ejecutarSQL::consultar ( "select * from cargo where tipo='" . $prod ['tipo'] . "'" );
																																							while ( $catec3 = mysql_fetch_array ( $categoriac3 ) ) {
																																								$codeCat = $catec3 ['tipo'];
																																								$nameCat = $catec3 ['tipo'];
																																							}
																																							echo '<select class="form-control" name="vacante" disabled >';
																																							echo '<option value="' . $codeCat . '">' . $nameCat . '</option>';
																																							$categoriac2 = ejecutarSQL::consultar ( "select * from cargo" );
																																							while ( $catec2 = mysql_fetch_array ( $categoriac2 ) ) {
																																								if ($catec2 ['tipo'] == $codeCat) {
																																								} else {
																																									echo '<option value="' . $catec2 ['tipo'] . '">' . $catec2 ['tipo'] . '</option>';
																																								}
																																							}
																																							echo '</select>
														</td>
													
																   
														
													</tr>
												  </form>
												</div>
												';
																																							$upr = $upr + 1;
																																						}
																																						?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>



  <!--==============================Panel Vacantes===============================-->
					<div role="tabpanel" class="tab-pane " id="Vacantes">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-product">
									<h2 class="text-success text-center"><strong><i class="fa fa-plus"></i>
								&nbsp;&nbsp;Agregar Nueva Vacante</strong>
									</h2>
									<form role="form" action="process/regVacante.php" method="post" enctype="multipart/form-data">
										
										<div class="form-group">
											<label>Cargo</label> <select class="form-control" name="tipo">
									<?php
						$categoriac = ejecutarSQL::consultar ( "select * from cargo" );
										while ( $catec = mysql_fetch_array ( $categoriac ) ) {
					echo '<option value="' . $catec ['tipo'] . '">' . $catec ['tipo'] . '</option>';
																																				}
																																				?>
								</select>
										</div>
										<div class="form-group">
											<label>Numero Vacante</label> <input type="text" class="form-control" placeholder="Numero de Vacantes" required maxlength="20" pattern="[0-9]{1,20}" name="cantidad">
										</div>

										
									   
						
										
										<p class="text-center">
											<button type="submit" class="btn btn-success">Agregar</button>
										</p>
										<div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="del-prod-form">
									<h2 class="text-success text-center"><strong><i class="fa fa-trash-o"></i>
										 &nbsp;&nbsp;Eliminar Vacante</strong>
									</h2>
									<form action="process/delvacante.php" method="post" role="form">
										<div class="form-group">
											<label>Vacante</label> <select class="form-control" name="cantidad">
										 <?php
																																								$productoc = ejecutarSQL::consultar ( "select * from vacantetrabajo" );
																																									while ( $prodc = mysql_fetch_array ( $productoc ) ) {
																																										echo '<option value="' . $prodc ['cantidad'] . '">' . $prodc ['cantidad'] .  '</option>';
																																									}
																																									?>
									 </select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar</button>
										</p>
										<br>
										<div id="res-form-del-prod" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12">
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										
										<h3>Actualizar datos de Vacantes</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">Cargo</th>
													<th class="text-center">Numero Vacantes</th>
													

													
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
							$productos = ejecutarSQL::consultar ( "select * from vacantetrabajo" );
										$upr = 1;
						while ( $prod = mysql_fetch_array ( $productos ) ) {
																																							echo '
												<div id="update-product">
												  <form method="post" action="process/updvacante.php" id="res-update-product-' . $upr . '">
													<tr>
													    
														<td>';
																																							$categoriac3 = ejecutarSQL::consultar ( "select * from cargo where tipo='" . $prod ['tipo'] . "'" );
																																							while ( $catec3 = mysql_fetch_array ( $categoriac3 ) ) {
																																								$codeCat = $catec3 ['tipo'];
																																								$nameCat = $catec3 ['tipo'];
																																							}
																																							echo '<select class="form-control" name="vacante" >';
																																							echo '<option value="' . $codeCat . '">' . $nameCat . '</option>';
																																							$categoriac2 = ejecutarSQL::consultar ( "select * from cargo" );
																																							while ( $catec2 = mysql_fetch_array ( $categoriac2 ) ) {
																																								if ($catec2 ['tipo'] == $codeCat) {
																																								} else {
																																									echo '<option value="' . $catec2 ['tipo'] . '">' . $catec2 ['tipo'] . '</option>';
																																								}
																																							}
																																							echo '</select>
														</td>
													<td>
														  <input class="form-control" type="hidden" name="cantidadimpor" maxlength="30" required="" value="' . $prod ['cantidad'] . '">
														
														  <input class="form-control" type="" name="cantidada" maxlength="30" required="" value="' . $prod ['cantidad'] . '">
														</td>
																   
														<td class="text-center">
															<button type="submit" class="btn btn-sm btn-success button-UPR" value="res-update-product-' . $upr . '">Actualizar</button>
															<div id="res-update-product-' . $upr . '" style="width: 100%; margin:0px; padding:0px;"></div>
														</td>
													</tr>
												  </form>
												</div>
												';
																																							$upr = $upr + 1;
																																						}
																																						?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>


<!--==============================Panel Cargos===============================-->
                    <div role="tabpanel" class="tab-pane fade" id="Cargos">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <br>
                                <br>
                                <div id="add-categori">
                                    <h2 class="text-success text-center">
                                        <small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar un cargo
                                    </h2>
                                    <form action="process/cargo.php" method="post" role="form">
                                        <div class="form-group">
                                            <label>Agregue su nuevo cargo</label> <input class="form-control" type="text" name="tipo" placeholder="Ingrese cargo disponible" maxlength="9" required="">
                                        </div>
                                        
                                       
                                        <p class="text-center">
                                            <button type="submit" class="btn btn-success">Agregar
                                            Cargo</button>
                                        </p>
                                        <br>
                                        <div id="res-form-add-categori" style="width: 100%; text-align: center; margin: 0;"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <br>
                                <br>
                                <div id="del-categori">
                                    <h2 class="text-success text-center">
                                        <small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar un cargo
                                    </h2>
                                    <form action="process/elicargo.php" method="post" role="form">
                                        <div class="form-group">
                                            <label>Cargo</label> 
                                            <select class="form-control" name="tipo">
                                            <?php
                                                                                                                                                                                $categoriav = ejecutarSQL::consultar ( "select * from cargo" );
                                                                                                                                                                                while ( $categv = mysql_fetch_array ( $categoriav ) ) {
                                                                                                                                                                                    echo '<option value="' . $categv ['tipo'] . '">' . $categv ['tipo'] . '</option>';
                                                                                                                                                                                }
                                                                                                                                                                                ?>
                                        </select>
                                        </div>
                                        <p class="text-center">
                                            <button type="submit" class="btn btn-success">Eliminar
                                            cargo</button>
                                        </p>
                                        <br>
                                        <div id="res-form-del-cat" style="width: 100%; text-align: center; margin: 0;"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <br>
                                <br>
                                <div class="panel panel-success">
                                    <div class="panel-heading text-center">
                                        
                                        <h3>Lista de Cargos</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="">
                                             
                                            </thead>
                                            <tbody>
                                                <?php
                                                                                                                                                                                $categorias = ejecutarSQL::consultar ( "select * from cargo" );
                                                                                                                                                                                $ui = 1;
                                                                                                                                                                                while ( $cate = mysql_fetch_array ( $categorias ) ) {
                                                                                                                                                                                    echo '
                                                      <div id="update-category">
                                                        <form method="post" action="process/editarcargo.php" id="res-update-category-' . $ui . '">
                                                          <tr>
                                                             
                                                             <td><input  class="form-control" type="text" name="tipo" disabled maxlength="30" required="" value="' . $cate ['tipo'] . '"></td> 
                                                              
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                                                                                                                                                    $ui = $ui + 1;
                                                                                                                                                                                }
                                                                                                                                                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



					<!--==============================Panel productos===============================-->
					<div role="tabpanel" class="tab-pane fade in active" id="Productos">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-product">
									<h2 class="text-success text-center"><strong><i class="fa fa-plus"></i>
								&nbsp;&nbsp;Agregar nuevo producto</strong>
									</h2>
									<form role="form" action="process/regproduct.php" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Código de producto</label> <input pattern="[A-Z-Ña-z-ñ0-9]+" type="text" class="form-control" placeholder="Código del Producto" required maxlength="10" name="prod-codigo">
										</div>
										<div class="form-group">
											<label>Nombre de producto</label> <input pattern="[A-Z-Ña-z-ñ\s]+" type="text" class="form-control" placeholder="Nombre del Producto" required maxlength="30" name="prod-name">
										</div>
										<div class="form-group">
											<label>Categoría</label> <select class="form-control" name="prod-categoria">
									<?php
						$categoriac = ejecutarSQL::consultar ( "select * from categoria" );
										while ( $catec = mysql_fetch_array ( $categoriac ) ) {
					echo '<option value="' . $catec ['CodigoCat'] . '">' . $catec ['Nombre'] . '</option>';
																																				}
																																				?>
								</select>
										</div>
										<div class="form-group">
											<label>Precio</label> <input pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" type="text" class="form-control" placeholder="Precio" required maxlength="20"  name="prod-price">
										</div>

										<div class="form-group">
											<label>Unidades disponibles</label> <input pattern="[0-9]{1,20}" type="number" class="form-control" placeholder="Unidades Disponibles" required maxlength="3"  name="prod-stock">
										</div>
									   
										<div class="form-group">
											<label>Imagen de producto</label> <input type="file" name="img">
											<p class="help-block">Subir  imágen  </p>
										</div>
										<input type="hidden" name="admin-name" value="<?php echo $_SESSION['nombreAdmin'] ?>">
										<p class="text-center">
											<button type="submit" class="btn btn-success">Agregar a la
											Tienda</button>
										</p>
										<div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="del-prod-form">
									<h2 class="text-success text-center"><strong><i class="fa fa-trash-o"></i>
										 &nbsp;&nbsp;Eliminar producto</strong>
									</h2>
									<form action="process/delprod.php" method="post" role="form">
										<div class="form-group">
											<label>Productos</label> <select class="form-control" name="prod-code">
										 <?php
																																								$productoc = ejecutarSQL::consultar ( "select * from producto" );
																																									while ( $prodc = mysql_fetch_array ( $productoc ) ) {
																																										echo '<option value="' . $prodc ['CodigoProd'] . '">' . $prodc ['Marca'] . '-' . $prodc ['NombreProd'] . '-' . $prodc ['Modelo'] . '</option>';
																																									}
																																									?>
									 </select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar</button>
										</p>
										<br>
										<div id="res-form-del-prod" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12">
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										
										<h3>Actualizar datos de producto</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">Código</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">Categoría</th>
													<th class="text-center">Precio</th>

													<th class="text-center">Unidades</th>
													
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
							$productos = ejecutarSQL::consultar ( "select * from producto" );
										$upr = 1;
						while ( $prod = mysql_fetch_array ( $productos ) ) {
																																							echo '
												<div id="update-product">
												  <form method="post" action="process/updateProduct.php" id="res-update-product-' . $upr . '">
													<tr>
														<td>
													
														  <input class="form-control" type="hidden" name="code-old-prod" required="" value="' . $prod ['CodigoProd'] . '">
														  <input pattern="[A-Z-Ña-z-ñ0-9]+"  class="form-control" type="text" name="code-prod" maxlength="10" required="" value="' . $prod ['CodigoProd'] . '">
														</td>
														<td><input pattern="[A-Z-Ña-z-ñ\s]+" class="form-control" type="text" name="prod-name" maxlength="20" required="" value="' . $prod ['NombreProd'] . '"></td>
														<td>';
																																							$categoriac3 = ejecutarSQL::consultar ( "select * from categoria where CodigoCat='" . $prod ['CodigoCat'] . "'" );
																																							while ( $catec3 = mysql_fetch_array ( $categoriac3 ) ) {
																																								$codeCat = $catec3 ['CodigoCat'];
																																								$nameCat = $catec3 ['Nombre'];
																																							}
																																							echo '<select class="form-control" name="prod-category">';
																																							echo '<option value="' . $codeCat . '">' . $nameCat . '</option>';
																																							$categoriac2 = ejecutarSQL::consultar ( "select * from categoria" );
																																							while ( $catec2 = mysql_fetch_array ( $categoriac2 ) ) {
																																								if ($catec2 ['CodigoCat'] == $codeCat) {
																																								} else {
																																									echo '<option value="' . $catec2 ['CodigoCat'] . '">' . $catec2 ['Nombre'] . '</option>';
																																								}
																																							}
																																							echo '</select>
														</td>
														<td><input pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" class="form-control" type="text-area" name="price-prod" required="" maxlength="20" value="' . $prod ['Precio'] . '"></td>
							  
														<td><input pattern="[0-9]{1,20}" class="form-control" type="number-area" name="stock-prod" maxlength="5" required="" value="' . $prod ['Stock'] . '"></td>
													   
														<td class="text-center">
															<button type="submit" class="btn btn-sm btn-success button-UPR" value="res-update-product-' . $upr . '">Actualizar</button>
															<div id="res-update-product-' . $upr . '" style="width: 100%; margin:0px; padding:0px;"></div>
														</td>
													</tr>
												  </form>
												</div>
												';
																																							$upr = $upr + 1;
																																						}
																																						?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--==============================Panel Proveedores===============================-->
					<div role="tabpanel" class="tab-pane fade" id="Proveedores">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-provee">
									<h2 class="text-success text-center">
										<i class="fa fa-plus"></i>&nbsp;&nbsp;<strong>Agregar un proveedor</strong>
									</h2>
									<form action="process/regprove.php" method="post" role="form">
										<div class="form-group">
											<label>NIT</label> <input class="form-control" type="text" name="prove-nit" placeholder="NIT proveedor" maxlength="30" required="">
										</div>
										<div class="form-group">
											<label>Nombre</label> <input class="form-control" type="text" name="prove-name" placeholder="Nombre proveedor" maxlength="30" required="">
										</div>
										<div class="form-group">
											<label>Dirección</label> <input class="form-control" type="text" name="prove-dir" placeholder="Dirección proveedor" required="">
										</div>
										<div class="form-group">
											<label>Teléfono</label> <input class="form-control" type="tel" name="prove-tel" placeholder="Número telefónico" pattern="[0-9]{1,20}" maxlength="20" required="">
										</div>
										<div class="form-group">
											<label>Página web</label> <input class="form-control" type="text" name="prove-web" placeholder="Página web proveedor" required="">
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Añadir
											proveedor</button>
										</p>
										<br>
										<div id="res-form-add-prove" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="del-prove">
									<h2 class="text-success text-center">
										<i class="fa fa-trash-o"></i>&nbsp;&nbsp;<strong>Eliminar un proveedor</strong>
									</h2>
									<form action="process/delprove.php" method="post" role="form">
										<div class="form-group">
											<label>Proveedores</label> <select class="form-control" name="nit-prove">
										<?php
																																								$proveNIT = ejecutarSQL::consultar ( "select * from proveedor" );
																																								while ( $PN = mysql_fetch_array ( $proveNIT ) ) {
																																									echo '<option value="' . $PN ['NITProveedor'] . '">' . $PN ['NITProveedor'] . ' - ' . $PN ['NombreProveedor'] . '</option>';
																																								}
																																								?>
									</select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar
											proveedor</button>
										</p>
										<br>
										<div id="res-form-del-prove" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12">
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										<i class="fa fa-refresh fa-2x"></i>
										<h3>Actualizar datos de proveedor</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">NIT</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">Dirección</th>
													<th class="text-center">Teléfono</th>
													<th class="text-center">Página web</th>
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
							$proveedores = ejecutarSQL::consultar ( "select * from proveedor" );
													$up = 1;
									while ( $prov = mysql_fetch_array ( $proveedores ) ) {
																																							echo '
													  <div id="update-proveedor">
														<form method="post" action="process/updateProveedor.php" id="res-update-prove-' . $up . '">
														  <tr>
															  <td>
																<input class="form-control" type="hidden" name="nit-prove-old" required="" value="' . $prov ['NITProveedor'] . '">
																<input class="form-control" type="text" name="nit-prove" maxlength="30" required="" value="' . $prov ['NITProveedor'] . '">
															  </td>
															  <td><input class="form-control" type="text" name="prove-name" maxlength="30" required="" value="' . $prov ['NombreProveedor'] . '"></td>
															  <td><input class="form-control" type="text-area" name="prove-dir" required="" value="' . $prov ['Direccion'] . '"></td>
															  <td><input class="form-control" type="tel" name="prove-tel" required="" maxlength="20" value="' . $prov ['Telefono'] . '"></td>
															  <td><input class="form-control" type="text-area" name="prove-web" maxlength="30" required="" value="' . $prov ['PaginaWeb'] . '"></td>
															  <td class="text-center">
																  <button type="submit" class="btn btn-sm btn-success button-UP" value="res-update-prove-' . $up . '">Actualizar</button>
																  <div id="res-update-prove-' . $up . '" style="width: 100%; margin:0px; padding:0px;"></div>
															  </td>
														  </tr>
														</form>
													  </div>
													  ';
																																							$up = $up + 1;
																																						}
																																						?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--==============================Panel Categorias===============================-->
					<div role="tabpanel" class="tab-pane fade" id="Categorias">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-categori">
									<h2 class="text-success text-center">
										<i class="fa fa-plus"></i>&nbsp;&nbsp;<strong>Agregar categoría</strong>
									</h2>
									<form action="process/regcategori.php" method="post" role="form">
										<div class="form-group">
											<label>Código</label> <input class="form-control" type="text" name="categ-code" placeholder="Código de categoria" maxlength="9" required="">
										</div>
										<div class="form-group">
											<label>Nombre</label> <input class="form-control" type="text" name="categ-name" placeholder="Nombre de categoria" maxlength="30" required="">
										</div>
										<div class="form-group">
											<label>Descripción</label> <input class="form-control" type="text" name="categ-descrip" placeholder="Descripcióne de categoria" required="">
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Agregar
											categoría</button>
										</p>
										<br>
										<div id="res-form-add-categori" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="del-categori">
									<h2 class="text-success text-center">
										<i class="fa fa-trash-o"></i>&nbsp;&nbsp;<strong>Eliminar una categoría</strong>
									</h2>
									<form action="process/delcategori.php" method="post" role="form">
										<div class="form-group">
											<label>Categorías</label> <select class="form-control" name="categ-code">
											<?php
																																												$categoriav = ejecutarSQL::consultar ( "select * from categoria" );
																																												while ( $categv = mysql_fetch_array ( $categoriav ) ) {
																																													echo '<option value="' . $categv ['CodigoCat'] . '">' . $categv ['CodigoCat'] . ' - ' . $categv ['Nombre'] . '</option>';
																																												}
																																												?>
										</select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar
											categoría</button>
										</p>
										<br>
										<div id="res-form-del-cat" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12">
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										<i class="fa fa-refresh fa-2x"></i>
										<h3>Actualizar categoría</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">Código</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">Descripción</th>
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
																																												$categorias = ejecutarSQL::consultar ( "select * from categoria" );
																																												$ui = 1;
																																												while ( $cate = mysql_fetch_array ( $categorias ) ) {
																																													echo '
													  <div id="update-category">
														<form method="post" action="process/updateCategory.php" id="res-update-category-' . $ui . '">
														  <tr>
															  <td>
																<input class="form-control" type="hidden" name="categ-code-old" maxlength="9" required="" value="' . $cate ['CodigoCat'] . '">
																<input class="form-control" type="text" name="categ-code" maxlength="9" required="" value="' . $cate ['CodigoCat'] . '">
															  </td>
															  <td><input class="form-control" type="text" name="categ-name" maxlength="30" required="" value="' . $cate ['Nombre'] . '"></td>
															  <td><input class="form-control" type="text-area" name="categ-descrip" required="" value="' . $cate ['Descripcion'] . '"></td>
															  <td class="text-center">
																  <button type="submit" class="btn btn-sm btn-success button-UC" value="res-update-category-' . $ui . '">Actualizar</button>
																  <div id="res-update-category-' . $ui . '" style="width: 100%; margin:0px; padding:0px;"></div>
															  </td>
														  </tr>
														</form>
													  </div>
													  ';
																																													$ui = $ui + 1;
																																												}
																																												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--==============================Panel Admins===============================-->
					<div role="tabpanel" class="tab-pane fade" id="Admins">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-admin">
									<h2 class="text-success text-center">
										<i class="fa fa-plus"></i>&nbsp;&nbsp;<strong>Agregar administrador</strong>
									</h2>
									<form action="process/regAdmin.php" method="post" role="form">
										<div class="form-group">
											<label>Nombre</label> <input class="form-control" type="text" name="admin-name" placeholder="Nombre" maxlength="9" pattern="[a-zA-Z]{4,9}" required="">
										</div>
										<div class="form-group">
											<label>Contraseña</label> <input class="form-control" type="password" name="admin-pass" placeholder="Contraseña" required="">
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Agregar
											administrador</button>
										</p>
										<br>
										<div id="res-form-add-admin" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="del-admin">
									<h2 class="text-success text-center">
										<i class="fa fa-trash-o"></i>&nbsp;&nbsp;<strong>Eliminar administrador</strong>
									</h2>
									<form action="process/deladmin.php" method="post" role="form">
										<div class="form-group">
											<label>Administradores</label> <select class="form-control" name="name-admin">
											<?php
																																												$adminCon = ejecutarSQL::consultar ( "select * from administrador" );
																																												while ( $AdminD = mysql_fetch_array ( $adminCon ) ) {
																																													echo '<option value="' . $AdminD ['Nombre'] . '">' . $AdminD ['Nombre'] . '</option>';
																																												}
																																												?>
										</select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar
											administrador</button>
										</p>
										<br>
										<div id="res-form-del-admin" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12"></div>
						</div>
					</div>
					<!--==============================Panel pedidos===============================-->
					<div role="tabpanel" class="tab-pane fade" id="Pedidos">
						<div class="row">
							<div class="col-xs-12">
								<br>
								<br>
								<div id="del-pedido">
									<h2 class="text-success text-center">
										<i class="fa fa-trash-o"></i>&nbsp;&nbsp;<strong>Eliminar pedido</strong>
									</h2>
									<form action="process/delPedido.php" method="post" role="form">
										<div class="form-group">
											<label>Pedidos</label> <select class="form-control" name="num-pedido">
											<?php
																																												$pedidoC = ejecutarSQL::consultar ( "select * from venta" );
																																												while ( $pedidoD = mysql_fetch_array ( $pedidoC ) ) {
																																													echo '<option value="' . $pedidoD ['NumPedido'] . '">Pedido #' . $pedidoD ['NumPedido'] . ' - Estado(' . $pedidoD ['Estado'] . ') - Fecha(' . $pedidoD ['Fecha'] . ')</option>';
																																												}
																																												?>
										</select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar pedido</button>
										</p>
										<br>
										<div id="res-form-del-pedido" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										<i class="fa fa-refresh fa-2x"></i>
										<h3>Actualizar estado de pedido</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">#</th>
													<th class="text-center">Fecha</th>
													<th class="text-center">Cliente</th>
													<th class="text-center">Email</th>
													<th class="text-center">Teléfono</th>
													<th class="text-center">Iva</th>
													<th class="text-center">Total</th>
													<th class="text-center">Estado</th>
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
																																										$pedidoU = ejecutarSQL::consultar ( "select * from venta" );
																																										$upp = 1;
																																										while ( $peU = mysql_fetch_array ( $pedidoU ) ) {
																																											echo '
													<div id="update-pedido">
													  <form method="post" action="process/updatePedido.php" id="res-update-pedido-' . $upp . '">
														<tr>
															<td>' . $peU ['NumPedido'] . '<input type="hidden" name="num-pedido" value="' . $peU ['NumPedido'] . '"></td>
															<td>' . $peU ['Fecha'] . '</td>
															<td>';
																																											$conUs = ejecutarSQL::consultar ( "select * from cliente where NIT='" . $peU ['NIT'] . "'" );
																																											while ( $UsP = mysql_fetch_array ( $conUs ) ) {
																																												echo $UsP ['Nombre'];
																																											}
																																											echo '</td>
									<td>';
																																											$conUs = ejecutarSQL::consultar ( "select * from cliente where NIT='" . $peU ['NIT'] . "'" );
																																											while ( $UsP = mysql_fetch_array ( $conUs ) ) {
																																												echo $UsP ['Email'];
																																											}
																																											echo '</td>
															<td>';
																																											$conUs = ejecutarSQL::consultar ( "select * from cliente where NIT='" . $peU ['NIT'] . "'" );
																																											while ( $UsP = mysql_fetch_array ( $conUs ) ) {
																																												echo $UsP ['Telefono'];
																																											}
																																											echo '</td>
															<td>' . $peU ['Descuento'] . '%</td>
															<td>' . $peU ['TotalPagar'] . '</td>
															<td>
																<select class="form-control" name="pedido-status">';
																																											if ($peU ['Estado'] == "Pendiente") {
																																												echo '<option value="Pendiente">Pendiente</option>';
																																												echo '<option value="Entregado">Entregado</option>';
																																											}
																																											if ($peU ['Estado'] == "Entregado") {
																																												echo '<option value="Entregado">Entregado</option>';
																																												echo '<option value="Pendiente">Pendiente</option>';
																																											}
																																											echo '</select>
															</td>
															<td class="text-center">
																<button type="submit" class="btn btn-sm btn-success button-UPPE" value="res-update-pedido-' . $upp . '">Actualizar</button>
																<div id="res-update-pedido-' . $upp . '" style="width: 100%; margin:0px; padding:0px;"></div>
															</td>
														</tr>
													  </form>
													</div>
													';
																																											$upp = $upp + 1;
																																										}
																																										?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					
<!--==============================Panel Trabajadores===============================-->
					<div role="tabpanel" class="tab-pane fade" id="Trabajadores">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="add-provee">
									<h2 class="text-success text-center">
										<i class="fa fa-plus"></i>&nbsp;&nbsp;<strong>Agregar un Trabajador</strong>
									</h2>
									<form action="process/regTrabaj.php" method="post" role="form">
										<div class="form-group">
											<label>Cedula</label> <input class="form-control" type="number" name="trab-ced" placeholder="Ingrese Cedula" maxlength="13" required="" pattern="[0-9]{1,20}">
										</div>
										<div class="form-group">
											<label>Cargo</label> <input class="form-control" type="text" name="trab-carg" placeholder="Cargo del Trabajador" maxlength="30" required="">
										</div>
										<div class="form-group">
											<label>Nombre y Apellido</label> <input class="form-control" type="text" name="trab-nomb" placeholder="Nombre y Apellido del Trabajador" maxlength="30" required="">
										</div>
										<div class="form-group">
											<label>Edad</label> <input class="form-control" type="text" name="trab-edad" placeholder="Edad Trabajador" required="">
										</div>
										 <div class="form-group">
											<label>Fecha de Ingreso</label> <input class="form-control" type="date" name="trab-fechain" placeholder="Fecha de ingreso del Trabajador" required="">
										</div>
										<div class="form-group">
											<label>Dirección</label> <input class="form-control" type="text" name="trab-direc" placeholder="Direccion Domicilio" required="">
										</div>
										<div class="form-group">
											<label>Telefono Personal</label> <input class="form-control" type="tel" name="trab-tel" placeholder="Telefono Trabajador" required="" pattern="[0-9]{1,20}" maxlength="20">
										</div>
										 <div class="form-group">
											<label>Telefono Emergencia</label> <input class="form-control" type="tel" name="trab-teleme" placeholder="Telefono Trabajador" required="" pattern="[0-9]{1,20}" maxlength="20">
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Añadir
											proveedor</button>
										</p>
										<br>
										<div id="res-form-add-prove" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<br>
								<br>
								<div id="del-prove">
									<h2 class="text-success text-center">
										<i class="fa fa-trash-o"></i>&nbsp;&nbsp;<strong>Eliminar un Trabajador</strong>
									</h2>
									<form action="process/delTrabaj.php" method="post" role="form">
										<div class="form-group">
											<label>Trabajadores</label> <select class="form-control" name="trab-ced">
										<?php
																																								$proveNIT = ejecutarSQL::consultar ( "select * from trabajador" );
																																								while ( $PN = mysql_fetch_array ( $proveNIT ) ) {
																																									echo '<option value="' . $PN ['cedula'] . '">' . $PN ['cedula'] . ' - ' . $PN ['nombre'] . '</option>';
																																								}
																																								?>
									</select>
										</div>
										<p class="text-center">
											<button type="submit" class="btn btn-success">Eliminar
											Trabajador</button>
										</p>
										<br>
										<div id="res-form-del-prove" style="width: 100%; text-align: center; margin: 0;"></div>
									</form>
								</div>
							</div>
							<div class="col-xs-12">
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										<i class="fa fa-refresh fa-2x"></i>
										<h3>Actualizar datos de proveedor</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">Cedula</th>
													<th class="text-center">Cargo</th>
													<th class="text-center">Nombre</th>
													<th class="text-center">Edad</th>
													<th class="text-center">Fecha de Ingreso</th>
													<th class="text-center">Direccion</th>
													<th class="text-center">Telefono Personal</th>
													<th class="text-center">Telefono de 
													Emergencia</th>
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
							$trabajadores = ejecutarSQL::consultar ( "select * from trabajador" );
													$up = 1;
									while ( $prov = mysql_fetch_array ( $trabajadores ) ) {
																																							echo '
													  <div id="update-proveedor">
														<form method="post" action="process/updateTrabajador.php" id="res-update-prove-' . $up . '">
														  <tr>
															  <td>
																<input class="form-control" type="hidden" name="nit-trab-old" required="" value="' . $prov ['cedula'] . '">
																<input class="form-control" type="text" name="trab-ced" maxlength="30" required="" value="' . $prov ['cedula'] . '">
															  </td>
															  <td><input class="form-control" type="text" name="trab-carg" maxlength="30" required="" value="' . $prov ['cargo'] . '"></td>
															  <td><input class="form-control" type="text" name="trab-nomb" required="" value="' . $prov ['nombre'] . '"></td>
															  <td><input class="form-control" type="number" name="trab-edad" required="" maxlength="20" value="' . $prov ['edad'] . '"></td>
															  <td><input class="form-control" type="date" name="trab-fechain" maxlength="30" required="" value="' . $prov ['fecha_ingreso'] . '"></td>
															  <td><input class="form-control" type="text" name="trab-direc" maxlength="30" required="" value="' . $prov ['direccion'] . '"></td>
															  <td><input class="form-control" type="text" name="trab-tel" maxlength="30" required="" value="' . $prov ['telefono'] . '"></td>
															  <td><input class="form-control" type="text" name="trab-teleme" maxlength="30" required="" value="' . $prov ['tel_emergencia'] . '"></td>

															  <td class="text-center">
																  <button type="submit" class="btn btn-sm btn-success button-UP" value="res-update-prove-' . $up . '">Actualizar</button>
																  <div id="res-update-prove-' . $up . '" style="width: 100%; margin:0px; padding:0px;"></div>
															  </td>
														  </tr>
														</form>
													  </div>
													  ';
																																							$up = $up + 1;
																																						}
																																						?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
































				 
					 <!--==============================Panel ventas===============================-->
					
					   <div role="tabpanel" class="tab-pane fade" id="ventas">
						<div class="row">
							<div class="col-xs-12">
								<br>
								<br>
								<br>
								<br>
								<div class="panel panel-success">
									<div class="panel-heading text-center">
										<i class=""></i>
										<h3>Estado de Ventas</h3>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered">
											<thead class="">
												<tr>
													<th class="text-center">#</th>
													<th class="text-center">Fecha</th>
													<th class="text-center">Cliente</th>
													<th class="text-center">Email</th>
													<th class="text-center">Teléfono</th>
													<th class="text-center">Descuento</th>
													<th class="text-center">Total</th>
													<th class="text-center">Estado</th>
													<th class="text-center">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
																																										$pedidoU = ejecutarSQL::consultar ( "select * from venta" );
																																										$upp = 1;
																																										while ( $peU = mysql_fetch_array ( $pedidoU ) ) {
																																											echo '
													<div id="update-pedido">
													  <form method="post" action="process/updatePedido.php" id="res-update-pedido-' . $upp . '">
														<tr>
															<td>' . $peU ['NumPedido'] . '<input type="hidden" name="num-pedido" value="' . $peU ['NumPedido'] . '"></td>
															<td>' . $peU ['Fecha'] . '</td>
															<td>';
																																											$conUs = ejecutarSQL::consultar ( "select * from cliente where NIT='" . $peU ['NIT'] . "'" );
																																											while ( $UsP = mysql_fetch_array ( $conUs ) ) {
																																												echo $UsP ['Nombre'];
																																											}
																																											echo '</td>
									<td>';
																																											$conUs = ejecutarSQL::consultar ( "select * from cliente where NIT='" . $peU ['NIT'] . "'" );
																																											while ( $UsP = mysql_fetch_array ( $conUs ) ) {
																																												echo $UsP ['Email'];
																																											}
																																											echo '</td>
															<td>';
																																											$conUs = ejecutarSQL::consultar ( "select * from cliente where NIT='" . $peU ['NIT'] . "'" );
																																											while ( $UsP = mysql_fetch_array ( $conUs ) ) {
																																												echo $UsP ['Telefono'];
																																											}
																																											echo '</td>
															<td>' . $peU ['Descuento'] . '%</td>
															<td>' . $peU ['TotalPagar'] . '</td>
															<td>
																<select class="form-control" name="pedido-status">';
																																											if ($peU ['Estado'] == "Pendiente") {
																																												echo '<option value="Pendiente">Pendiente</option>';
																																												echo '<option value="Entregado">Entregado</option>';
																																											}
																																											if ($peU ['Estado'] == "Entregado") {
																																												echo '<option value="Entregado">Entregado</option>';
																																												echo '<option value="Pendiente">Pendiente</option>';
																																											}
																																											echo '</select>
															</td>
															<td class="text-center">
																<button type="submit" class="btn btn-sm btn-success button-UPPE" value="res-update-pedido-' . $upp . '">Actualizar</button>
																<div id="res-update-pedido-' . $upp . '" style="width: 100%; margin:0px; padding:0px;"></div>
															</td>
														</tr>
													  </form>
													</div>
													';
																																											$upp = $upp + 1;
																																										}
																																										?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						 <!--==============================GRAFICA ESTADISTICA===============================-->
						 <div id="canvas-container" style="width:100%;">
<canvas id="chart" width="500" height="350"></canvas>

</div>
				  <div id="canvas1-container" style="width:100%;"float="left">
<canvas id="chart1" width="250" height="175" float="left"></canvas>
</div> 
				   <!--==============================FIN GRAFICA  ===============================-->
					</div>
					<!-- /.row -->
		  
		   
		  
</div>
		</section>
			 <!--==============================FUNCION DISEÑO  CUADRO ESTADISTICA===============================-->
			 <script src="js/menu.js"></script>
					<script type="text/javascript">
$(document).ready(function(){
	var datos = {
		type: "line",
		data :{
			datasets :[{
				label:"Venta",
				data : [
						5,
						10,
						40,
						12,
						28,
						50,
						75,
						
				],
				backgroundColor: [
						ventas="#46BFBD",
						
				],
			}],
			labels : [
					"Enero",
					"Febrero",
					"Marzo",
					"Abril",
					"Mayo",
					"Junio",
					"Julio",
			]
		},
		options : {
			responsive : true,
			title : {
				display : true,
				text : "Reporte de Ventas"
			}
		}
	};

	var canvas = document.getElementById('chart').getContext('2d');
	window.pie = new Chart(canvas, datos);

	setInterval(function(){
		datos.data.datasets.splice(0);
		var newData = {
				label:"Venta",
			backgroundColor : [
					
					"#46BFBD",
					
			],
			data : [getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom(), getRandom()]
		};

		datos.data.datasets.push(newData);

		window.pie.update();

	}, 5000);



		function getRandom(){
			return Math.round(Math.random() * 100);
		}


});
</script>
				   </script>
					<script type="text/javascript">
	$(document).ready(function(){
		
		var datos = {
			labels : ["Enero", "Febrero", "Marzo", "Abril", "Mayo","Junio","Julio"],
			datasets : [{
				label : "Leche",
				backgroundColor : "rgba(93, 92, 93, 0.71)",
				data : [4, 12, 9, 7, 5,13,9]
			},
			{

				label : "Yogurt",
				backgroundColor : "rgba(22, 235, 253, 0.5)",
				data : [10,7,5,6,5,9,12]
			},
			{
				label : "Quesos",
				backgroundColor : "rgba(77, 50, 230, 0.5)",
				data : [9,6,15,6,17,3,15]
			}
			]
		};


		var canvas1 = document.getElementById('chart1').getContext('2d');
		window.bar = new Chart(canvas1, {
			type : "bar",
			data : datos,
			options : {
				elements : {
					rectangle : {
						borderWidth : 0.5,
						borderColor : "rgb(141, 141, 141)",
						borderSkipped : 'bottom'
					}
				},
				responsive : true,
				title : {
					display : true,
					text : "REPORTE DE  VENTAS POR PRODUCTOS"
				}
			}
		});

		setInterval(function(){
			var newData = [
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
				[getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],              
			];

			$.each(datos.datasets, function(i, dataset){
				dataset.data = newData[i];
			});
			window.bar.update();
		}, 5000);

		


		function getRandom(){
			return Math.round(Math.random() * 100);
		}


	});
	</script>


					
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