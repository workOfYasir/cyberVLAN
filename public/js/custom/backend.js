let user_table;
$(document).ready(function() {

    user_table = $('#user-table').DataTable();

    $('.edit-service').on('click', function() {
        var prop_id = $(this).data('id');
        console.log(prop_id);

        $.ajax({
            type: 'GET',
            url: "{{route('service.edit', '')}}" + "/" + prop_id,
            dataType:'json',
            success: function(data) {
                console.log(data[0])
                $('.service_title').val(data[0].name);
            }
        })

    })
    $('.edit-category').on('click', function() {
        var prop_id = $(this).data('id');
        console.log(prop_id);

        $.ajax({
            type: 'GET',
            url: "{{route('category.edit', '')}}" + "/" + prop_id,
            dataType:'json',
            success: function(data) {
                console.log('cat',data[0])
                $('.category_title').val(data[0].category_name);
                $('.category_id').val(data[0].id);
                $('.category_status').val(data[0].status);
                $('#parent_categoryy').val(data[0].parent_category).attr('select',true)
               
               
          
                if(data[0].status==null)
                {
                    $(".category_status").prop("checked", false);
                    
                }else if(data[0].status==1){
                    $(".category_status").prop("checked", true);
                }
            }
        })

    })
    $('.edit-role').on('click', function() {
        var prop_id = $(this).data('id');
        console.log(prop_id);

        $.ajax({
            type: 'GET',
            url: "{{route('roles.edit', '')}}" + "/" + prop_id,

            success: function(data) {
                console.log(data[0])
                $('.role-name').val(data[0].name);
            }
        })

    })
    var userCount = 0
    $('.edit-user').on('click', function() {
        var prop_id = $(this).data('id');
        console.log(prop_id);

        $.ajax({
            type: 'GET',
            url: "{{route('users.edit', '')}}" + "/" + prop_id,

            success: function(data) {

                $('.user_id').val(data['data']['id'])
                $('.user_name').val(data['data']['first_name']);
                $('.user_email').val(data['data']['email']);
                if (userCount == 0) {
                    for (let i = 0; i < (data['roles'].length); i++) {

                        $('.user_role').append('<option value="' + data['roles'][i] + '" ' + ((data['roles'][i] == data['userRole']) ? 'selected' : '') + '>' + data['roles'][i] + '</option>');
                        userCount++;
                    }
                    for (let i = 0; i < (data['permissions'].length); i++) {

                        $('.user_permission').append('<option value="' + data['permissions'][i] + '" ' + ((data['permissions'][i] == data['userPermission']) ? 'selected' : '') + '>' + data['permissions'][i] + '</option>');
                        userCount++;
                    }
                }
            }
        })

    })

    $('.approve-btn').on('click', function() {
        console.log(user_approve);
      $('.approve-form').submit(function (e){
        e.preventDefault();
        approve_data = $('.approve-user-data').val();
        
        
        approve=1;
        $.ajax({
            type: 'GET',
            url: user_approve,
            data: {
                "_token":"{{ csrf_token() }}",
                "approve_id":approve_data,
                "approve":approve,
                },
            success: function(data) {
               console.log(data);
               for (let index = 0; index < data.length; index++) {
                
                $('.approve-badge-'+data[index]).html('<label class="badge badge-light-success status-badge"id="status-badge">Approve</label>')
               }
                
           
            }
        })
      })
      
    });

    $('.unapprove-btn').on('click', function() {

        $('.approve-form').submit(function (e){
            e.preventDefault();
            approve_data = $('.approve-user-data').val();
            
            approve=0;
            $.ajax({
                type: 'GET',
                url: user_approve,
                data: {
                    "_token":"{{ csrf_token() }}",
                    "approve_id":approve_data,
                    "approve":approve,
                    },
                success: function(data) {
                    
                    for (let index = 0; index < data.length; index++) {
                        
                        $('.approve-badge-'+data[index]).empty().append('<label class="badge badge-light-danger status-badge"id="status-badge">Pending</label>')
                    }              
                    
                }
            })
        })

    });
   

})