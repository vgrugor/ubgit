<head>
     <title>Ajax Example</title>
     
     <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
     </script>
     
     <script>
        function getMessage(){
           alert('Функция работает');
           $.ajax({
              type: 'POST',
              url: '/ajax',
              data:{ _token: '{!! csrf_token() !!}' },
              success:function(data){
                 alert('ajax успешно выполнен');
                 $("#testSelect").html(data);
              },
              error: function () {
                alert('Ошибка');
              },
            });
        };
     </script>
  </head>
  
  <body>
     <div id="msg">This message will be replaced using Ajax. 
        Click the button to replace the message.
        <select id="testSelect">
            
        </select>
     </div>
      <button onclick="getMessage()">Старт</button>
  </body>
 
</html>