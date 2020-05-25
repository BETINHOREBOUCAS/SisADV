function alterarTrasicao(id) {
    $.ajax({
        //Vai requisitar o editar.php
        url:'alterarTransicao',
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
            $('#modal').find('.modal-body').find('form').on('submit', salvarT);

            $('#modal').modal('show');
        }
    });

}

function salvarT(e) {
    //e.preventDefault();
    // Vai pegar os seguinte dados
    var situacao = $(this).find('select[name=situacao]').val();
    var pagamento = $(this).find('select[name=pagamento]').val();
    var obs = $(this).find('textarea[name=obs]').val();
    var id = $(this).find('input[name=id]').val();
    
    $.ajax({
        // Vai requisitar
        url:'alterarTransicao',
        // Pelo Post
        type:'POST',
        // Vai enviar os seguintes dados para o savar.php
        data:{situacao:situacao, pagamento:pagamento, id:id, obs:obs},
        success:function(html){
            $('#modal').find('.modal-body').html(html);
            alert("Dados alterado com sucesso!");          
                   
        }
    });
}

function apagarProcesso(id) {
    $.ajax({
        //Vai requisitar o editar.php
        url:'apagarTransicao',
        //Pelo Post
        type:'post',
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
            $('#modal').find('.modal-body').find('form').on('submit', salvarEX);

            $('#modal').modal('show');
        }
    });

}

function salvarEX(e) {
    //e.preventDefault();
    // Vai pegar os seguinte dados
    var acao = 1;
    var id = $(this).find('input[name=id]').val();
    
    $.ajax({
        // Vai requisitar
        url:'apagarTransicao',
        // Pelo Post
        type:'post',
        // Vai enviar os seguintes dados para o savar.php
        data:{acao:acao, id:id},
        success:function(){
            alert("Processo excluido com sucesso!");
                   
        }
    });
}

function adicionar(id) {
    $.ajax({
        //Vai requisitar o editar.php
        url:'addProcesso',
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
            $('#modal').find('.modal-body').find('form').on('submit', salvar);

            
            $('#modal').modal('toggle');
            //Remove a parte escura que fica quando fecha o modal
            //$(".modal-backdrop").remove();
        }
    });

}

function salvar(e) {
    //e.preventDefault();
    // Vai pegar os seguinte dados
    var nome = $(this).find('input[name=nome]').val();
    var cpf = $(this).find('input[name=cpf]').val();
    var tipo = $(this).find('select[name=tipo]').val();
    var id = $(this).find('input[name=id]').val();
    var datai = $(this).find('input[name=datai]').val();
    
    $.ajax({
        // Vai requisitar
        url:'addProcesso',
        // Pelo Post
        type:'get',
        // Vai enviar os seguintes dados para o savar.php
        data:{nome:nome, cpf:cpf, tipo:tipo, id:id, datai},
        success:function(){
            if (tipo == "") {
                alert("Erro! O campo tipo do processo é obrigatório!");
                
            }else {
                alert("Processo adicionado com sucesso!");
                
            }
                   
        }
    });
}

function consultarProcesso(id) {
    $.ajax({
        //Vai requisitar o editar.php
        url:'consultarProcesso',
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
            $('#modal').find('.modal-body').find('form').on('submit', salvarT);

            $('#modal').modal('show');
        }
    });

}