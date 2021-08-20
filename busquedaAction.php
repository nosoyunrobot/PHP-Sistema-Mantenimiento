
          <?php 

          include 'db.php';
          
          if(!empty($_POST['busqueda'])){
            $busqueda = explode(" ", $_POST['busqueda']);
            $sql = "SELECT * FROM personal where nombre_pers LIKE '%".$busqueda[0]."%'";

            for($i = 1; $i<count($busqueda); $i++){
              if(!empty($busqueda[$i])){
                $sql .= "AND nombre_pers LIKE '%".$busqueda[$i]."%'";
              }
            }
            //limite de consulta
            $sql .= "LIMIT 3";

            $result = mysqli_query($conexion, $sql);

            while($item = mysqli_fetch_assoc($result)){
              echo '
              <ul class="list-group">
                <li class="list-group-item mt-3" aria-current="true">'.$item['nombre_pers'].'</li>
              </ul>
              ';
            };            
          };

          ?>