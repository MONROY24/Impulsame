<?php
session_start();
include_once "Conexion.php";
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
          $sql = mysqli_query($conexion, "SELECT * FROM perfil WHERE ID_Perfil= {$_SESSION['id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>
          <img src="data:image/*;base64,<?php
echo base64_encode($row['Foto']) ?>" alt="">
          <div class="details">
            <span><?php echo $row['Nombre1'] . " " . $row['Apellido1'] ?></span>
            <p><?php echo $row['Cuenta']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['ID_Perfil']; ?>" class="logout">Cerrar Sesión</a>
      </header>
      <div class="search">
        <span class="text">Selecciona un usuario para iniciar el chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>

</html>