(function ($) {

    $.fn.gantt = function (options) {

        var settings = {
            source: null,
            itemsPerPage: 7,
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            dow: ["S", "M", "T", "W", "T", "F", "S"],
            startPos: new Date(),
            navigate: "buttons",
            scale: "days",
            useCookie: false,
            maxScale: "months",
            minScale: "hours",
            waitText: "Please wait...",
        };

        Date.prototype.format = function(fmt) 
        { //author: meizz 
          var o = { 
            "M+" : this.getMonth()+1,                 //月份 
            "d+" : this.getDate(),                    //日 
            "h+" : this.getHours(),                   //小时 
            "m+" : this.getMinutes(),                 //分 
            "s+" : this.getSeconds(),                 //秒 
            "q+" : Math.floor((this.getMonth()+3)/3), //季度 
            "S"  : this.getMilliseconds()             //毫秒 
          }; 
          if(/(y+)/.test(fmt)) 
            fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
          for(var k in o) 
            if(new RegExp("("+ k +")").test(fmt)) 
          fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length))); 
          return fmt; 
        };

        settings.source = [
        {
            month:'12',
            values:[
            '1':'0',
            '2':'100',
            '3':'400',
            '4':'21']
        },{
            month:'1',
            values:[
            '1':'0',
            '2':'100',
            '3':'2',
            '4':'0']
        },{

        }]
        var core = {
            year : null,
            month : null,
            creat : function(form,date){
                    var html = ''
                      for(var i = 0; i < settings.source.length; i++){
                        for(var j = 0; j < settings.source[i].values, j++){

                        }
                      }

                      calendar.year = date.getFullYear(); 
                      calendar.month = date.getMonth(); 
                      var month = calendar.month +1;

                      form.find('th')[1].innerHTML = calendar.year + '年 ' + month + '月'; //插入年份和月份
                      
                      var startDay = new Date(calendar.year, month - 1, 1).getDay();
                      var nDays = new Date(calendar.year, month, 0).getDate();

                      var numRow = 0;
                      var i;        //日期
                      var html = '';

                      var _now = new Date();
                      var _today = _now.getDate();
                      var _year = _now.getFullYear();
                      var _month = _now.getMonth();
                      //两天后 disable
                      var _disable = new Date(_year,_month,_today+2);
                      html += '<tr>';
                      for (i = 0; i < startDay; i++) {
                          html += '<td></td>';
                          numRow++;
                      }
                      for (var j = 1; j <= nDays; j++) {
                          var _currenttime = new Date(calendar.year, month-1, j);
                          if (j == _today && calendar.month == _month && calendar.year == _year) {
                              html += '<td style="color:#16A085" title="'+calendar.year+'年'+month+'月'+j+'日">';
                              html += j;
                              html += "<span>今天</span>";
                          }else if(_currenttime.getTime() <= _disable.getTime() && _currenttime.getTime() > _now.getTime()){
                            if(calendar.isEvent(j)){
                              html += '<td>';
                              html += j;
                              html += "<span>不可预约</span>";
                            }else{
                              html += '<td title="'+calendar.year+'年'+month+'月'+j+'日">';
                              html += j;
                            }
                          }else if(calendar.isEvent(j)){
                            if(new Date(calendar.year,calendar.month,j).getTime() > _now.getTime()){
                              var now = new Date(calendar.year, calendar.month, j).format("yyyy-MM-dd").toString();
                              var num_left;
                              if(parseInt(calendar.events.type) == 0){
                                num_left = parseInt(calendar.events[now].user_count) - parseInt(calendar.events[now].a_count);
                              }else{
                                num_left = parseInt(calendar.events.user_count) - parseInt(calendar.events[now].a_count);
                              }
                              if(num_left <= 0){
                                html += '<td title="'+calendar.year+'年'+month+'月'+j+'日" data-date="'+now+'" >';
                                html += j; 
                                html +="<span>已约满</span>";
                              }else{
                                html += '<td class="available" title="'+calendar.year+'年'+month+'月'+j+'日" data-date="'+now+'" >';
                                html += j; 
                                html += "<span>余<strong class='active-num'> "+num_left+" </strong>名额</span>";
                              }
                            }else{
                                html += '<td>';
                                html += j; 
                                html +="<span>已完成</span>";
                            }
                          }else {
                              html += '<td title="'+calendar.year+'年'+month+'月'+j+'日">';
                              html += j;
                              // html += "<span>不可预约</span>"; 
                          }
                          html += '</td>';
                          numRow++;
                          if (numRow == 7) {  //如果已经到一行（一周）了，重新创建tr
                              numRow = 0;
                              html += '</tr><tr>';
                          }
                      }

                      form.find('tbody').html(html);
        }
    };
})(jQuery);

