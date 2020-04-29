$(document).ready(function() {
    $('#welfarelist').DataTable( {
         "ajax":{
            "type" : "GET",
            "url" : "../get_welfare_data.php",
            "dataSrc": function ( json ) {
                return json['welfare_list'];
            }
          },
          "columns": [
                { "data": "upazila_name" },
                { "data": "no_of_population" },
                { "data": "no_of_families" },
                { "data": "avg_no_of_each_family_member" },
                { "data": "avg_family_wise_monthly_earning" },
                { "data": "no_of_poor_family" }
             ]
    
    } );

    $('#distributionlist').DataTable( {
         "ajax":{
            "type" : "POST",
            "data" : {
                "status" : "",
            },
            "url" : "../distribution_list.php",
            "dataSrc": function ( json ) {
                return json['distribution_list'];
            }
          },
          "columnDefs": [
            { targets: 9,
              render: function(data) {
                return '<img src="'+data+'" alt="No Image" width="150px">'
              }
            }   
          ],
          "columns": [
                { "data": "user_name" },
                { "data": "upazila_name" },
                { "data": "no_of_family" },
                { "data": "releife_items" },
                { "data": "survival_day" },
                { "data": "status" },
                { "data": "is_needed_detials" },
                { "data": "address" },
                { "data": "date_of_distribution" },
                { "data": "photo" },
            ]
    
    } );

    $('#requestedRelieflist').DataTable( {
         "ajax":{
            "type" : "POST",
            "data" : {
                "type" : "",
            },
            "url" : "../relief_request_list.php",
            "dataSrc": function ( json ) {
                return json['detials'];
            }
          },
          "columnDefs": [
            { targets: 12,
              render: function(data) {
                return '<img src="'+data+'" alt="No Image" width="150px">'
              }
            }   
          ],
          "columns": [
                { "data": "user_full_name" },
                { "data": "user_phone" },
                { "data": "user_email" },
                { "data": "user_address" },
                { "data": "name" },
                { "data": "upazila_name" },
                { "data": "address" },
                { "data": "no_of_family" },
                { "data": "releife_items" },
                { "data": "no_of_survival_day" },
                { "data": "details" },
                { "data": "status" },
                { "data": "nid" },
            ]
    
    } );

    $('#feedbacklist').DataTable( {
           "ajax":{
            "type" : "POST",
            "data" : {
                "type" : "",
            },
            "url" : "../feedback_list.php",
            "dataSrc": function ( json ) {
                return json['feedback_list'];
            }
          },
          "columnDefs": [
            { targets: 7,
              render: function(data) {
                if(data == 1){
                    var status = 'Pending';
                }else{
                    var status = '';
                }
                return status;
              }
            }   
          ],
          "columns": [
                { "data": "user_name" },
                { "data": "user_type" },
                { "data": "user_phone" },
                { "data": "user_email" },
                { "data": "user_address" },
                { "data": "feedback" },
                { "data": "upazila_name" },
                { "data": "status" }
            ]
    
    } );
} );