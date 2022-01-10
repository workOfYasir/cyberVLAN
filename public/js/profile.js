$('#addWork').click(function() {
    var row_no = $('#row').val();
    row_no++;
    $('#row').val(row_no);
    var work_form = '<div id="work_'+row_no+'" ><br><hr><br><div class="row"><div class="col-md-12 text-end"><button type="button" class="btn btn-md" style="color: #ff8a00" onclick="deleteWork('+row_no+')"  title="Delete Work" id="destroyWork">❌</button></div><div class="form-group mb-3 col-md-6"><label class="form-label">Starting Date</label><div class="input-group date"><input type="date" class="form-control" id="work_starting_'+row_no+'" name="work_starting[]" placeholder="Starting Date"></div></div><div class="form-group mb-3 col-md-6"><label class="form-label">Ending Date</label><div class="input-group date"><input type="date" class="form-control" id="work_ending_'+row_no+'" name="work_ending[]" placeholder="Ending Date"></div></div><div class="form-group mb-3 col-md-6"><label class="form-label">Company</label><input type="text" class="form-control" id="company_name_'+row_no+'" name="company_name[]" placeholder="Company Name"></div><div class="form-group mb-3 col-md-6"><label class="form-label">Designation</label><input type="text" class="form-control" id="designation_'+row_no+'" name="designation[]" placeholder="Designation"></div><div class="form-group mb-0 col-md-12"><label class="form-label">Description</label><textarea class="form-control" rows="5" id="company_description_'+row_no+'" name="company_description[]" placeholder="Description"></textarea></div></div></div>';
    $('.work-form-wrapper').append(work_form);
});
$('#addProject').click(function() {
    var row_no = $('#row').val();
    row_no++;
    $('#row').val(row_no);
    var project_form = '<div id="project_'+row_no+'" ><br><hr><br><div class="row"><div class="col-md-12 text-end"><button type="button" class="btn btn-md" style="color: #ff8a00" onclick="deleteProject('+row_no+')"  title="Delete Work" id="destroyWork">❌</button></div><div class="form-group mb-3 col-md-12"><label class="form-label">Project Title</label><div class="input-group date"><input type="text" class="form-control" id="project_title_'+row_no+'" name="project_title[]"  placeholder="Project Title"></div></div><div class="form-group mb-0 col-md-12"><label class="form-label">Description</label><textarea class="form-control" rows="5" id="project_description_'+row_no+'" name="project_description[]" placeholder="Project Details"></textarea></div></div>';
    $('.project-form-wrapper').append(project_form);

});
function deleteWork(index) {
    if($('#work_id_'+index).val()==undefined){
        $('#work_'+index).remove();
    }else{
       id = $('#work_id_'+index).val();
        $.ajax({
            type: 'GET',
            url: '/freelancerWork/delete/'+id,
            dataType:'json',
            success: function(data) {
                $("#works").load(" #works");
                console.log(data)
               
            }
        })
    }
    
}

function deleteProject(index) {
    if($('#project_id_'+index).val()==undefined){
        $('#project_'+index).remove();
    }else{
       id = $('#project_id_'+index).val();
        $.ajax({
            type: 'GET',
            url: '/freelancerProject/delete/'+id,
            dataType:'json',
            success: function(data) {
                $("#projects").load(" #projects");
                console.log(data)
               
            }
        })
    }
}