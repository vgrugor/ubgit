<!doctype html>
<html lang="uk">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Для фильтра в таблице сотрудников-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Подключени е иконок https://fontawesome.com/icons?d=gallery&m=free-->
    <script src="https://kit.fontawesome.com/0f39bd7c71.js" crossorigin="anonymous"></script>
    <script>
        function getMessage(){
           alert('Функция работает');
           $.ajax({
              type: 'POST',
              url: '/department/getAjaxList',
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
    <title>Полтавське ВБР</title>
  </head>
  <body>
     <div id="msg">This message will be replaced using Ajax. 
        Click the button to replace the message.
        <select id="testSelect">
            
        </select>
        {{ csrf_field() }}
     </div>
      <button onclick="getMessage()">Старт</button>
  </body>
 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/tableFilter.js') }}"></script>
    <script src="{{ asset('js/select.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
     
