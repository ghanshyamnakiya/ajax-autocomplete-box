
<!-- These above three are required to use ajax 

Now lets display on input box-->
<html>
<head>
   
</head>
<body>
    <input type="text" name="item_search" id="item_search" />
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>   
<script>
$(function(){

    function log(data){

alert(data);
}
   $(document).on('keyup','#item_search',function(){
       $('#item_search').autocomplete({
            source:function(request,response){
                $.post('http://localhost/tutorial/ajax_json.php',{
                    
                    name: $('#item_search').val()

                }).done(function(data){
                    console.log(data);
                    response(JSON.parse(data));
                });

            },
            minLengt:2,
            select: function(event, ui){
               
                var stock =ui.item.stock;    
               
                 if(parseFloat(stock)==0){
                        alert('stock out of stock!!');
                        return;
                 }

                
                log("Selected: "+ui.item.stock);
                
            }

       });

   });

 

});

</script>   
</body>   
</html>
