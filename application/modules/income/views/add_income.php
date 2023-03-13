  <style type="text/css">
div.dataTables_wrapper div.dataTables_filter input {
    margin-left: 0.5em;
    display: inline-block;
    width: 100px;
}
</style> 
  <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                       
                    </div>
                </div>
                <div class="panel-body">
                 <div class="col-sm-6 col-md-6">
                    <?= form_open('income/Income/income_item'); ?>
                   <?php echo form_hidden('id', (!empty($incomeinfo->id)?$incomeinfo->id:null)) ?>
                       <div class="form-group row">
                           
                            <label for="income_field" class="col-sm-3 col-form-label">
                            <?php echo display('income_field') ?></label>
                            <div class="col-sm-6">
                           <input type="text" name="income_field" class="form-control" value="<?php echo (!empty($incomeinfo->income_field)?$incomeinfo->income_field:null) ?>" placeholder="<?php echo display('income_field') ?>">
                            <input type="hidden" name="oldname" class=" form-control" value="<?php echo (!empty($incomeinfo->income_field)?$incomeinfo->income_field:null) ?>" placeholder="<?php echo display('income_field') ?>">
                               
                            </div>
                           
                        </div>
                             
                        
                        <div class="form-group text-center">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo (!empty($incomeinfo->income_field)?display('update'):display('save')) ?></button>
                        </div>
                    <?php echo form_close() ?>
                  </div>
                  <div class="col-sm-6 col-md-6">
                     <table width="100%" id="datatable1" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th><?php echo display('Sl') ?></th>
                            <th><?php echo display('income_field') ?></th>
                           <th><?php echo display('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($incomes)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($incomes as $income) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $income->income_field; ?></td>
                                    <td class="center">
                                    <?php if($this->permission->method('income_field','update')->access()): ?> 
                                        <a href="<?php echo base_url("income/Income/income_item/$income->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                                        <?php endif; ?>
                                    
                                    <?php if($this->permission->method('income_field','delete')->access()): ?> 
                                        <a href="<?php echo base_url("income/Income/delete_income/$income->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo display('are_you_sure') ?>') "><i class="fa fa-trash"></i></a> 
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                </table>  <!-- /.table-responsive -->
                  </div>

                </div>  
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#datatable1').DataTable({ 
        responsive: true, 
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp", 
        "lengthMenu": [[ 25, 50, 100, 150, 200, 500, -1], [ 25, 50, 100, 150, 200, 500, "All"]], 
        buttons: [   
            {extend: 'pdf', title: 'income Item List', className: 'btn-sm'}, 
            {extend: 'print', className: 'btn-sm'} 
        ] 
    });
          });
</script>