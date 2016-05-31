$(function () {

    $(' #da-thumbs > li ').each(function () {
        $(this).hoverdir();
    });

    $('.togg_gall').ekkoLightbox();


    // technical menu hover
    $("#myTab>li a").mouseover(function () {
        $('.nav_cust').removeClass('active');
        $(this).parent().addClass('active');
        $('.tab-content .fade').removeClass('active');
//comments
        //$('.tab-content .fade').removeClass('in');
        $($(this).attr('href')).addClass('in active');


    });
    // ends here 




    $("#topicid").on('change', function () {
        var topic = $("#topicid option:selected").val();
        $("#course_alert").addClass('fade');
        $('.cls').hide();
        $('#courseid option').each(function () {


            if ($(this).data('courseid') == topic) {
                $(this).show()
            } else {
                $(this).hide()
            }
        });
        //alert('khkjhl');

    });
    $('#view_course_btn').click(function () {

        var courseid = $("#courseid option:selected").val();
        if (courseid == 0) {

            $("#course_alert").removeClass('fade');
        } else {

            $("#course_alert").addClass('fade');
            window.open('course.php?id=' + courseid);
        }

    });





    $("#search_c").typeahead({
        source: ['cisco', 'microsoft', 'itil', 'webworker', 'java']
    });
    $('.dropdown').hover(function () {
        //  $(this).toggleClass('open');
    });
    //$('.cls').hide();

    $("#topicid").on('change', function () {
        var topic = $("#topicid option:selected").val();
        $("#course_alert").addClass('fade');
        $('.cls').hide();
        $('#courseid option').each(function () {


            if ($(this).data('courseid') == topic) {
                $(this).show()
            } else {
                $(this).hide()
            }
        });
        //alert('khkjhl');

    });
    $('#view_course_btn').click(function () {

        var courseid = $("#courseid option:selected").val();
        if (courseid == 0) {

            $("#course_alert").removeClass('fade');
        } else {

            $("#course_alert").addClass('fade');
            window.open('course.php?id=' + courseid);
        }

    });



    //we want this function to fire whenever the user types in the search-box
    $("#search").keyup(function () {

        //first we create a variable for the value from the search-box
        var searchTerm = $("#search").val();

        //then a variable for the list-items (to keep things clean)
        var listItem = $('#serach_list').children('li');

        //extends the default :contains functionality to be case insensitive
        //if you want case sensitive search, just remove this next chunk
        $.extend($.expr[':'], {
            'containsi': function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || '').toLowerCase()
                    .indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        }); //end of case insensitive chunk


        //this part is optional
        //here we are replacing the spaces with another :contains
        //what this does is to make the search less exact by searching all words and not full strings
        var searchSplit = searchTerm.replace(/ /g, "'):containsi('")


        //here is the meat. We are searching the list based on the search terms
        $("#serach_list li").not(":containsi('" + searchSplit + "')").each(function (e) {

            //add a "hidden" class that will remove the item from the list
            $(this).addClass('hidden');

        });

        //this does the opposite -- brings items back into view
        $("#serach_list li:containsi('" + searchSplit + "')").each(function (e) {

            //remove the hidden class (reintroduce the item to the list)
            $(this).removeClass('hidden');

        });
    });




});




$(document).ready(function () {





    //Docs at http://www.chartjs.org 
    var pie_data = [{
        value: 300,
        color: "#4DAF7C",
        highlight: "#55BC75",
        label: "Video"
    }, {
        value: 50,
        color: "#EAC85D",
        highlight: "#f9d463",
        label: "Audio"
    }, {
        value: 100,
        color: "#E25331",
        highlight: "#f45e3d",
        label: "Photos"
    }, {
        value: 35,
        color: "#F4EDE7",
        highlight: "#e0dcd9",
        label: "Remaining"
    }]

    var line_data = {
        labels: ["10:00am", "10:05am", "10:10am", "10:15am", "10:20am", "10:25am", "10:30am", "10:35am", "10:40am", "10:45am", "10:50am", "10:55am", "11:00am", "11:05am"],
        datasets: [{
            label: "My Second dataset",
            fillColor: "rgba(255,255,255,.4)",
            strokeColor: "rgba(255,255,255,1)",
            pointColor: "rgba(255,255,255,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [107.18, 107.13, 107.00, 106.89, 106.91, 107.12, 107.06, 107.04, 107.10, 107.14, 107.16, 107.20, 107.21, 107.26]
        }]
    };


    var bar_data = {
        labels: ["Monday", "Tuesday", "Wednesday", "Thrusday", "May", "June", "July"],
        datasets: [{
            fillColor: "rgba(226,83,49,1)",
            strokeColor: "rgba(226,83,49,1)",
            highlightFill: "rgba(226,83,49,0.5)",
            highlightStroke: "rgba(226,83,49,0.5)",
            data: [65, 59, 80, 81, 56, 55, 40]
        }]
    };





    // LINE CHART WIDGET
    if ($('#myLineChart').length > 0) {
        var ctx2 = document.getElementById("myLineChart").getContext("2d");
        var myLineChart = new Chart(ctx2).Line(line_data, {
            responsive: true,
            scaleShowGridLines: false,
            scaleShowLabels: false,
            showScale: false,
            pointDot: true,
            bezierCurveTension: 0.2,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 5,
            datasetStroke: false,
            tooltipTemplate: "<%= value %><%if (label){%> - <%=label%><%}%>"
        });


    }


    $(".lite_box").click(function () {

        $('#myModalLabel').html($(this).data('title'));
        $('#myModalbottom').html($(this).data('footer'));
        $('#mysrc').attr('src', $(this).data('href'));

        $('#myModal_gall').modal('show');

    });







});





function submit_contact_form() {
    if ($("#contact1").valid()) {

        $.ajax({
            url: "http://www.itstraining.in/contact_send.php",
            data: $("#contact1").serialize(),
            method: 'POST',
            success: function (data) {
                alert(data);
            }

        });
    }



}

function submit_contact() {
    $.ajax({
        url: "submit_contact.php",
        data: $("#form_wizard").serialize(),
        method: 'POST',
        success: function (data) {
            alert(data);
        }

    });

}



function submit_Coursereg_form() {
    if ($("#course_registration").valid()) {

        $.ajax({
            url: "http://www.itstraining.in/sendCourse_registration.php",
            data: $("#course_registration").serialize(),
            method: 'POST',
            success: function (data) {
                alert(data);
            }

        });
    }



}
function submit_workshop_form() {
    if ($("#work_registration").valid()) {

        $.ajax({
            url: "http://www.itstraining.in/sendCourse_registration.php",
            data: $("#work_registration").serialize(),
            method: 'POST',
            success: function (data) {
                alert(data);
            }

        });
    }



}








$(document).ready(function () {
	
	
	
	
	
	
	$( "#workshow_cat" ).change(function() {
var val1=this.value;
$("#courseid option" ).each( function( i, val ) {

if($(this).data('catid')==val1){
$(this).show();
}else{
$(this).hide();

}

});


});







	
	
	
	
	
	
	
	
	
    $("#course_registration").validate({
        rules: {
            // simple rule, converted to {required:true}
            rname: "required",
            rcourse: "required",
            rmob: "required",
            
            // compound rule
            remail: {
                required: true,
                email: true
            }
        }
    });
	
	$("#work_registration").validate({
        rules: {
            // simple rule, converted to {required:true}
            rname: "required",
            rcourse: "required",
            rmob: "required",
            
            // compound rule
            remail: {
                required: true,
                email: true
            }
        }
    });
	
	
	
});