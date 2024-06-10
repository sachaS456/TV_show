<?php

namespace Html;

use Html\WebPage;

class AppWebPage extends WebPage
{
    private string $menu;
    public function __construct(string $title = '', string $head = '', string $body = '')
    {
        $this->menu = '';
        parent::__construct($title, $head, $body);
        if ($title != "Form") {
            $this->appendCssUrl("/css/style.css");
        }
    }
    public function getMenu(): string
    {
        return $this->menu;
    }


    public function toHTML(): string
    {
        $titre = $this->getTitle();
        $last = WebPage::getLastModification();
        $html = <<<HTML
<!DOCTYPE html>
<html lang ="fr">
    <head>{$this->getHead()}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>$titre</title>
    </head>
    
    <body>
    <header class="header"><h1>$titre</h1></header>
    <main class ="content">
        <div class="menu">{$this->getMenu()}
        </div>
        {$this->getBody()}\n
        
        
        </main>
    <footer class="footer">Dernière modification : $last</footer>

    </body>
    
</html>
HTML;
        return $html;
    }
    public function addMenu(string $menu, string $url): void
    {
        $this->menu .= <<<HTML
<button type="button" onclick=$url>$menu</button>
HTML;

    }

}
