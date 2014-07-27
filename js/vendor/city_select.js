(function($) {
  var district = {
    current : null,
    current_index : 0,
    isArray : function(v){
      return Object.prototype.toString.apply(v) === '[object Array]';
    },
    create: function(arrCity,obj){
      var next = obj.data('next') || null;
      var next_obj = $("."+next+"") || null;
      var options = '';
      if(district.isArray(arrCity)){
        for(var i = 0 ; i < arrCity.length; i +=1){
          options += '<option data-index="' + i + '" value="' + arrCity[i] + '"';
          if (arrCity[i] === district.current[district.current_index]) {
            options += ' selected';
          }
          options += '>' + arrCity[i] + '</option>';
        }
      }else{
        if(district.current_index == 0){
          options = "<option>请选择</option>";
        }
        for(var key in arrCity){
          options += '<option data-index="' + key + '" value="' + key + '"';
          if (key === district.current[district.current_index]) {
            options += ' selected';
          }
          options += '>' + key + '</option>';
        }
      }

      if(options){
        obj.html(options);
      }

      if(next){
        obj.on('change',function() {
          var index = $(this).find('option:selected').attr('data-index');
          if(index){
            district.create(arrCity[index],next_obj);
          }
        });
        district.current_index++;
        obj.trigger('change');
      }
    },
    init: function(cities,obj){
      district.current = $('.reside').val().split(',', 3);
      $(".district-select").html("<option>请选择</option>");
      district.create(cities,obj);
    }
  }
  district.init(cities,$(".province-select"));
})(jQuery);