$(document).ready(function(){
  function loadTable(){
    $.get("controller/UserController.php?action=list",function(data){
      var html = $('<table class="table" ><tr><th>id</th><th>Nome</th><th>Email</th><th class="actions" >Ações</th></tr></table>');
      var list = jQuery.parseJSON(data);
      for (let [key, value] of Object.entries(list)) {
          linha_tabela = '<tr>';
          linha_tabela += '<td>'+value.id+'</td>';
          linha_tabela += '<td>'+value.name+'</td>';
          linha_tabela += '<td>'+value.email+'</td>';
          linha_tabela += "<td class='actions'><button class='btn btn-default' value='"+value.id+"' data-edit >Editar</button>";
          linha_tabela += "<button class='btn btn-danger' value='"+value.id+"' data-dell >Deletar</button></td>";
          linha_tabela += '</tr>';
          html.append(linha_tabela);
      }
      $('#loadBody').html('');
      $('#loadBody').html(html);
      setDell();
      setEdit();
    });
  }

  $("#submit").on('click',function(event){
    event.preventDefault();
    if ($("#name").val() && $("#email").val()) {
        $.post("controller/UserController.php?action=create",
            {
                name: $("#name").val(),
                email: $("#email").val()
            },function(data){
                loadTable();
                $("#name").val('');
                $("#email").val('');
            }
        );
    }
  });

  function setDell(){
    $("[data-dell]").on('click',function(e){
       $.get("controller/UserController.php?action=delete&id="+e.target.value,function(data){
         loadTable();
       });
    });
  }

  function setEdit(){
    $("[data-edit]").on('click',function(e){
      tr = $(e.target).parent().parent();
      id = tr.children().get(0).innerText;
      $("#name").val(tr.children().get(1).innerText);
      $("#email").val(tr.children().get(2).innerText);
      $('#submit-box').hide();
      $('#update-box').show();
      $("#cancel").on('click',function(e){
          e.preventDefault();
          $("#name").val('');
          $("#email").val('');
          $('#submit-box').show();
          $('#update-box').hide();
      });

      $("#update").on('click',function(e){
         e.preventDefault();
         $.post("controller/UserController.php?action=update&id="+id,
            {
                name: $("#name").val(),
                email: $("#email").val()
            },function(data){
                $("#name").val('');
                $("#email").val('');
                $('#submit-box').show();
                $('#update-box').hide();
                loadTable();
            }
        );
      });
    });
  }
  loadTable();
});
