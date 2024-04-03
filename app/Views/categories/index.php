<section class="content">
<form method="get">
  <div class=" container w-25 input-group input-group-sm">
    <input class="form-control form-control-navbar" type="search" value="<?=$keyword;?>"  name="keyword" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
      <button class="btn btn-navbar" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </div>
 <?php if(Session::get('success')){
?>
  <div class="alert alert-success h3" id="success">
  <?=Session::get('success');?>
  </div>
 <?php
  Session::del('success');
}?>
  <?php if(Session::get('info')){
?>
  <div class="alert alert-info h3" id="info">
  <?=Session::get('info');?>
  </div>
 <?php
  Session::del('info');
}?>
 <?php if(Session::get('error')){
?>
  <div class="alert alert-error h3" id="error">
  <?=Session::get('error');?>
  </div>
 <?php
  Session::del('error');
}?>
</form>
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped" id="example">
        <thead>
          <tr>
            <th>S.No.</th>
            <th>Category Name</th>
            <th>Description</th>
            <th>Delete</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="4" align="right">
              <a class="btn btn-primary" href="<?=ROOT.'categories/create';?>">New</a>
            </td>
          </tr>
          <?php
          if(!$catdata){
            ?>
            <tr>
              <th class="text-danger" colspan="4">Data not found</th> 
            </tr>
            <?php
          }else{
          $index=1;
          foreach($catdata as $info){?>
          <tr title="Double click for edit" style="cursor:pointer" ondblclick="jsredirect('<?=ROOT;?>categories/edit/<?=urlencode(base64_encode($info['id']));?>')">
            <td><?=$index++;?></td>
            <td><?=$info['name'];?></td>
            <td><?=$info['des'];?></td>
            
            <td >
              <a class="btn btn-primary" href="#" onclick="jsredirect('<?=ROOT.'categories/destroy/'.urlencode(base64_encode($info['id']));?>','Do you really want to delete this record?')">Delete</a>
            </td>
          </tr>
          </tr>
          <?php } 
          }
          ?>
        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>