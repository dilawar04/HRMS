 
<div class="form-group text-right">
 <?php if($this->permission->method('recruitment','create')->access()): ?> 
<button type="button" class="btn btn-primary btn-md" data-target="#add0" data-toggle="modal"  ><i class="fa fa-plus-circle" aria-hidden="true"></i>
<?php echo display('add_interview') ?></button> 
<?php endif; ?>
 <?php if($this->permission->method('recruitment','read')->access()): ?> 
<a href="<?php echo base_url();?>/circularprocess/Candidate_select/candidate_interview_view" class="btn btn-primary"><?php echo display('manage_interview') ?></a>
<?php endif; ?>
</div>
 <div class="row">
    <!--  table area -->
    <div class="col-sm-12">

        <div class="panel panel-default thumbnail"> 

            <div class="panel-body">
                <table width="100%" class="datatable table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        <th><?php echo display('cid') ?></th><th><?php echo display('name') ?></th>
                        <th><?php echo display('can_id') ?></th>
                        <th><?php echo display('job_adv_id') ?></th>
                        <th><?php echo display('interview_date') ?></th>
                        <th><?php echo display('interview_marks') ?></th>
                        <th><?php echo display('written_total_marks') ?></th>
                        <th><?php echo display('mcq_total_marks') ?></th>
                        <th><?php echo display('total_marks') ?></th>
                        <th><?php echo display('selection') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($interview)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($interview as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $que->first_name.' '.$que->last_name; ?></td>
                                    <td><?php echo $que->can_id; ?></td>
                                    <td><?php echo $que->position_name; ?></td>
                                    <td><?php echo $que->interview_date; ?></td>
                                    <td><?php echo $que->interview_marks; ?></td>
                                    <td><?php echo $que->written_total_marks; ?></td>
                                    <td><?php echo $que->mcq_total_marks; ?></td>
                                     <td><?php echo $que->total_marks; ?></td>
                                    <td><?php echo $que->selection; ?></td>
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

 <div id="add0" class="modal fade right" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><strong> INTERVIEW FORM</strong></center>
            </div>
            <div class="modal-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4><?php echo (!empty($title)?$title:null) ?></h4>
                    </div>
                </div>
                <div class="panel-body">

                    <?= form_open('recruitment/Candidate_select/create_interview') ?>
                          <div class="form-group row">
                            <label for="can_id" class="col-sm-2 col-form-label"><?php echo display('candidate_name') ?> *</label>
                            <div class="col-sm-4">
                              
                                <?php echo form_dropdown('can_id', $dropdowninterview,null, ' class="form-control" onchange="SelectToLoad(this.value)" id="c_id" style="width:100%"') ?>
                            </div>
                             <label for="job_adv_id" class="col-sm-2 col-form-label"><?php echo display('job_adv_id') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="position_name" class="form-control" placeholder="<?php echo display('position')?>" readonly>
                        <input type="hidden" name="job_adv_id" class="form-control">
                            </div>
                        </div>
                       
                          <div class="form-group row">
                            <label for="interview_date" class="col-sm-2 col-form-label"><?php echo display('interview_date') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="interview_date" class="datepicker form-control"  placeholder="<?php echo display('interview_date') ?>" id="interview_date" >
                            </div>
                            <label for="interviewer_id" class="col-sm-2 col-form-label"><?php echo display('interviewer_id') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="interviewer_id" class="form-control"  placeholder="<?php echo display('interviewer_id') ?>" id="interviewer_id"  >
                            </div>
                        </div> 

                      
                        <div class="form-group row">
                            <label for="interview_marks" class="col-sm-2 col-form-label"><?php echo display('interview_marks') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="interview_marks" class="txt form-control"  placeholder="<?php echo display('interview_marks') ?>" id="interview_marks"  >
                            </div>
                            <label for="written_total_marks" class="col-sm-2 col-form-label"><?php echo display('written_total_marks') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="written_total_marks" class="txt form-control"  placeholder="<?php echo display('written_total_marks') ?>" id="written_total_marks" >
                            </div>
                        </div> 
        
                        

                      <div class="form-group row">
                            <label for="mcq_total_marks" class="col-sm-2 col-form-label"><?php echo display('mcq_total_marks') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="mcq_total_marks" class="txt form-control"  placeholder="<?php echo display('mcq_total_marks') ?>" id="mcq_total_marks"  >
                            </div>
                            <label for="total_marks" class="col-sm-2 col-form-label"><?php echo display('total_marks') ?> *</label>
                            <div class="col-sm-4">
                                <input type="text" name="total_marks" class=" form-control"  placeholder="<?php echo display('total_marks') ?>" id="total_marks"  >
                            </div>
                        </div>
                         
                        <div class="form-group row">
                            <label for="recommandation" class="col-sm-2 col-form-label"><?php echo display('recommandation') ?></label>
                            <div class="col-sm-4">
                                <input type="text" name="recommandation" class="form-control"  placeholder="<?php echo display('recommandation') ?>" id="recommandation"  >
                            </div>
                            <label for="selection" class="col-sm-2 col-form-label"><?php echo display('selection') ?> *</label>
                            <div class="col-sm-4">
                                
                                <select name="selection" class="form-control"  placeholder="<?php echo display('selection') ?>" id="selection"  style="width: 260px">
                                    <option value="">Selection type</option>
                                    <option value="ok">Selected</option>
                                    <option value="No">Deselected</option>

                                </select>
                            </div>
                        </div> 
        
                        
                        <div class="form-group row">
                            <label for="details" class="col-sm-2 col-form-label"><?php echo display('details') ?></label>
                            <div class="col-sm-10">
                                <textarea name="details" class="form-control"  placeholder="<?php echo display('details') ?>" id="details" ></textarea>
                            </div>
                        </div> 


          
                        <div class="form-group text-right">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('Ad') ?></button>
                        </div>
                    <?php echo form_close() ?>

                </div>  
            </div>
        </div>
    </div>
             
    
   
    </div>
     
            </div>
            <div class="modal-footer">

            </div>

        </div>

    </div>

  
    
     
<script type="text/javascript">
$(document).ready(function(){


    $('.txt').on('keyup', function(){

        var sum = 0;

        $(".txt").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
        });
        $("#total_marks").val(sum.toFixed());

    });

});
</script>
<script type="text/javascript">

function SelectToLoad(id){

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('recruitment/Candidate_select/select_interviewlist/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
              $('[name="job_adv_id"]').val(data.job_adv_id);
              $('[name="interview_date"]').val(data.interview_date);
              $('[name="position_name"]').val(data.position_name);
        
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>
<script language="javascript"> 
    $(function(){
        $("#interview_date").datepicker({ dateFormat:'yy-mm-dd' });
        $("#end_date").datepicker({ dateFormat:'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate());
            $("#end_date").datepicker( "option", "minDate", minValue );
        })
    });
</script>

