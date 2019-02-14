	<script type="text/javascript" src="{{ url('client/js/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/jquery.selectbox-0.2.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/jquery.form-validator.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/placeholder.js') }}"></script>
    <script type="text/javascript" src="{{ url('client/js/coustem.js') }}"></script>

    <script type="text/javascript" src="{{ url('/js/state.js') }}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{ url('client/js/listing_search.js') }}"></script>
    @yield('script')
<script type="text/javascript">
    $(document).ready(function () {
      $('body').on('click', '.services', function(e) {
        e.preventDefault();
        var service_name = $(this).attr('id');
        $('#service_name').val(service_name);
      });
   
      $('body').on('click', '#WeddingPlanningSubmit', function(e) {
        e.preventDefault();
        var service_name =$('#WeddingPlanning').val();
        var searchlocation = $("#secondlist").val();
        var url = '/listing/'+service_name+'/'+searchlocation;
        if ($("#topSearchForm").valid()) {
         window.location.href=url;
        }
      });

      $("#client_listing").validate({
        submitHandler: function (form) { // for demo
          var service_name =$('#service_name').val();
          var location = $('#secondlist').val();
          var url = '/listing/'+service_name+'/'+location;
          window.location.href=url;
        }
      });

    });  
   // Ends On Document Ready Function 
</script>

<script type="text/javascript">
    $('.text-only').keydown(function (e) {
      if (e.ctrlKey || e.altKey) {
       e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
          e.preventDefault();
        }
      }
    });
    $('.number-only').keypress(function(e){
      if (e.which != 46 && e.which != 45 && e.which != 46 &&
      !(e.which >= 48 && e.which <= 57)) {
        return false;
      }
    });
</script>
