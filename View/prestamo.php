<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/estilos.css">

    <title>Sistema de Biblioteca IU Digital</title>
  </head>
  <body>
    

<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="badge bg-primary text-wrap" style="width: 7rem;">
                Sistema de Biblioteca IU Digital
                </div>
                
                <a class="navbar-brand" href="../index.php">Inicio</a>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link active" aria-current="page" href="listarUsuario.php">Listar Usuario</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarLibro.php">Listar Libro</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarAutor.php">Listar Autor</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarEjemplar.php">Listar Ejemplar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="listarPrestamo.php">Listar Prestamos</a>
                </li>
                
                  </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
                </div>
          </div>
      </nav>



          



    <div class="container">
        <div class="login-container">
          <div class="register">
            <h2>Prestamo</h2>
            <form method="POST" action="../Controller/PrestamoController.php">
                <input type="hidden" placeholder="Codigo" name="id">
                
          <?php 
          include('../Model/clsConexion.php');
                             
          $conn = new Conexion();
          $conn->CrearConexionSin();

          $sql = "SELECT * FROM usuario";
          $result = $conn->EjecutarSQL($sql);

          ?>

                <label for="id_usuario">Usuario</label>
                <select id="id_usuario" class="form-control" name="id_usuario">
                <?php 
                while($row = $result->fetch_array(MYSQLI_BOTH))
                 { ?>
                <option value="<?php echo $row['id']; ?>">
                              <?php echo $row['nombre']; ?></option>
                <?php } ?>
                </select>



                

          <?php 
          $sql = "SELECT * FROM libro";
          $result = $conn->EjecutarSQL($sql);

          ?>

                <label for="id_libro">Ejemplar</label>
                <select id="id_libro" class="form-control" name="id_libro">
                <?php 
                while($row = $result->fetch_array(MYSQLI_BOTH))
                 { ?>
                <option value="<?php echo $row['id']; ?>">
                              <?php echo $row['titulo']; ?></option>
                <?php } ?>
                </select>


                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_prestamo">Fecha de Prestamo</label>
                                        <input id="fecha_prestamo" class="form-control" type="date" name="fecha_prestamo" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_devolucion">Fecha de Devolución</label>
                                        <input id="fecha_devolucion" class="form-control" type="date" name="fecha_devolucion" value="<?php echo date("Y-m-d"); ?>">
                                    </div>
                                </div>
                            </div>
          

                
                <input type="submit" class="btn btn-primary active" value="AGREGAR" name="Registrar">
            </form>              
          </div>        
        </div>
    </div>

  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

   
  </body>
</html>