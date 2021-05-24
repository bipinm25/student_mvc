<div class="col d-flex justify-content-center">
    <h2>STUDENT LIST</h2>
</div>
<div class="row">
    <div class="pull-right"> 
        <a class="btn btn-info" href="/registration">Register</a>
    </div>
</div>
<br>
<div class="row">
<table class="table table-bordered border-primary">
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th> 
      <th scope="col">Action</th>     
    </tr>
  </thead>
  <tbody>
  <?php
   foreach($data as $d){ ?>
    <tr>
        <th scope="row"><?=$d['id']?></th>
        <td><?=$d['first_name']?></td>
        <td><?=$d['last_name']?></td>
        <td><a href="/registration?id=<?=$d['id']?>">Edit</a> &nbsp;<a data-id="<?=$d['id']?>" href="javascript:;" class="delete">Delete</a></td> 
    </tr>
  <?php  } ?>     
  </tbody>
</table>
</div>
<?=$pagination?>