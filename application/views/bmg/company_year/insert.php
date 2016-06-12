<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">New Year Form</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open('company_setting/insert_year'); ?>
                  <div class="form-group">
                     <label>Name</label> 
                     <u>BMG</u>
                  </div>
                  <!-- text input -->                  
                  <div class="form-group">
                     <label>Year</label> 
                     <select name="year" required>
                        <option value="">- Please Select -</option>
                        <?php for($i = 2010; $i <= 2030; $i++): ?>
                           <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php endfor; ?>
                     </select>
                     <input type="hidden" value="BMG" name="name">
                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="submit" class="btn btn-primary" value="Submit">
              <a href="<?php echo site_url('company_setting'); ?>" class="btn btn-default">Back to List</a>
              </form>
            </div>
         </div>
      </div>
      <div class="col-md-2"></div>
   </div>
</section>
<!-- /.content -->