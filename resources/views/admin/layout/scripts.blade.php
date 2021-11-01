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




<!-- scripts created by me -->

<script src="{{ asset('/assets/js/ckeditor/ckeditor.js') }}"></script>
<!-- <script type="text/javascript">
  var textarea = document.getElementById('ckeditor');
CKEditor.replace(textarea);
</script> -->

<script src="{{ asset('/assets/js/custom.js') }}"></script>


