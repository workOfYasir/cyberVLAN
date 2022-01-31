
$('#job_timeline').change(function(){
    
    job_timeline = $('#job_timeline option:selected').text();
    console.log(job_timeline);
    if(job_timeline=='Long term - weekly'){
        $('#hours').empty();
        $('#days').empty();
        $('#hours').append('<div class="col-12"> <label class="form-label" for="job-description">Hours</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control" placeholder="Minimum Hours" name="hours_min" value="81" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Hours" name="hours_max" value="240" ></div></div>')
        $('#days').append('<div class="col-12"> <label class="form-label" for="job-description">Days</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control" placeholder="Minimum Days" name="days_min" value="10" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Days" name="days_max" value="24" ></div></div>')
        console.log('oksssssss1')
    }else if(job_timeline=='Short term - hourly'){
        $('#hours').empty();
        $('#days').empty();
        $('#hours').append('<div class="col-12"> <label class="form-label" for="job-description">Hours</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control" placeholder="Minimum Hours" name="hours_min" value="1" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Hours" name="hours_max" value="80" ></div></div>')
        $('#days').append('<div class="col-12"> <label class="form-label" for="job-description">Days</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control" placeholder="Minimum Days" name="days_min" value="1" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Days" name="days_max" value="10" ></div></div>')
        console.log('oksssssss2')
    }else if(job_timeline=='Project base'){
        $('#hours').empty();
        $('#days').empty();
        console.log('oksssssss3')
    }else if(job_timeline=='Hourly base'){
        $('#hours').empty();
        $('#days').empty();
        $('#hours').append('<div class="col-12"> <label class="form-label" for="job-description">Hours</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control" placeholder="Minimum Hours" name="hours_min" value="1" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Hours" name="hours_max" value="8" ></div></div>')
        $('#days').append('<div class="col-12"> <label class="form-label" for="job-description">Days</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control" placeholder="Minimum Days" name="days_min" value="1" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Days" name="days_max" value="1" ></div></div>')
        console.log('oksssssss4')
    }else if(job_timeline=='Monthly'){
        $('#hours').empty();
        $('#days').empty();
        $('#days').append('<div class="col-12"> <label class="form-label" for="job-description">Days</label></div><div class="col-12 d-flex"><div class="col-6"><label class="form-label">Minimum</label></div><div class="col-6"><label class="form-label">Maximum</label></div></div><div class="col-12 d-flex"><div class="col-6"><input type="number" class="form-control"  placeholder="Minimum Days" name="days_min" value="30" ></div><div class="col-6"><input type="number" class="form-control" placeholder="Maximum Days" name="days_max" value="360" ></div></div>')
        console.log('oksssssss5')
    }else if(job_timeline=='Yearly contract'){
        $('#hours').empty();
        $('#days').empty();
        $('#days').append('<div class="col-12"> <label class="form-label" for="job-description">Days</label><input type="number" class="form-control" placeholder="Maximum Days" name="days_max" name="max_days" value="360" >')
        console.log('oksssssss6')
    }
})
