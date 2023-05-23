<table class="table">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Entrada</th>
        <th scope="col">Data Entrada</th>
        <th scope="col">Produto</th>
        <th scope="col">H_disp</th>
        <th scope="col">Q_CS</th>
        <th scope="col">Ag_Tq_Fus</th>
        <th scope="col">BB_Fus</th>
        <th scope="col">Q_Sol</th>
        <th scope="col">HH_Prog</th>
        <th scope="col">...</th>

      </tr>
    </thead>
    <tbody>
        <?php
        while($userData = mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo"<td>".$userData['id']."</td>";
        }
        ?>
    </tbody>
</table>