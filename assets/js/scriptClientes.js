$(function(){    

    $('li').hover(function(){
        $(this).find('.drop').toggle('slow');
    }, function(){
        $(this).find('.drop').toggle('slow');
    })

})



function consultar(id) {

    $.ajax({
        //Vai requisitar o editar.php
        url:'consultarCliente',
        //Pelo Post
        type:'POST',
        //Vai mandar o ID
        data:{id:id},
        //Enquanto não processar vai ficar carregando
        beforeSend:function(){
            // $('#modal')-> Seleciona o modal
            // find('.modal-body') -> Seleciona o modal-body
            // html('Carregando...') -> altera o conteudo para carregando
            $('#modal').find('.modal-body').html('Carregando...');
            //Abri o modal com a palavra carregando
            $('nav').modal('hide');
        },
        // Quando receber o conteudo
        success:function(html) {
            //Altera pelo o html que foi recebido
            $('#modal').find('.modal-body').html(html);
            //Muda o valor do h4
            $(".modal-title").html("Consulta de clientes");
            //Coloca valor dentro do input nome
            //$('input[name=nome]').val('000000');            
                      

            $('#modal').modal('show');
        }
    });

}

function editar(id) {

    $.ajax({
        //Vai requisitar o editar.php
        url:'editarCliente',
        //Pelo Post
        type:'POST',
        //Vai mandar o ID
        data:{id:id},
        //Enquanto não processar vai ficar carregando
        beforeSend:function(){
            // $('#modal')-> Seleciona o modal
            // find('.modal-body') -> Seleciona o modal-body
            // html('Carregando...') -> altera o conteudo para carregando
            $('#modal').find('.modal-body').html('Carregando...');
            //Abri o modal com a palavra carregando
            $('#modal').modal('show');
        },
        // Quando receber o conteudo
        success:function(html) {
            //Altera pelo o html que foi recebido
            $('#modal').find('.modal-body').html(html);
            $(".modal-title").html("Adicionar processo");
            // $('#modal')-> Seleciona o modal
            // find('.modal-body') -> Seleciona o modal-body
            // find('form') -> Vai procurar pelo formulario
            // on('submit', salvar) -> Colocar uma ação no submit que vai executar a função salvar
            $('#modal').find('.modal-body').find('form').on('submit', salvarEdicao);

            $('#modal').modal('show');
        }
    });

}

function salvarEdicao(e) {
    
    // Vai pegar os seguinte dados
    var acao = "atualizar";
    var id = $(this).find('input[name=id]').val();
    var nome = $(this).find('input[name=nome]').val();
    var cpf = $(this).find('input[name=cpf]').val();
    var nascimento = $(this).find('input[name=nascimento]').val();
    var sexo = $(this).find('input[name=sexo]').val();
    var estadoCivil = $(this).find('input[name=estadoCivil]').val();
    var rg = $(this).find('input[name=RG]').val();
    var emissaoRG = $(this).find('input[name=emissaoRG]').val();
    var orgaoRG = $(this).find('input[name=orgaoRG]').val();
    var tel = $(this).find('input[name=tel]').val();
    var celular = $(this).find('input[name=celular]').val();
    var zap = $(this).find('input[name=zap]').val();
    var cep = $(this).find('input[name=CEP]').val();
    var endereco = $(this).find('input[name=endereco]').val();
    var numero = $(this).find('input[name=numero]').val();
    var bairro = $(this).find('input[name=bairro]').val();
    var uf = $(this).find('input[name=UF]').val();
    var cidade = $(this).find('input[name=cidade]').val();
    var obs = $(this).find('textarea[name=obs]').val();
    
    $.ajax({
        // Vai requisitar
        url:'editarCliente',
        // Pelo Post
        type:'POST',
        // Vai enviar os seguintes dados para o savar.php
        data:{nome:nome, cpf:cpf, id:id, acao:acao, nascimento:nascimento, sexo:sexo, estadoCivil:estadoCivil, rg:rg, emissaoRG:emissaoRG, orgaoRG:orgaoRG, tel:tel, celular:celular, zap:zap, cep:cep, endereco:endereco, numero:numero, bairro:bairro, uf:uf, cidade:cidade, obs},
        success:function(){
            alert("Os dados forão atualizados!");
                   
        }
    });
}

function excluir(id) {

    $.ajax({
        //Vai requisitar o editar.php
        url:'alertaCliente',
        //Pelo Post
        type:'POST',
        //Vai mandar o ID
        data:{id:id},
        //Enquanto não processar vai ficar carregando
        beforeSend:function(){
            // $('#modal')-> Seleciona o modal
            // find('.modal-body') -> Seleciona o modal-body
            // html('Carregando...') -> altera o conteudo para carregando
            $('#modal').find('.modal-body').html('Carregando...');
            //Abri o modal com a palavra carregando
            $('#modal').modal('show');
        },
        // Quando receber o conteudo
        success:function(html) {
            //Altera pelo o html que foi recebido
            $('#modal').find('.modal-body').html(html);
            $(".modal-title").html("Adicionar processo");
            // $('#modal')-> Seleciona o modal
            // find('.modal-body') -> Seleciona o modal-body
            // find('form') -> Vai procurar pelo formulario
            // on('submit', salvar) -> Colocar uma ação no submit que vai executar a função salvar
            $('#modal').find('.modal-body').find('form').on('submit', confirmarExclusao);

            $('#modal').modal('show');
        }
    });

}

function confirmarExclusao(e) {
    
    // Vai pegar os seguinte dados
    var id = $(this).find('input[name=id]').val();
    
    $.ajax({
        // Vai requisitar
        url:'excluirCliente',
        // Pelo Post
        type:'POST',
        // Vai enviar os seguintes dados para o savar.php
        data:{id:id},
        success:function(html){
           // window.location.href = window.location.href;
           
        }
    });
}