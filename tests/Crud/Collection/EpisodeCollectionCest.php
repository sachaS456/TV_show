<?php

namespace Crud\Collection;


use Entity\Episode;
use Tests\CrudTester;
use Entity\Season;
use Entity\Collection\EpisodeCollection;
class EpisodeCollectionCest
{
    public function findByTvshowId(CrudTester $I)
    {
        $expectedEpisodes = [
            [
                'id' => 3884,
                'name' => 'Titanic 2',
                'seasonId' => 210,
                'overview' => "Le professeur décide d'emmener Planet Express sur le Titanic II. Bien entendu, Zap Brannigan est le capitaine. Contre toute attente, Bender tombe amoureux. Qui aurait pu penser qu'il était capable d'éprouver de tels sentiments?",
                'episodeNumber' => 1,
            ],
            [
                'id' => 3885,
                'name' => "L'Université martienne",
                'seasonId' => 210,
                'overview' => "Sur Mars, Fry découvre qu'il existe une université et il compte bien reprendre ses études. Dans le même temps, le Professeur enseigne une matière très complexe qui dégoûte les étudiants - ce qu'il adore par ailleurs. Fry partage sa chambre avec un singe nommé Guenter qui porte un chapeau melon électronique qui lui offre des capacités intellectuelles phénoménales, et les deux colocataires ne s'entendent pas du tout. Guenter est cependant stressé par ses études et est sans cesse tiraillé entre sa vie de génie chez les humains et son animalité alliée à son désir de retourner vivre dans la jungle.",
                'episodeNumber' => 2,
            ],
            [
                'id' => 3886,
                'name' => 'Omicron Persei  8 attaque',
                'seasonId' => 210,
                'overview' => "Les Omicroniens envahissent la Terre et exigent que leur soit remis le président. Il s'avère en fait que la personne qu'ils recherchent est une actrice du XXe siècle, qui apparaît dans une série, \"Avocate et Célibataire\", qui n'a atteint Omicron Perseï Huit qu'un siècle plus tard. La série a été arrêtée à cause de Fry qui avait renversé du soda sur la machine qui la diffusait. La bande magnétique a été détruite ; lorsqu'ils l'apprennent, les Omicroniens imposent qu'un épisode final leu",
                'episodeNumber' => 3,
            ],
            [
                'id' => 3887,
                'name' => 'Buvez du Slurm',
                'seasonId' => 210,
                'overview' => "Accro au Slurm, une boisson désaltérante qui rend dépendant celui qui la boit, Fry gagne le privilège de faire la fête avec Slurm Mc Kensie, la limace la plus cool du monde. Toute l'équipe de Planet Express est également invitée pour visiter l'usine de fabrication du Slurm. Bender, Fry et Leela vont découvrir l'incroyable vérité sur le secret de fabrication du Slurm : La boisson est constituée des déjections d'une reine limace !",
                'episodeNumber' => 4,
            ],
            [
                'id' => 3888,
                'name' => 'Sentiments partagés',
                'seasonId' => 210,
                'overview' => "Bender manque de se faire tuer par l’ouvre-boite destiné à ouvrir les conserves de Nibbler. Il essaie alors de se débarrasser de Nibbler qui se casse une dents en tentant de se défendre. Chez le Vétérinaire, Fry découvre que Nibbler aurait 5 ans et tout le monde décide d’organiser une fête pour son anniversaire. Bender essaie d’attirer l’attention sur lui alors que tout le monde est tourné vers Nibbler et fait un gâteau pour les impressionner, mais Nibbler s’empresse de le dévorer. Dans un excès de colère, Bender s’en débarrasse en le jetant dans les toilettes. Pour que Bender éprouve un peu de regret, le Professeur lui implante une puce qui lui fait ressentir toutes les émotions de Leela. Fou de chagrin, Bender se jette à son tour dans les toilettes pour retrouver Nibbler dans les égouts où vivent, selon une légende urbaine, des mutants.",
                'episodeNumber' => 5,
            ],
            [
                'id' => 3889,
                'name' => 'La Déchéance de Brannigan',
                'seasonId' => 210,
                'overview' => "L’équipe de Planet Express doit livrer une paire de ciseaux géantes au DOOP (Directoire Officiel de l’Ordre des planètes) qui inaugure son nouveau siège. Zapp Brannigan les arrête sous prétexte que les ciseaux sont une arme secrète d’une conspiration des neutres. Malgré une mise en garde de Kif, Zapp tente de couper le ruban d’inauguration depuis son vaisseau avec un LASER et détruit le nouveau siège. Il est jugé dans un tribunal du DOOP qui décide de l’exclure de ses forces et de le dégrader, ainsi que Kif. Ils s’adressent à Planet Express et le Professeur les embauche tous les deux. Au cours d’une livraison, Bender et Fry se mutinent et font de Zapp leur nouveau capitaine. Zapp voudrait retrouver sa place au sein du DOOP et, pour arriver à ses fins, ne trouve pas d’autre solution que d’attaquer Neutralia, la planète des neutres, en y écrasant le vaisseau de Planet Express. Fry et Bender décident donc de se retourner vers Leela.",
                'episodeNumber' => 6,
            ],
            [
                'id' => 3890,
                'name' => 'Fortes Têtes',
                'seasonId' => 210,
                'overview' => "Dans un contexte de campagne pour la présidence du Monde, et à la suite de l’effondrement d’une mine de titanium, Bender décide de vendre son corps (fait à 40 % de titanium) pour devenir riche. Réduit à l’état de tête, Bender se rend vite compte que, sans corps, il ne peut pas faire grand-chose et il décide d’aller le récupérer. Mais son corps a déjà été acheté par la tête de Richard Nixon, qui désire se présenter et qui espère obtenir les voix des robots grâce à son nouveau corps de métal.",
                'episodeNumber' => 7,
            ],
            [
                'id' => 3891,
                'name' => 'Conte de Noël',
                'seasonId' => 210,
                'overview' => "Se préparant à passer Noël, Fry est nostalgique car de nombreux changements ont eu lieu dans le futur, rendant Noël moins traditionnel. Fry se sent seul car sa famille a disparu et Leela aussi car elle est la seule de son espèce. En allant acheter un perroquet à Leela, Fry apprend que le Père Noël a été remplacé par un robot et tue systématiquement, à la suite d'une erreur de programmation, toutes les personnes qu’il trouve dehors après le coucher du soleil. Mais le perroquet s’enfuit, ce qui retarde Fry et le met en danger. Leela ne dispose que d’une heure pour retrouver Fry avant l’arrivée du Père Noël.",
                'episodeNumber' => 8,
            ],
            [
                'id' => 3892,
                'name' => 'C\'est si dur d\'être un crustacé amoureux',
                'seasonId' => 210,
                'overview' => 'Leela, Fry, Bender et Zoidberg décident d’aller au gymnase. Zoidberg se montre très en forme et finit par devenir agressif. Le professeur détermine la cause de cette agressivité comme une « surcharge de laitance ». Fry et Leela accompagnent Zoidberg sur sa planète d’origine afin qu’il puisse accomplir sa parade amoureuse. Mais Zoidberg reste seul alors que les autres crustacés ont trouvé leur fiancée. Il prend alors des cours de drague auprès de Fry pour séduire Edna, une femelle qu’il a connu étant jeune et qui représente son seul espoir. Pourtant, Edna apprend que c’est Fry qui est à l’origine de la parade et tombe amoureuse de lui. Pour récupérer sa belle, Zoidberg décide d’affronter Fry au « claque-pince », un combat rituel à mort.',
                'episodeNumber' => 9,
            ],
            [
                'id' => 3893,
                'name' => 'La Tête sur l\'épaule',
                'seasonId' => 210,
                'overview' => 'Amy et Fry partent sur Mercure essayer la toute nouvelle voiture d’Amy mais tombent en panne d’essence. En attendant le dépanneur, ils « sympathisent » et se mettent ensembles. Mais Fry ne tarde pas à craindre qu’Amy ne s’attache trop à lui. Lors d’un pique-nique sur Europe où Fry a invité Zoidberg pour ne pas se retrouver en tête à tête, ils ont un terrible accident et le corps de Fry se retrouve mutilé. Afin de conserver la tête en vie, Zoidberg la greffe sur l’épaule d’Amy. C’est une fois que Fry partage le corps d’Amy qu’il décide de rompre avec elle, à quelques jours de la Saint Valentin.',
                'episodeNumber' => 10,
            ],
            [
                'id' => 3894,
                'name' => 'Le Moins Pire des deux',
                'seasonId' => 210,
                'overview' => 'Fry, Leela et Bender visitent une réplique de l’ancienne New York de l’an 2000. En essayant de conduire une ancienne voiture, Fry renverse Flexo, un robot tordeur qui ressemble à Bender hormis une petite barbichette. L’équipage de Planet Express doit livrer un atome de Jumbonium d’une grande valeur destiné à orner la couronne de la future Miss Univers. Le Professeur Farnsworth décide d’embaucher Flexo afin d\'avoir une personne en plus pour assurer la sécurité de l’atome bien que Fry s’en méfie. Fry reste pour surveiller Flexo pendant son tour de garde ce qui fait durant le sien, Fry finit par s’endormir. À son réveil, il découvre que l’atome a été volé.',
                'episodeNumber' => 11,
            ],
            [
                'id' => 3895,
                'name' => 'Raging Bender',
                'seasonId' => 210,
                'overview' => "L’équipe de Planet Express se rend au cinéma où Bender a une altercation avec un robot. Bender finit par le vaincre malgré lui et il s’avère que le robot était l’Unité Masquée, le robot numéro 1 du catch robotique. Bender est alors repéré par un agent qui l’intègre à la ligue du catch robotique. Leela apprend que son ancien professeur de karaté, qui n’a jamais eu d’estime pour elle, entraîne un robot catcheur et elle décide de devenir l’entraîneur officiel de Bender pour se venger.",
                'episodeNumber' => 12,
            ],
            [
                'id' => 3896,
                'name' => 'Le Mariage de Leela',
                'seasonId' => 210,
                'overview' => "Le Professeur Farnsworth obtient enfin une connexion à Internet et toute l'équipe de Planet Express se retrouve dans le monde virtuel. Alors qu'ils jouent à un jeu vidéo, Leela rencontre un séduisant cyclope, qui représente une chance incroyable de retrouver ses origines et la planète d'où elle vient. Mais Fry, emporté par le jeu, explosent les deux cyclopes avant qu'ils aient pu se donner leurs coordonnées. Heureusement, Alcazar, puisque c'est le nom du cyclope, recontacte Leela qui abandonne sur le champ sa livraison de pop-corn et met le cap, avec Fry et Bender, vers la planète qu'il lui a indiqué. Sous le charme, elle comprend trop tard que sous son apparence séduisante se cache un macho insupportable. Cependant, Alcazar incarne le seul espoir de sauver la race des cyclopes, menacée d'extinction...",
                'episodeNumber' => 13,
            ],
            [
                'id' => 3897,
                'name' => 'L’Inspectrice de l’administration centrale',
                'seasonId' => 210,
                'overview' => "Hermès est très content de lui : l'administration centrale s'apprête à l'inspecter et il est pratiquement sûr d'avoir une promotion. Mais Bender et d'anciens collègues de Leela, roulés au poker par ce dernier, se battent et mettent son bureau sens dessus dessous. Hermès menace de mettre fin à ses jours...mais est finalement mis à pied par l'inspectrice et part en vacances (\"le châtiment suprême\") à spa 5, en fait un camp de travail forcé. L'inspectrice, Morgan Proctor, se met rapidement à dos toute l'équipe sauf...Fry, qui l'a séduite - paradoxalement - à cause de son côté sale et désordonné. Mais Bender veille, et il finit par découvrir leur relation en menaçant de la révéler au grand jour. Morgan retire à Bender sa carte-mère, qui est toute sa personnalité, et rompt avec Fry. L'équipage de \"Planet Express\" décide de rechercher la carte mère de Bender à l'administration centrale...",
                'episodeNumber' => 14,
            ],
            [
                'id' => 3898,
                'name' => 'Le Clone de Farnsworth',
                'seasonId' => 210,
                'overview' => "Le Professeur Hubert Farnsworth n'a plus longtemps à vivre : il approche de ses 160 ans, l'âge où l'escadron de la mort vient chercher les personnes âgées et les emmène sur une planète inconnue. Pour ne pas laisser ses recherches inachevées, il décide de nommer quelqu'un à sa succession. Leela, Bender, Hermes, Amy et surtout Fry se voit bien en légataires universels... Cependant, le professeur a eu une autre idée; il leur présente donc Cubert Farnsworth, son clone, identique en tous points à lui-même, sauf en ce qui concerne son nez, plus épaté. Cubert est un enfant insupportable et arrogant; de plus, il ne manifeste aucune envie de devenir scientifique et se moque même de certaines découvertes de son illustre aîné. Désespéré, le professeur Farnsworth appelle la Mort pour qu'elle vienne le chercher mais son équipe va utiliser ses inventions pour venir libérer le professeur Farnsworth de son terrible destin.",
                'episodeNumber' => 15,
            ],
            [
                'id' => 3899,
                'name' => 'Le Sud profond',
                'seasonId' => 210,
                'overview' => "Au plus profond de l'océan, l'équipe découvre la ville perdue d'Atlanta. Fry tombe éperdument amoureux d'une sirène.",
                'episodeNumber' => 16,
            ],
            [
                'id' => 3900,
                'name' => "Bender s'affranchit",
                'seasonId' => 210,
                'overview' => "Après avoir rejoint la mafia des robots, Bender se retrouve embarqué dans un plan machiavélique destiné à dérober le vaisseau de Planet Express et à éliminer les membres de l'équipe.",
                'episodeNumber' => 17,
            ],
            [
                'id' => 3901,
                'name' => 'Délicieux Enfants',
                'seasonId' => 210,
                'overview' => "L'équipe de Planet Express revient de la planète des Emprunteurs, qui leur ont volé toute leur nourriture alors qu'il leur reste encore deux jours de voyage. Ils mettent donc le pied sur une planète inconnue en espérant y trouver de quoi manger. Bender et Fry découvre une sorte de \"trou rempli de beignets de langoustines\". Leela, après s'être assurée que cette \"chose\" n'est pas toxique, décide d'y goûter, imitée par Fry. C'est excellent. Ils en rapportent sur Terre et les \"popplers\" - le nom qu'ils leur ont trouvé - connaissent un grand succès. Alors que Leela s'apprête à dévorer un énième poppler, celui-ci ouvre les yeux et l'appelle \"Maman\". La cyclope décide alors d'informer la population, mais personne ne l'écoute... Peu après, les popplers adultes débarquent sur Terre, et demandent justice : ils veulent obtenir le droit de manger autant de bébés humains que les Terriens ont mangé de bébés popplers - soit 300 milliards d'humains. Zap Brannigan réussit à négocier, et tous les humains seront épargnés à conditions que les popplers puissent manger le premier humain à avoir goûté l'un de leurs enfants - soit Leela. Zap Brannigan donne aux popplers, qui ont quelques problèmes de vue, un orang-outan à la place de Leela.",
                'episodeNumber' => 18,
            ],
            [
                'id' => 3902,
                'name' => 'Fête des mères',
                'seasonId' => 210,
                'overview' => "Chaque année, le jour de la fête des mères, tous les robots - dont Bender - fabriqués dans l'\"Usine de Maman\" lui apporte des cartes, des cadeaux et de l'argent. Bender est sûr de devenir le préféré de sa mère grâce à la jolie carte qu'il compte lui offrir. Cependant, cette année, M'man est amère au sujet d'une liaison terminée depuis plus de 70 ans. Elle décide, grâce à une petite télécommande qui contrôle l'antenne de ses robots, de les amener à se rebeller et à renverser les gouvernements humains. Cependant, les trois vrais fils de M'man découvre que la vieille histoire d'amour qui la fait souffrir implique également...le Professeur Hubert Farnsworth. Ils essaient donc de le convaincre de coopérer au plan qu'ils ont mis en place pour sauver la Terre...",
                'episodeNumber' => 19,
            ],
            [
                'id' => 3903,
                'name' => 'Histoires formidables I',
                'seasonId' => 210,
                'overview' => "Le Professeur Farnsworth, critique, passe en revue ses inventions. Il fait découvrir à l'équipage de Planet Express une machine qui permet de simuler les souhaits de n'importe qui. On découvre alors trois histoires : celle de Bender, transformé en robot géant, de Leela, plus \"impulsive\" et légataire universelle de Farnsworth, et enfin celle de Fry qui crée par erreur une faille dans l'espace temps et se fait aider par Al Gore, Stephen Hawking, Gary Gygax et Nichelle Nichols.",
                'episodeNumber' => 20,
            ],
        ];

        $episodes = EpisodeCollection::findBySeasonId(210);
        $I->assertCount(count($expectedEpisodes), $episodes);
        $I->assertContainsOnlyInstancesOf(Episode::class, $episodes);
        foreach ($episodes as $index => $episode) {
            $expectedEpisode = $expectedEpisodes[$index];
            $I->assertEquals($expectedEpisode['id'], $episode->getId());
            $I->assertEquals($expectedEpisode['name'], $episode->getName());
            $I->assertEquals($expectedEpisode['seasonId'], $episode->getSeasonId());
            $I->assertEquals($expectedEpisode['episodeNumber'], $episode->getEpisodeNumber());
        }
    }
}