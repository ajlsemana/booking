<!-- Main content -->
<section class="content">
	<div class="row">    
		<div class="col-md-4">
			<div class="box">
        <?php echo form_open('settings/delete_currency', array('id' => 'form-delete')); ?>                
                <div class="box-header">
                  <a href="<?php echo site_url('settings/add_form_currency'); ?>"><i class="fa fa-plus-circle"></i> Add</a>
                  &nbsp;&nbsp;
                  <a href="" id="a-delete"><i class="fa fa-trash"></i> Delete</a>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>
                        <input type="checkbox" id="main_checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                      </th>    
                      <th>Currency Name</th>
                      <th>Rate</th>          
                      <th>Action</th>
                    </tr>
                    <?php
                      $html = '';
                      if(count($currencies) > 0) {
                        foreach($currencies as $currency) {
                          $html .= '<tr>';
                          $html .= '<td><input type="checkbox" value="'.$currency->id.'" class="checkbox" name="selected[]"></td>';
                          $html .= '<td>';
                            $html .= $currency->name;
                          $html .= '</td>';
                          $html .= '<td>';
                            $html .= $currency->rate;
                          $html .= '</td>';
                          $html .= '<td>';
                            $html .= '<a href="'.site_url('settings/update_form_currency?id='.$currency->id).'" title="update"><i class="fa fa-pencil"></i></a>';                            
                          $html .= '</td>';
                          $html .= '</tr>';
                        }
                      } else {
                        $html .= '<tr align="center">';
                        $html .= '<td colspan="4">';
                          $html .= 'Empty Results';
                        $html .= '</td>';
                        $html .= '</tr>';
                      }
                      echo $html;
                    ?>
                  </tbody>
                </table>
                </div><!-- /.box-body -->
              </div>
            </form>
		</div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
	</div>
</section>
<!-- /.content -->
<script>
  $('#a-delete').click(function(e) {
    e.preventDefault();
    var ctr = $('.checkbox:checked').length;

    if(ctr > 0) {
      if(confirm('Are you sure you want to delete selected rows?')) {
        $('#form-delete').submit();
      }
    } else {
      alert('Please select rows to delete.');
    }
  });

  $('.checkbox').click(function() {
    if (! $(this).is(':checked')) {
      $('#main_checkbox').attr('checked', false);
    }
  });
</script>
<?php
  $uri_crud = $this->uri->segment(3);

  if(! empty($uri_crud)) {
    ?>
      <script>
        setTimeout(function(){ window.location.href = '<?php echo site_url('settings/currencies'); ?>'; }, 1000);
      </script>
    <?php
  }
?>