<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
         <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
               <?php echo form_open_multipart('booking/insert', array('id' => 'addForm')); ?>
                  <!-- text input -->
                  <div class="form-group" style="text-align: right;">
                     Booking No: <u><b><span id="booking-label"></span></b></u>
                     <?php  
                        $bnum = 1;
                        if($last_booking) {
                           $bnumber = $last_booking->booking_name;
                           $hundreds = (int) substr($bnumber, 11, 1);
                           $tens = (int) substr($bnumber, 12, 1);
                           $ones = (int) substr($bnumber, 13, 1);

                           if($ones > 0) {
                              $bnum = (int) substr($bnumber, 13) + 1;
                              $bnum = '00'.$bnum;
                           }

                           if($tens > 0) {
                              $bnum = (int) substr($bnumber, 12) + 1;
                              $bnum = '0'.$bnum;
                           }

                           if($hundreds > 0) {
                              $bnum = (int) substr($bnumber, 11) + 1;
                           }                                                        
                        }                                     
                     ?>
                     <input type="hidden" value="" id="booking_name" name="booking_name" readonly class="">                                       
                  </div>
                  <div class="form-group">
                     <label>* Project Name</label><br>
                     <input type="text" name="project_name" id="project_name" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>* Customer</label><br>
                     <select name="customer_id" id="customer_id" required class="form-control">
                        <option value="">- Please Select -</option>
                        <?php
                           foreach($customers as $row) {
                              echo '<option value="'.$row->company.'">'.$row->company.'</option>';
                           }
                        ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label>* PO Date</label><br>
                     <input type="date" id="po_date" name="po_date" required>
                  </div>
                  <div class="form-group">
                     <label>* Customer PO No.</label><br>
                     <input type="text" name="cust_po_num" id="cust_po_num" customer_id  class="form-control" required>
                  </div>
                  <div class="form-group">
                     <label>* Currency</label><br>
                     <select id="sel-currency" required>
                        <option value="">- Please Select -</option>
                        <?php 
                           foreach($currencies as $currency) {
                              echo '<option value="'.$currency->name.'|'.$currency->rate.'">'.$currency->name.'</option>';
                           }
                        ?>                       
                     </select>
                     <i class="fa fa-chevron-right" style="color: #d6d6d6;"></i><i class="fa fa-chevron-right" style="color: #b0b1b2;"></i><i class="fa fa-chevron-right" style="color: #999999;"></i> 
                     <input type="text" size="5" name="rate" id="rate" required>
                     <input type="hidden" name="currency" id="currency" value="">                        
                     <input type="hidden" name="year" class="" value="<?php echo $year; ?>">                     
                  </div>
                  <div class="form-group">
                     <label>PDF/JPG Upload</label><br>
                     <input type="file" name="userfile" class="form-control">                    
                  </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="button" id="btn-add" onclick="addSubmit();" class="btn btn-primary" value="Submit">
              <a href="" class="btn btn-default">Cancel</a>
              </form>
              <!--<a href="<?php echo site_url('booking?year='.$year); ?>" class="btn btn-default">Back to List</a>-->
            </div>
         </div>
      </div>
      <div class="col-md-3"></div>
   </div>
</section>
<!-- /.content -->
<script>
   function addSubmit() {
    var error = '';
    var r = false;
      var pname = $('#project_name').val();
      var customer_id = $('#customer_id').val();
      var po_date = $('#po_date').val();
      var cust_po_num = $('#cust_po_num').val();
      var cur = $('#sel-currency').val();
      var rate = $('#rate').val();  

      if(pname == '') {
         error += '- Project name is required.\n';
      }

      if(customer_id == '') {
         error += '- Customer is required.\n';
      }

      if(po_date == '') {
         error += '- PO Date is required.\n';
      }

      if(cust_po_num == '') {
         error += '- Customer PO No. is required.\n';
      }

      if(cur == '') {
         error += '- Currency is required.\n';
      }

      if(rate == '') {
         error += '- Currency Rate is required.\n';
      }

    if(error == '') {
      document.getElementById("addForm").submit();
    } else {
      alert(error);
    }
  }
  
   $('#sel-currency').change(function() {
      var sp = $(this).val().split('|');     
      
      $('#currency').val(sp[0]);
      $('#rate').val(sp[1]);
   });

   $('#po_date').change(function() {
      var ths = $(this).val();
      var split = ths.split('-');
      //var yr = '<?php echo $year; ?>';
      var yr = split[0];
      var mm = split[1];
      var booking = 'BMG'+yr+'-'+mm+'-<?php echo $bnum; ?>';

      $('#booking-label').text(booking);
      $('#booking_name').val(booking);
   });
</script>