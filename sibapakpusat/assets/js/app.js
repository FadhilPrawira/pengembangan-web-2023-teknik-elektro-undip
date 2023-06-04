$(document).ready(function () {
//created by sahebul 17/03/2019

  //custome ajax call
  trigger_ajax=function(url=null,param=null){

    return $.ajax({
             type: 'POST',
             url: url,
             data: param,
             success:function(data){
               var res = JSON.parse(data);
               // $.notify(res['message'], res['status']);
               $.notify({
                 // options
                 message: res['message']
               }, {
                 // settings
                 type: res['type'],
                 animate: {
                   enter: 'animated bounceIn',
 		              exit: 'animated bounceOut'
                 },
                 animate: {
                 enter: 'animated slideInRight',
                 exit: 'animated slideOutRight'
               },
               placement: {
                 from: "top",
                 align: "right"
                   }
               });

               if(res['type'] === "success"){
               }else {
                 return;
               }
        }});
  }
  //end of custome ajax call

convertToSlug=function(Text)
{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}
});
