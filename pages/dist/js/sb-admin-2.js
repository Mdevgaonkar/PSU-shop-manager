$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});



//insert core data
$(document).ready(function(){
$("#submit").click(function(){
    //var data = $("#mainForm :input").serializeArray()
    $.post( $("#mainForm").attr("action"), 
         $("#mainForm :input").serializeArray(), 
         function(info){ alert(info); 
   });
    $("#mainForm :input").each( function() {
	   $(this).val('');
	});
return true;
});
});

//$(document).ready(function(){
$("#submitCDEdit").click(function(){
    //var data = $("#mainFormEdit :input").serializeArray()
   // alert("data");
    $.post( "insertGameEdit.php", 
         $("#mainFormEdit :input").serializeArray(),
         function(info){ alert("data"); 
   });
    $("#mainFormEdit :input").each( function() {
	   $(this).val('');
	});
return true;
});
//});*/







$('#dataTables-bookings').click(function(e){
    //var  = $(e.target).closest('tr').text();
    var  p1 = $(e.target).closest('tr').children('td.p1').text();
    var  p2 = $(e.target).closest('tr').children('td.p2').text();
    var  ph1= $(e.target).closest('tr').children('td.ph1').text();
    var  ph2 = $(e.target).closest('tr').children('td.ph2').text();
    var  game = $(e.target).closest('tr').children('td.game').text();
    var  srtT = $(e.target).closest('tr').children('td.srtT').text();
    var  endT = $(e.target).closest('tr').children('td.endT').text();
    var  date = $(e.target).closest('tr').children('td.date').text();
    
    //var data = $(e.target).closest('tr').children('td.name').text();
    //var dataCount = $(e.target).closest('tr').children('td.cdCount').text();
    //document.getElementById('gameNameByDefault').value = data;
    //document.getElementById('cdCountByDefault').value = dataCount;
   // alert(data);
});



//clock functions
function show(){
        var Digital = new Date();
        var day = Digital.getDay();
        var date = Digital.getDate();
        var month = Digital.getMonth();
        var year = Digital.getFullYear();
        var hours = Digital.getHours();
        var minutes = Digital.getMinutes();
        var seconds = Digital.getSeconds();
        var dn="AM" ;
        if (hours>12){
        dn="PM";
        hours=hours-12;
        }
        if (hours==0)
        hours=12;
        if (minutes<=9)
        minutes="0"+minutes;
        if (seconds<=9)
        seconds="0"+seconds;
        document.getElementById("Clock").innerHTML =hours+":"+minutes+" "+dn;
        document.getElementById("bigClock").innerHTML =hours+":"+minutes+":"+seconds+" "+dn;
        var days =  ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        document.getElementById("date").innerHTML =days[day]+", "+months[month]+" "+date+", "+year;


        setTimeout("show()",1000);


        }
        show();
