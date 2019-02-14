$(document).ready(function () {
 $('.BridalWearchange').change(function(){
    var cod_bridal = $("input[name='cod_bridal']:checked").val();
    var size_bridal = $("input[name='size_bridal']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof cod_bridal=='undefined') {
      cod_bridal='*';
    }
    if (typeof size_bridal=='undefined') {
      size_bridal='*';
    }
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'size_bridal':size_bridal,'cod_bridal':cod_bridal},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

 $('.Cakeschange').change(function(){
    var cd_cake = $("input[name='cd_cake']:checked").val();
    var size_cake = $("input[name='size_cake']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof cd_cake=='undefined') {
      cd_cake='*';
    }
    if (typeof size_cake=='undefined') {
      size_cake='*';
    }
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'size_cake':size_cake,'cd_cake':cd_cake},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

 $('.Groomwearchange').change(function(){
    var cod_groom = $("input[name='cod_groom']:checked").val();
    var size_groom = $("input[name='size_groom']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof cod_groom=='undefined') {
      cod_groom='*';
    }
    if (typeof size_groom=='undefined') {
      size_groom='*';
    }
    // console.log('size_groom = '+size_groom+' cod_groom = '+cod_groom+'size '+size_groom);
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'size_groom':size_groom,'cod_groom':cod_groom},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

 $('.Djchange').change(function(){
    var pricing = $("input[name='pricing']:checked").val();
    var service_charge = $("input[name='service_charge']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof pricing=='undefined') {
      pricing='*';
    }
    if (typeof service_charge=='undefined') {
      service_charge='*';
    }
    // console.log('service_charge = '+service_charge+' pricing = '+pricing+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'service_charge':service_charge,'pricing':pricing},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

 $('.Giftchange').change(function(){
    var pricing = $("input[name='pricing']:checked").val();
    var service_charge = $("input[name='service_charge']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof pricing=='undefined') {
      pricing='*';
    }
    if (typeof service_charge=='undefined') {
      service_charge='*';
    }
    // console.log('service_charge = '+service_charge+' pricing = '+pricing+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'service_charge':service_charge,'pricing':pricing},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

  $('.Cateringchange').change(function(){
    var food = $("input[name='food']:checked").val();
    var meal = $("input[name='meal']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof food=='undefined') {
      food='*';
    }
    if (typeof meal=='undefined') {
      meal='*';
    }
    // console.log('food = '+food+' meal = '+meal+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'meal':meal,'food':food},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

   $('.Makeupchange').change(function(){
    var pricing = $("input[name='pricing']:checked").val();
    var service_charge = $("input[name='service_charge']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof pricing=='undefined') {
      pricing='*';
    }
    if (typeof service_charge=='undefined') {
      service_charge='*';
    }
    // console.log('service_charge = '+service_charge+' pricing = '+pricing+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'service_charge':service_charge,'pricing':pricing},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

    $('.Musicchange').change(function(){
    var pricing = $("input[name='pricing']:checked").val();
    var service_charge = $("input[name='service_charge']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof pricing=='undefined') {
      pricing='*';
    }
    if (typeof service_charge=='undefined') {
      service_charge='*';
    }
    // console.log('service_charge = '+service_charge+' pricing = '+pricing+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'service_charge':service_charge,'pricing':pricing},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

     $('.Choreochange').change(function(){
    var pricing = $("input[name='pricing']:checked").val();
    var service_charge = $("input[name='service_charge']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof pricing=='undefined') {
      pricing='*';
    }
    if (typeof service_charge=='undefined') {
      service_charge='*';
    }
    // console.log('service_charge = '+service_charge+' pricing = '+pricing+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'service_charge':service_charge,'pricing':pricing},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });

    $('.Videochange').change(function(){
    var pricing = $("input[name='pricing']:checked").val();
    var service_charge = $("input[name='service_charge']:checked").val();
    var hidden_service =$('#hidden_service').val();
    var hidden_location = $('#hidden_location').val();
    if (typeof pricing=='undefined') {
      pricing='*';
    }
    if (typeof service_charge=='undefined') {
      service_charge='*';
    }
    // console.log('service_charge = '+service_charge+' pricing = '+pricing+' ');
    $.ajax({
      type : "get",
      url:'../../listing/products',
      data:{'service_name':hidden_service,'location':hidden_location,'service_charge':service_charge,'pricing':pricing},
      success: function(data) {
        // console.log(data);
        $('#divNewData').html(data);
        $('#oldDataHide').hide();
      }
    });
  });
});  
