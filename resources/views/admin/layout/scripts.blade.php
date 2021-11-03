<!-- jQuery first, then Tether, then other JS. -->
<script src="{{ asset('/assets/js/jquery.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>

flatpickr('.flatpickr', {
  dateFormat: "d-m-Y"
});
</script>


<script type="text/javascript">
  $('#partselect').change(function() {
window.location =  $("#baseurl").val()+'/admin/purchasebill/list/'+$('#partselect').val();
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>



<script type="text/javascript">
  $(document).ready(function() {
    $('.partyselect').select2();
});
</script>

<script type="text/javascript">
   $(function(){
    
      
      var host = window.location.origin;
      // /console.log(host);
      var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
      var pathArray = window.location.pathname.split( '/' );
      
      //console.log(pathArray.pop());

      if(pathArray.length > 3)
      {        
        path =path;
      }

      if(pathArray.pop()==='home')
        {
          $('.side-nav .adminMenu li').first().addClass('active selected');
        }
        else
        {
           $('.side-nav .adminMenu li a').each(function() {
        if (this.href === path) {
        $(this).parent().parent().parent().addClass('active selected');
        }


      });
        }


     
    })

$('#featured').click(function(){

  if ($('#featured').is(":checked"))
{
  $('#featured').val('1');
}
else
{
  $('#featured').val('0');
}


})


</script>

<script type="text/javascript">
	$('#responsemessage').delay(3000).slideUp('300'); 
</script>

<script type="text/javascript">
  

  $("#title").keyup(function(){
    var Text = $("#title").val();
    Text = Text.toLowerCase();
    Text = Text.replace(/ /g,'-')
     Text = Text.replace(/[^\w-]+/g,'')
    $("#url").val(Text);    
});


  $("#package").change(function(){
    var base_url = $("#baseurl").val();
    var package=$("#package").val();
     $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: base_url+'/admin/client/getcount/'+package,
        type: "post",

        success: function (data) {
           
            $("#keyword_count").val(data[0].keyword_count); 
        }
    });

      
});



var _URL = window.URL || window.webkitURL;
$('#icon').change(function() { 
  var file, img;
  if ((file = this.files[0])) {
       img = new Image();
       img.onload = function() {
          width = this.width;
          height = this.height;
          if(width == 64 && height == 64)
          {
            var f_size=this.files[0].size;
        if(f_size <=300000){
            var fileExtension = ['jpeg', 'jpg', 'png','JPEG', 'JPG', 'PNG'];
            if (jQuery.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
              document.getElementById("icon").value="";//jQuery('#jobman-field-16').value="";
              alert("Only '.jpeg','.jpg', '.png' formats are allowed.");
            }
          }else {
              document.getElementById("icon").value="";
              alert("File size exceeded")
            }
            
          }else{
            document.getElementById("icon").value="";
            alert("Image resolution must be 64x64");
          }
       };
       img.onerror = function() {
         document.getElementById("icon").value="";
          alert( "Not a valid file: " + file.type);
       };
       img.src = _URL.createObjectURL(file);
  }
})




$("#manufacturer").change(function(){
 var base_url = $("#baseurl").val();
var man_id=$("#manufacturer").val();



 $.ajax({
          headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            },
          url :base_url+ '/admin/vehicle/getmodel/'+man_id,
         
          type: 'get',
          dataType: 'json',
          success: function( result )
          {

            var val="'<option value=''>Select Model</option>'";

               $.each( result, function(i, value) {
             
                val+='<option value=' + JSON.stringify(value.id) + '>' + value.name + '</option>';

               });

                $('#model').html(val);
          }
       });



});




</script>

<script src="{{ asset('/assets/js/tether.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/adminMenu/adminMenu.js') }}"></script>
<script src="{{ asset('/assets/vendor/onoffcanvas/onoffcanvas.js') }}"></script>
<script src="{{ asset('/assets/js/moment.js') }}"></script>
<!-- Slimscroll JS -->
<script src="{{ asset('/assets/vendor/slimscroll/slimscroll.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/slimscroll/custom-scrollbar.js') }}"></script>

<script src="{{ asset('/assets/js/cropper/cropper.min.js')}}"></script>
@yield("cropjs")


<!-- Data Tables -->
		<script src="{{ asset('/assets/vendor/datatables/dataTables.min.js') }}"></script>
		<script src="{{ asset('/assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
		
		<!-- Custom Data tables -->
		<script src="{{ asset('/assets/vendor/datatables/custom/custom-datatables.js') }}"></script>
		<script src="{{ asset('/assets/vendor/datatables/custom/fixedHeader.js') }}"></script>
		<script src="{{ asset('/assets/js/common.js') }}"></script>

		<script src="{{ asset('/assets/js/canvasjs.min.js') }}"></script>




<!-- scripts created by me -->

<script src="{{ asset('/assets/js/ckeditor/ckeditor.js') }}"></script>
<!-- <script type="text/javascript">
  var textarea = document.getElementById('ckeditor');
CKEditor.replace(textarea);
</script> -->

