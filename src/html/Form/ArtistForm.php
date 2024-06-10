<?php

namespace html\Form;

use Entity\Artist;
use Exception\ParameterException;
use Html\StringEscaper;
use Html\Webpage;
use Html\AppWebPage;

class ArtistForm
{
    use StringEscaper;
    private ?Artist $artist;

    /**
     * @param Artist|null $artist
     */
    public function __construct(?Artist $artist = null)
    {
        $this->artist = $artist;
    }
    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function getHtmlForm(string $url): string
    {
        return <<<HTML
        
<form name="form" method="post" action="$url">

    <input name="id" type="hidden" maxlength="5" value="{$this->artist?->getId()}">
    <label>
    Nom
    <input name="name" type="text" maxlength="50" value="{$this->escapeString($this->artist?->getName())}" required>
</label>
    <label>
    <button type="submit">Enregistrer</button>
</label>
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
            throw new ParameterException('setEntityFromQueryString : nom de l\'artiste incorrect');
        }
        $nom = $_POST['name'];

        $artist = Artist::create($this->stripTagsAndTrim($nom), $id);
        $this->artist = $artist;
    }

}
