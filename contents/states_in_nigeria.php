<?php 
     require("engine/connection.php");
     $getstates = $con->prepare("SELECT DISTINCT state FROM states_in_nigeria GROUP BY state");
     if($getstates->execute()){
         $result = $getstates->get_result();
         while($data = $result->fetch_assoc()){ ?>
             <option value="<?= htmlspecialchars($data['state'])?>"><?= htmlspecialchars($data['state'])?></option> 
<?php 
         }
     }

?>
