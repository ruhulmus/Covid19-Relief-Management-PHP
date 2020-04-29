<script type="text/javascript">
    $(document).ready(function(){

        var promise1 = $.get("<?php echo get_base_url(); ?>/get_welfare_data.php");
        var promise2 = $.post("<?php echo get_base_url(); ?>/distribution_list.php", {
            "status" : "",
        });

        $.when(promise1, promise2).then(function(data1, data2) {
            let welfare = data1[0]['welfare_list'];
            let distribution = data2[0]['distribution_list'];
            console.log(distribution);

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: new google.maps.LatLng(23.777176, 90.399452),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();
            var marker, i;

            for (i = 0; i < welfare.length; i++) {

                let circle_color = '';
                if(welfare[i].upazila_wise_map_status == 1){
                    circle_color = "#ff0000";
                    markercolor = 'assets/img/marker-red.png';
                }else if(welfare[i].upazila_wise_map_status == 2){
                    circle_color = "#e5ff00";
                    markercolor = 'assets/img/marker-yallow.png';
                }else{
                    circle_color = "#32CD32";
                    markercolor = 'assets/img/marker-green.png';
                }
                // Create marker . . .
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(welfare[i].upazila_latitude, welfare[i].upazila_longitude),
                    title: welfare[i].upazila,
                    icon: markercolor,
                    map: map
                });

                // Add circle overlay and bind to marker
                var circle = new google.maps.Circle({
                    map: map,
                    radius: Math.sqrt(welfare[i].no_of_poor_family) * 100,
                    fillColor: circle_color
                });
                circle.bindTo('center', marker, 'position');

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var html = "<b> Area Details :  </b><br/><b> Upazila Name : </b> " + welfare[i].upazila + "<br/>Population: " + welfare[i].no_of_population + "<br/>Total Family: " + welfare[i].no_of_families + "<br/>Avg. Family Member: " + welfare[i].avg_no_of_each_family_member + "<br/>Avg. Monthly Earning: " + welfare[i].avg_family_wise_monthly_earning + "<br/>No of Family food have - Till Today: " + welfare[i].total_survival_family_till_today + "<br/>Total Poor Family: " + welfare[i].no_of_poor_family;
                        infowindow.setContent(html);
                        infowindow.open(map, marker, html);
                    }
                })(marker, i));
            }

            for (i = 0; i < distribution.length; i++) {

                // Create marker . . .
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(distribution[i].distribution_latitude, distribution[i].distributtion_longitude),
                    title: distribution[i].upazila_name,
                    icon: 'assets/img/marker-distribute.png',
                    map: map,
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var html = "<b>Relief Distribution Details : </b><br/> Upazila Name : <b>" + distribution[i].upazila_name + "</b> <br/>Distributed Area Name : " + distribution[i].address + "<br/>Donor Name: " + distribution[i].user_name + "<br/>Distributed Family Member: " + distribution[i].no_of_family + "<br/>Distributed Relief Items: " + distribution[i].releife_items + "<br/>Survival Day: " + distribution[i].survival_day + "<br/>Date of Distribution: " + distribution[i].date_of_distribution;
                        infowindow.setContent(html);
                        infowindow.open(map, marker, html);
                    }
                })(marker, i));
            }


        }).catch(function (error) {

        });
    });
</script>