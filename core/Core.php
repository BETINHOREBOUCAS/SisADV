<?php
class Core {

    public function run() {
        
        //$url inicia com '/'
        $url = '/';
        //Se estiver algo no $_GET['url']
        if (isset($_GET['url'])) {
            //$url é concatenada com o que veio do GET['url']
            $url .= $_GET['url'];
        }

        //Iniciando a variavel $params com uma array vazia
        $params = array();

        //Se a variavel $url não for vazia e for diferente de uma barra
        if (!empty($url) && $url != '/') {
            //Link do site: www.meusite.com.br/galeria/abrir/123

            //Onde tiver uma barra ele vai substituir por uma array
            $url = explode('/', $url);
            //Vai excluir a primeira array de $url, pois ela está vazia pelo motivo da primeira barra
            array_shift($url);

            //A variavel $currentController = galeriaController
            $currentController = $url[0].'Controller';
            //Vai exluir a primeira array
            array_shift($url);

            //Após excluir a primeira array o link do site vai mudar para: www.meusite.com.br/abrir/123

            //Se a variavel $url na posição zero estiver setada e não estiver vazia
            if (isset($url[0]) && !empty($url[0])) {
                //A variavel $currentAction = abrir
                $currentAction = $url[0];
                //Vai excluir a primeira array
                array_shift($url);

                //Após excluir a primeira array o link do site vai mudar para: www.meusite.com.br/123

            //Se a variavel $url na posição zero não estiver setada e estiver vazia
            }else {
                //A variavel $currentAction = index
                $currentAction = 'index';
            }

            //Se na variavel $url existir alguma coisa ainda
            if (count($url) > 0) {
                //A variavel $params = $url
                $params = $url;
            }


        } else {
            //Controller Padrão
            $currentController = 'homeController';
            //Action Padrão
            $currentAction = 'index';
        }
        
        //Apos instanciar ele vai para a pagina index procurar qual pasta vai entrar
        $c = new $currentController();

        //Vai executar o objecto $c mais o Metodo $currentAction e os Parametros substituindo o $c->$currentAction($params)
        call_user_func_array(array($c, $currentAction), $params);
    }
}