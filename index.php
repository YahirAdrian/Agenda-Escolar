<html>
    <head>
        <title>Agenda de clases</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="css/responsive.css"/>
        <link rel="shortcut icon" type="image/x-icon" href="src/favicon.ico" />
    </head>

    <body>
        <?php
            $servername = "localhost";
            $database = "id15224713_agendaescolar";
            $username = "id15224713_agenda";
            $password = "EnjoyCoding1;";
            $conexion = new mysqli($servername, $username, $password, $database);
            $conexion->set_charset("utf8");
        
            if ($conexion->connect_error){
                die('Error de Conexion ('.$db->connect_error.')'.$db->connect_error);
            }
        ?>
        <div id="menu">
            <ul class="nav-links">
                <li>Opción 1</li>
                <li>Opción 2</li>
                <li>Opción 3</li>
                <li>Opción 4</li>

            </ul>
        </div>
        
        <div class="cabecera">
            <h1>
                <image src="src/icono.png" width="50" height="45" style="padding-top:4px"/>
                Agenda Diaria Escolar 5AMPR
            </h1><br/>
            <div id="opciones" style ="opacity: 0;"><a href="registro.html"><img src="src/usuario.png"/></a></div>
        </div>
		<div class="central">
			<section>
				<div class="tabla">
					<p id="hora-actualizacion">
						<?php
							$consulta_hora = "SELECT * FROM Reuniones WHERE Materia = 'Actualizacion'";
							$resultados = mysqli_query($conexion, $consulta_hora);
							while($consulta = mysqli_fetch_array($resultados))
							{
							  echo "Actualizado: " . substr($consulta['Hora'], 1); //campo
							}
						?>
					</p>
					<hr/>
					<h1 id="tarea">Tareas de hoy</h1>
					<table>
						<thead>
							<tr>
								<th>Materia</th>
								<th>Tareas</th>
							</tr>
						</thead>

						<tbody>
							<?php
								$query = "SELECT * FROM Tareas";
								$result = $conexion->query($query);
								$numfilas = $result->num_rows;
								//echo "El número de elementos es ".$numfilas;
		
								for ($x=0;$x<$numfilas;$x++) {
									$fila = $result->fetch_object();
									
									if($fila->tarea != 'N/A')
									{
										echo "<tr>";
										echo "<td  data-titulo='Materia:'>" . $fila->materia . "</td>";
										echo "<td><ul>" . $fila->tarea . "</ul></td>";
										echo "</tr>";
									}
								}
		
								$result->free();
							?>
						</tbody>
					</table>
					
					<div class="observacion_final">
						<!--<img src="src/imagenes/bailando.gif" alt="g"/>-->
						<p></p>
					</div>
				</div>

				<hr/>

				<div class="tabla horario">
					<h1 id="horario">Reuniones para el dia de mañana</h1>

					<table>
						<thead>
							<tr>
								<th>Materia</th>
								<th>Hora</th>
							</tr>
						</thead>

						<tbody>
							<?php
									$query = "SELECT * FROM Reuniones ORDER BY Hora LIMIT 0,5";
									$result = $conexion->query($query);
									$numfilas = $result->num_rows;

									for ($x=0;$x<$numfilas;$x++) {
										$fila = $result->fetch_object();
										
										if($fila->Hora != 'N/A')
										{
										echo "<tr>";
										echo "<td data-titulo='Materia:'>" . $fila->Materia . "</td>";
										echo "<td><ul>" . $fila->Hora . "</ul></td>";
										echo "</tr>";
										}
									}
			
									$result->free();
								?>
						</tbody>
					</table>
					
				</div>

				<div class="comentarios">
					<h3>Comentarios</h3>
					<p>Deja un comentario u observación</p>

					<form action="">
						<p class="rotulo-formulario">Nombre</p>
						<input type="text" class="campo-comentario"/><br/>
						<p class="rotulo-formulario">Comentario</p>
						<input type="text" class="campo-comentario"/><br/>
						<input type="submit" id="boton-comentar" value="Comentar"/>
					</form>
				</div>
				
				<div class="observacion_final">
					<img src="src/imagenes/gato_teclado.gif" alt="a"/>
					
				</div>
			</section>
			
			<aside>
				
				<div class="avisos">
					<h1 id="rotulo-horario">Horario de clase</h1>
					<img src="src/Horario.png" alt="Horario de clase"/>
				</div>

				<div class="avisos">
					<h1 id="rotulo-aviso">Acceso a reuniones</h1>
					<a href="https://cbtis28.ozelot.tech/" target="_blank">
						<button style="background-color: #9f2241">Ir a Ozelot</button><br>
					</a>

					<a href="https://meet.google.com/xvv-mspb-vdk" target="_blank">
						<button>Inglés</button><br>
					</a>

					<a href="https://meet.google.com/ahe-gvbh-zai" target="_blank">
						<button>CTSyV</button><br>
					</a>

					<a href="https://teams.microsoft.com/l/meetup-join/19%3a7afb04ef7bf344259c2c2cd5256b7ef0%40thread.tacv2/1600794274456?context=%7b%22Tid%22%3a%22953420d2-c95e-4f65-9573-b601a94f4390%22%2c%22Oid%22%3a%22742f33cf-2590-4803-8607-9be441eee0a9%22%7d" target="_blank">
						<button>Bases de Datos</button><br>
					</a>

					<a href="https://us04web.zoom.us/j/72687279739?pwd=RTlaK2lINjhIZFJZajRkUDZXek1Gdz09" target="_blank">
						<button>Aplicaciones Web</button><br>
					</a>

					<a href="https://cbtis28.ozelot.tech/mod/url/view.php?id=11273" target="_blank">
						<button>Física</button><br>
					</a>
				</div>
			</aside>
		</div>
        <footer>
			<div class="contacto">
				<h1>Contacto con los profesores</h1>
				<h2>Contacto via correo de ozelot</h2>
				<a href="https://cbtis28.ozelot.tech/local/mail/compose.php?m=6008" target="_blank">
						<button>Calculo Integral</button><br>
				</a>
				
				<a href="https://cbtis28.ozelot.tech/local/mail/compose.php?m=6009" target="_blank">
						<button>CTSyV</button><br>
				</a>
				
				<a href="https://cbtis28.ozelot.tech/local/mail/compose.php?m=6010" target="_blank">
						<button>Bases de datos</button><br>
				</a>				
				
				<a href="https://cbtis28.ozelot.tech/local/mail/compose.php?m=6013" target="_blank">
						<button>Aplicaciones Web</button><br>
				</a>				
				
				<a href="https://cbtis28.ozelot.tech/local/mail/compose.php?m=6012" target="_blank">
						<button>Inglés</button><br>
				</a>

				<a href="https://cbtis28.ozelot.tech/local/mail/compose.php?m=6015" target="_blank">
						<button>Física</button><br>
				</a>				
			</div>
        </footer>
        <script src="js/app.js"></script>
    </body>
</html>