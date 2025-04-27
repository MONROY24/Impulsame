<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").on("input", function() {
                var searchText = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "",
                    data: { search: searchText },
                    success: function(response) {
                        $("#results").html(response);
                    }
                });
            });
        });
    </script>

</head>
<body>
    <div style="width: 50%;
  vertical-align: middle;
  white-space: nowrap;
  position: relative;margin-top: 1.5%;">
    <form>
        <center>
            <input type="text" style="background: #e9eef0;
  border: 0.5px solid black;
  font-size: 10pt;
  float: left;
  color: #63717f;
  padding-left: 55px;
width: 100%;
height: 30px;
max-height: 40px;
  border-radius: 20px; margin-top: 15px;" id="search" placeholder="Buscar">
  <div  id="no" style="width: 40px;height: 40px; position: absolute;border-radius: 50%;background: #050000; line-height: 40px; text-align: center; margin-top: 10px;" ><span class="icon" style="color: white;"><i class="fa fa-search"></i></span></div>

        </center>
</form>
</div>
    <div id="results">
        <?php

        if(isset($_POST["search"])) {
            $search = $_POST["search"];

            $query = "SELECT * FROM profesion  WHERE Nombre1  LIKE '%$search%' AND  Nombre2  LIKE '%$search%' AND  Nombre3  LIKE '%$search%'";
            $result = $conexion->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<p>" . $row["Nombre1"] . "</p>";
                }
            } else {
                echo "<p>No se encontraron resultados</p>";
            }
        }

        ?>
    </div>
</body>
</html>
