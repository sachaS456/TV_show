<?php

namespace html;

trait StringEscaper
{
    /**
     * Protéger les caractères spéciaux pouvont dégrader la page Web
     *
     * @param string $string La chaîne à protéger
     * @return string La chaîne protégée
     */
    public function escapeString(?string $string = null): string
    {
        return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5) ?? '';
    }

    public function stripTagsAndTrim(?string $string = null): string
    {
        return trim(strip_tags($string ?? ''));
    }
}
