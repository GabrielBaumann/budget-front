<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\Auth;
use Source\Models\Category;
use Source\Models\Faq\Channel;
use Source\Models\Faq\Question;
use Source\Models\Post;
use Source\Models\User;
use Source\Support\Pager;

class Web extends Controller
{
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");        
    }

    public function home() : void
    {    

        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            themes("/assets/images/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head,
            "video" => "https://www.youtube.com/watch?v=85haYlPbPmA",
            "blog" => (new Post())
                ->find()
                ->order("post_at DESC")
                ->limit(6)
                ->fetch(true)
        ]);
    }

    public function about(): void
    {      

        $head = $this->seo->render(
            "Descubra o " . CONF_SITE_NAME . " - " . CONF_SITE_DESC,
            CONF_SITE_DESC,
            url("/sobre"),
            themes("/assets/images/share.jpg")
        );

        echo $this->view->render("about", [
            "head" => $head,
            "video" => "https://www.youtube.com/watch?v=85haYlPbPmA",
            "faq" => (new Question())
                ->find("channel_id = :id", "id=1", "question, response")
                ->order("order_by")
                ->fetch(true)
        ]);
    }

    public function blog(?array $data) : void
    {
        $head = $this->seo->render(
            "Blog - " . CONF_SITE_NAME,
            "Confira em nosso blog dicas e sacadas de como controlar melhor suas contas.",
            url("/blog"),
            themes("/assets/images/share.jpg")
        );

        $blog = (new Post())->find();
        $pager = new Pager(url("/blog/p/"));
        $pager->pager($blog->count(), 9, ($data['page'] ?? 1));

        echo $this->view->render("blog", [
            "head" => $head,
            "blog" => $blog->limit($pager->limit())
                ->offset($pager->offset())
                ->fetch(true),
            "paginator" => $pager->render()
        ]);
    }

    public function blogSearch(array $data) : void
    {   
        // Verifica a existência do item no html o s que recebe o valor pesquisado
        if (!empty($data['s'])) {
            $search = filter_var($data['s'], FILTER_SANITIZE_STRIPPED);
            echo json_encode(["redirect" => url("/blog/buscar/{$search}/1")]);
            return;
        }

        // Caso o termo seja vazio e redireciona para a mesma página do blog
        if (empty($data['terms'])){
            redirect("/blog");
        }

        // Sanitiza os termos (valor de pesquisa) que é enviado pela URL do redirrect AJAX
        $search = filter_var($data['terms'], FILTER_SANITIZE_STRIPPED);
        // Verifica a página que será renderizada para o Page
        $page = (filter_var($data['page'], FILTER_VALIDATE_INT) >= 1 ? $data['page'] : 1);

        $head = $this->seo->render(
            "Pesquisa por {$search} - " . CONF_SITE_NAME,
            "Confira os resultados de sua pesquisa para {$search}",
            url("/blog/buscar/{$search}/{$page}"),
            themes("/assets/images/share.jpg")
        );

        // Dados filtrados pela sanitização pelo search
        $blogSearch = (new Post())->find("(title LIKE :s OR subtitle LIKE :s)", "s=%{$search}%");

        // Renderização da página com os dados, casa haja resultados
        if (!$blogSearch->count()) {
            echo $this->view->render("blog", [
                "head" => $head,
                "title" => "PESQUISA POR:",
                "search" => $search
            ]);
            return;
        }

        $pager = new Pager(url("/blog/buscar/{$search}/"));
        $pager->pager($blogSearch->count(), 9, $page);

        echo $this->view->render("blog", [
            "head" => $head,
            "title" => "PESQUISA POR:",
            "search" => $search,
            "blog" => $blogSearch->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render()
        ]);
    }
    
    public function blogPost(array $data) : void
    {
        $post = (new Post())->findByUri($data['uri']);
        if (!$post) {
            redirect("/404");
        }

        $post->views += 1;
        $post->save();


        $head = $this->seo->render(
            "{$post->title} - " . CONF_SITE_NAME,
            $post->subtitle,
            url("blog/{$post->uri}"),
            image($post->cover, 1200, 628)
        );

        echo $this->view->render( "blog-post", [
            "head" => $head,
            "post" => $post,
            "related" => (new Post())
                ->find("category = :c AND id != :i","c={$post->category}&i={$post->id}")
                ->order("rand()")
                ->limit(3)
                ->fetch(true)
        ]);
    }

    public function login() : void
    {
        $head = $this->seo->render(
            "Entrar - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/entrar"),
            themes("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-login", [
            "head" => $head
        ]);
    }

    public function forget() : void
    {
        $head = $this->seo->render(
            "Recuperar Senha - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/recuperar"),
            themes("/assets/images/share.jpg")
        );
        echo $this->view->render("auth-forget", [
            "head" => $head
        ]);
    }

    public function register(?array $data) : void
    {   
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            if(in_array("", $data)) {
                $json['message'] = $this->message->info("Informe seus dados para criar sua conta.")->render();
                echo json_encode($json);
                return;
            }

            $auth = new Auth();
            $user = new User();
            $user->bootstrap(
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['password']
            );

            if ($auth->register($user)) {
                $json['redirect'] = url("/confirma");
            } else {
                $json['message'] = $auth->message()->render();
            }         

            echo json_encode($json);
            return;
        }

        $head = $this->seo->render(
            "Criar Conta - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/cadastrar"),
            themes("/assets/images/share.jpg")
        );

        echo $this->view->render("auth-register", [
            "head" => $head
        ]);
    }

    public function confirm() : void
    {
        $head = $this->seo->render(
            "Confirme Seu Cadastro - " . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/confirma"),
            themes("/assets/images/share.jpg")
        );

        echo $this->view->render("optin-confirm", [
            "head" => $head
        ]);
    }

    public function success() : void
    {
        $head = $this->seo->render(
            "Bem-vindo(a) ao" . CONF_SITE_NAME,
            CONF_SITE_DESC,
            url("/obrigado"),
            themes("/assets/images/share.jpg")
        );
        
        echo $this->view->render("optin-success", [
            "head" => $head
        ]);
    }

    public function terms(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - Termos de uso",
            CONF_SITE_DESC,
            url("/termos"),
            themes("/assets/images/share.jpg")
        );
        
        echo $this->view->render("terms", [
            "head" => $head
        ]);
    }

    public function error(array $data) : void 
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está disponível no momento";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto: joosantosjo@outlook.com";
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo!";
                $error->linkTitle = null;
                $error->link = null;
                break;
            
            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indisponível";
                $error->message = "Sentimos muito, mas...";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            themes("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }

}
