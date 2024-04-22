<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL_NO</th>
                    <th>NAME</th>
                    <th>ADDRESS</th>
                    <th>PINCODE</th>
                    <th> PHONE NUMBER</th>
                    <th>COUNTRY</th>
                    <th>STATE</th>
                    <th>DISTRICT</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
                        $i=0;

                        foreach($data as $values){

                          $i++;
                          
                        
                        
                        ?>
                    <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $values->FNAME;?></td>
                      <td><?php echo $values->ADDRESS;?></td>
                      <td><?php echo $values->PIN;?></td>
                      <td><?php echo $values->PHONE;?></td>
                      <td><?php echo $values->COUNTRY;?></td>
                      <td><?php echo $values->STATE;?></td>
                      <td><?php echo $values->DISTRICT;?></td>
                      
                    </tr>

                    <?php }?>
                
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  