<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<script src="{{ asset('/assets/js/custom.js') }}"></script>

<script>
         var elem = document.getElementById("body");

         function openFullscreen() {
            if (elem.requestFullscreen) {
                  elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                  elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                  elem.msRequestFullscreen();
            }
         }

         function closeFullscreen() {
            if (document.exitFullscreen) {
               document.exitFullscreen();
            } else if (document.webkitExitFullscreen) { /* Safari */
               document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) { /* IE11 */
               document.msExitFullscreen();
            }
         }
         
         $(document).ready(function(){
            $(".maximize").click(function(){
               $(".maximize").hide();
               $(".minimize").show();
            });
            $(".minimize").click(function(){
               $(".minimize").hide();
               $(".maximize").show();
            });
         });



         (function(){

//generate clock animations
var now       = new Date(),
    hourDeg   = now.getHours() / 12 * 360 + now.getMinutes() / 60 * 30,
    minuteDeg = now.getMinutes() / 60 * 360 + now.getSeconds() / 60 * 6,
    secondDeg = now.getSeconds() / 60 * 360,
    stylesDeg = [
        "@-webkit-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
        "@-webkit-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
        "@-webkit-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}",
        "@-moz-keyframes rotate-hour{from{transform:rotate(" + hourDeg + "deg);}to{transform:rotate(" + (hourDeg + 360) + "deg);}}",
        "@-moz-keyframes rotate-minute{from{transform:rotate(" + minuteDeg + "deg);}to{transform:rotate(" + (minuteDeg + 360) + "deg);}}",
        "@-moz-keyframes rotate-second{from{transform:rotate(" + secondDeg + "deg);}to{transform:rotate(" + (secondDeg + 360) + "deg);}}"
    ].join("");

document.getElementById("clock-animations").innerHTML = stylesDeg;

})();
         
      </script>


<script type="text/javascript">

var chart1 = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            // title:{
            // 	text: "Olympic Medals of all Times (till 2016 Olympics)"
            // },
            axisY: {
                title: "Medals",
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries,
            },
            toolTip: {
                shared: true,
                content: toolTipFormatter,
            },
            data: [
                {
                    type: "bar",
                    showInLegend: true,
                    name: "Gold",
                    color: "gold",
                    dataPoints: [
                        { y: 243, label: "Italy" },
                        { y: 236, label: "China" },
                        { y: 243, label: "France" },
                        { y: 273, label: "Great Britain" },
                        { y: 269, label: "Germany" },
                        { y: 196, label: "Russia" },
                        { y: 1118, label: "USA" },
                    ],
                },
                {
                    type: "bar",
                    showInLegend: true,
                    name: "Silver",
                    color: "silver",
                    dataPoints: [
                        { y: 212, label: "Italy" },
                        { y: 186, label: "China" },
                        { y: 272, label: "France" },
                        { y: 299, label: "Great Britain" },
                        { y: 270, label: "Germany" },
                        { y: 165, label: "Russia" },
                        { y: 896, label: "USA" },
                    ],
                },
                {
                    type: "bar",
                    showInLegend: true,
                    name: "Bronze",
                    color: "#A57164",
                    dataPoints: [
                        { y: 236, label: "Italy" },
                        { y: 172, label: "China" },
                        { y: 309, label: "France" },
                        { y: 302, label: "Great Britain" },
                        { y: 285, label: "Germany" },
                        { y: 188, label: "Russia" },
                        { y: 788, label: "USA" },
                    ],
                },
            ],
        });
        chart1.render();

        function toolTipFormatter(e) {
            var str = "";
            var total = 0;
            var str3;
            var str2;
            for (var i = 0; i < e.entries.length; i++) {
                var str1 = "<span style= 'color:" + e.entries[i].dataSeries.color + "'>" + e.entries[i].dataSeries.name + "</span>: <strong>" + e.entries[i].dataPoint.y + "</strong> <br/>";
                total = e.entries[i].dataPoint.y + total;
                str = str.concat(str1);
            }
            str2 = "<strong>" + e.entries[0].dataPoint.label + "</strong> <br/>";
            str3 = "<span style = 'color:Tomato'>Total: </span><strong>" + total + "</strong><br/>";
            return str2.concat(str).concat(str3);
        }

        function toggleDataSeries(e) {
            if (typeof e.dataSeries.visible === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            chart1.render();
        }


        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                //text: "Email Categories",
                horizontalAlign: "chartContainer1",
            },
            data: [
                {
                    type: "doughnut",
                    startAngle: 60,
                    innerRadius: 90,
                    indexLabelFontSize: 17,
                    //indexLabel: "{label} - #percent%",
                    //toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                    dataPoints: [
                        { y: 67, label: "Other" },
                        { y: 28, label: "Archives" },
                        { y: 10, label: "Labels" },
                        { y: 7, label: "Drafts" },
                        { y: 15, label: "Trash" },
                        { y: 6, label: "Spam" },
                    ],
                },
            ],
        });
        chart2.render();

</script>
