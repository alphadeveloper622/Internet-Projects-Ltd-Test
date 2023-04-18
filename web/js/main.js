(function() {
    "use strict";
    function setfavorite(){
        alert("aaaaa");
    }
    var table =$('#fruits').DataTable();
    $("#fruits_filter").html('<label  style="margin-right:10px;">Name:<input type="text" id="column0_search" class="" placeholder="" aria-controls="mytable"></label><label>Family:<input type="text" id="column1_search" class="" placeholder="" aria-controls="mytable"></label>');
    $('#column1_search').on( 'keyup', function () {
        table
            .columns( 1 )
            .search( this.value )
            .draw();
    } );
    $('#column0_search').on( 'keyup', function () {
        table
            .columns( 0 )
            .search( this.value )
            .draw();
    } );

    var tableFavorite =$('#favorite').DataTable();
})()

function setFavorite(event) {
    // var param =yii.getCsrfParam();
    // var token = yii.getCsrfToken();
    var target=event.currentTarget;
    var id=$(target).parent().data('id');
    var flag=false;
    if($(target).parent().data('value')=="active")
        flag=false;
    else    
        flag=true;
    $.ajax({
        url: '/site/set-favorite',
        type: 'post',
        data: {
                  id: id , 
                  flag:flag
              },
        success: function (data) {
            if(flag){
                if(data.msg==''){
                    $(target).addClass("active");
                    $(target).parent().data('value','active');
                }
                else{
                    snackbarFunc();
                }
            }else{
                $(target).removeClass("active");
                $(target).parent().data('value','');
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            //toast.createToast('error','Error:'+ errorMessage)
        }
   });
}


function snackbarFunc() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");
  
    // Add the "show" class to DIV
    x.className = "show";
  
    // After 3 seconds, remove the show class from DIV
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  }