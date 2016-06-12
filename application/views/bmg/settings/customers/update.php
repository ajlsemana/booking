<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Customer Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open_multipart('customers/update'); ?>
               <?php
                  if($data->uploaded_file == '') {
                     echo '<img width="120" height="120" src="'.base_url().'images/customers/no-photo.jpg" alt="customer">';
                   } else {
                     echo  '<img width="120" height="120" src="'.base_url().'uploads/customers/'.$data->uploaded_file.'" alt="customer">';
                   }
               ?>
                  <div class="form-group">
                     <label>Company Logo</label>
                     <i>(jpg or png only)</i>
                     <br>
                     <input type="file" name="userfile" class="form-control">
                     <input type="hidden" name="old_pic" value="<?php echo $data->uploaded_file; ?>">
                  </div>
                  <!-- text input -->
                  <div class="form-group">
                     <label>Company</label>
                     <input type="text" name="company" value="<?php echo $data->company; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Address</label><br>
                     <input type="text" name="address" value="<?php echo $data->address; ?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>Contact Person</label>                     
                     <input type="text" name="contact_person" value="<?php echo $data->contact_person; ?>" class="form-control" required>
                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <input type="hidden" name="id" value="<?php echo $data->id; ?>">
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="<?php echo site_url('customers'); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-2"></div>
   </div>
</section>
<!-- /.content -->