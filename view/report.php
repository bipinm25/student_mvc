<div class="col d-flex justify-content-center">
    <h2>REPORT</h2>
</div>

<div class="row">
<table class="table table-bordered border-primary">
<thead>
    <tr>     
      <th scope="col">Student Name</th>
      <th scope="col">Course Name</th>           
    </tr>
  </thead>
  <tbody>
  <?php
  if(isset($report_date)){
    foreach($report_date as $r){
      echo '<tr>     
              <td>'.$r['full_name'].'</td>
              <td>'.$r['course_name'].'</td>        
            </tr>';
    }
  }
  ?>   
  </tbody>
</table>
</div>
<?=$pagination?>