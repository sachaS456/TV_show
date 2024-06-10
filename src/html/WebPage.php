<?php

namespace html;

use Cassandra\Date;
use html\StringEscaper;

class WebPage
{
    use StringEscaper;
    private string $head;
    private string $title;
    private string $body;

    /** Accesseur du Titre de la page
     * @return string: titre
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /** Accesseur du body de la page
     * @return string: code html du body
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /** Accesseur du head de la page
     * @return string: code html du head
     */
    public function getHead(): string
    {
        return $this->head;
    }

    public function __construct(string $title = '', string $head = '', string $body = '')
    {
        $this->title = $title;
        $this->head = $head;
        $this->body = $body;
    }

    /** Ajouter un contenu dans $this->body.
     * @param string $content Le contenu à ajouter
     */
    public function appendContent(string $content): void
    {
        $this->body .= $content;
    }

    /** Ajouter un contenu dans $this->head.
     * @param string $content Le contenu à ajouter
     */
    public function appendToHead(string $content): void
    {
        $this->head .= $content;
    }

    /** Produire la page Web complète.
     * @return string: code html de la page
     */
    public function toHtml(): string
    {
        return <<<HTML
<!DOCTYPE html>
<html lang="fr">
    <head>
        $this->head
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>$this->title</title>
    </head>
    
    <body>
        $this->body    
    </body>
</html>
HTML;

    }

    /** Ajouter un contenu CSS dans $this->head.
     * @param string $css Le contenu CSS à ajouter
     */
    public function appendCss(string $css): void
    {
        $this->head .= <<<HTML
<style>
    $css
</style>
HTML;

    }

    /** Ajouter l'URL d'un script CSS dans $this->head.
     * @param string $url L'URL du script CSS
     */
    public function appendCssUrl(string $url): void
    {
        $this->head .= <<<HTML
<link rel="stylesheet" href="$url">
HTML;

    }

    /** Ajouter un contenu JavaScript dans $this->head.
     * @param string $js Le contenu JavaScript à ajouter
     */
    public function appendJs(string $js): void
    {
        $this->head .= <<<HTML
<script>
    $js
</script>
HTML;
    }

    public function appendJsUrl(string $url): void
    {
        $this->head .= <<<HTML
<script type="text/javascript" src="$url"></script> 
HTML;

    }

    public static function getLastModification(): string
    {
        return date("Y-m-d H:i:s", getlastmod());
    }
}
