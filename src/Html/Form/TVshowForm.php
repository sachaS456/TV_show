<?php

namespace Html\Form;

use Entity\TVshow;
use Exception\ParameterException;
use Html\StringEscaper;
use Html\Webpage;
use Html\AppWebPage;

class TVshowForm
{
    use StringEscaper;
    private ?TVshow $TVshow;

    /**
     * @param TVshow|null $TVshow
     */
    public function __construct(?TVshow $TVshow = null)
    {
        $this->TVshow = $TVshow;
    }

    public function getTVshow(): ?TVshow
    {
        return $this->TVshow;
    }



    public function getHtmlForm(string $url): string
    {
        return <<<HTML
        
<form name="form" method="post" action="$url">

    <input name="id" type="hidden" maxlength="5" value="{$this->TVshow?->getId()}">
    <label>
    Titre
    </label>
    <input name="name" type="text" maxlength="50" value="{$this->escapeString($this->TVshow?->getName())}" required>

<label>
    Titre original
    </label>
    <input name="originalName" type="text" maxlength="50" value="{$this->escapeString($this->TVshow?->getOriginalName())}" required>

<label>
    Page d'accueil
    </label>
    <input name="homepage" type="text" maxlength="50" value="{$this->escapeString($this->TVshow?->getHomepage())}" required>

<label>
    Description
    </label>
    <input name="overview" type="text" maxlength="50" value="{$this->escapeString($this->TVshow?->getOverview())}" required>

    <input name="posterId" type="hidden" maxlength="50" value="{$this->escapeString($this->TVshow?->getPosterId())}">


    <button type="submit">Enregistrer</button>
</form>
HTML;
    }

    public function setEntityFromQueryString(): void
    {
        if (!isset($_POST['id']) || empty($_POST['id']) || !is_numeric($_POST['id'])) {
            $id = null;
        } else {
            $id = (int)$_POST['id'];
        }

        if (!isset($_POST['name']) || empty($_POST['name'])) {
            throw new ParameterException('setEntityFromQueryString : nom du tvShow incorrect');
        }
        if (!isset($_POST['originalName']) || empty($_POST['originalName'])) {
            throw new ParameterException('setEntityFromQueryString : originalName du tvShow incorrect');
        }
        if (!isset($_POST['homepage']) || empty($_POST['homepage'])) {
            throw new ParameterException('setEntityFromQueryString : homepage du tvShow incorrect');
        }
        if (!isset($_POST['overview']) || empty($_POST['overview'])) {
            throw new ParameterException('setEntityFromQueryString : overview du tvShow incorrect');
        }


        $nom = $this->stripTagsAndTrim($_POST['name']);
        $originalName = $this->stripTagsAndTrim($_POST['originalName']);
        $homepage = $this->stripTagsAndTrim($_POST['homepage']);
        $overview = $this->stripTagsAndTrim($_POST['overview']);

        $TVshow = TVshow::create($nom, $originalName, $homepage, $overview, null, $id);
        $this->TVshow = $TVshow;
    }



}
