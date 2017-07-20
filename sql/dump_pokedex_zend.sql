-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Juillet 2017 à 23:57
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokedex_zend`
--

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `pokemon` int(11) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `national_id` varchar(3) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext,
  `type1` int(11) DEFAULT NULL,
  `type2` int(11) DEFAULT NULL,
  `previous_pokemon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `national_id`, `name`, `description`, `type1`, `type2`, `previous_pokemon`) VALUES
(1, '001', 'Bulbizarre', 'Bulbizarre passe son temps à faire la sieste sous le soleil. Il y a une graine sur son dos. Il absorbe les rayons du soleil pour faire doucement pousser la graine.', 11, 12, 0),
(2, '002', 'Herbizarre', 'Un bourgeon a poussé sur le dos de ce Pokémon. Pour en supporter le poids, Herbizarre a dû se muscler les pattes. Lorsqu\'il commence à se prélasser au soleil, ça signifie que son bourgeon va éclore, donnant naissance à une fleur.', 11, 12, 1),
(3, '003', 'Florizarre', 'Une belle fleur se trouve sur le dos de Florizarre. Elle prend une couleur vive lorsqu\'elle est bien nourrie et bien ensoleillée. Le parfum de cette fleur peut apaiser les gens.', 11, 12, 2),
(4, '004', 'Salamèche', 'La flamme qui brûle au bout de sa queue indique l\'humeur de ce Pokémon. Elle vacille lorsque Salamèche est content. En revanche, lorsqu\'il s\'énerve, la flamme prend de l\'importance et brûle plus ardemment.', 7, 0, 0),
(5, '005', 'Reptincel', 'Reptincel lacère ses ennemis sans pitié grâce à ses griffes acérées. S\'il rencontre un ennemi puissant, il devient agressif et la flamme au bout de sa queue s\'embrase et prend une couleur bleu clair.', 7, 0, 4),
(6, '006', 'Dracaufeu', 'Dracaufeu parcourt les cieux pour trouver des adversaires à sa mesure. Il crache de puissantes flammes capables de faire fondre n\'importe quoi. Mais il ne dirige jamais son souffle destructeur vers un ennemi plus faible.', 7, 18, 5),
(7, '007', 'Carapuce', 'La carapace de Carapuce ne sert pas qu\'à le protéger. La forme ronde de sa carapace et ses rainures lui permettent d\'améliorer son hydrodynamisme. Ce Pokémon nage extrêmement vite.', 4, 0, 0),
(8, '008', 'Carabaffe', 'Carabaffe a une large queue recouverte d\'une épaisse fourrure. Elle devient de plus en plus foncée avec l\'âge. Les éraflures sur la carapace de ce Pokémon témoignent de son expérience au combat.', 4, 0, 7),
(9, '009', 'Tortank', 'Tortank dispose de canons à eau émergeant de sa carapace. Ils sont très précis et peuvent envoyer des balles d\'eau capables de faire mouche sur une cible située à plus de 50 m.', 4, 4, 8),
(10, '010', 'Chenipan', 'Chenipan a un appétit d\'ogre. Il peut engloutir des feuilles plus grosses que lui. Les antennes de ce Pokémon dégagent une odeur particulièrement entêtante.', 9, 0, 0),
(11, '011', 'Chrysacier', 'La carapace protégeant ce Pokémon est dure comme du métal. Chrysacier ne bouge pas beaucoup. Il reste immobile pour préparer les organes à l\'intérieur de sa carapace en vue d\'une évolution future.', 9, 0, 10),
(12, '012', 'Papilusion', 'Papilusion est très doué pour repérer le délicieux nectar qu\'il butine dans les fleurs. Il peut détecter, extraire et transporter le nectar de fleurs situées à plus de 10 km de son nid.', 9, 18, 11),
(13, '013', 'Aspicot', 'L\'odorat d\'Aspicot est extrêmement développé. Il lui suffit de renifler ses feuilles préférées avec son gros appendice nasal pour les reconnaître entre mille.', 9, 12, 0),
(14, '014', 'Coconfort', 'Coconfort est la plupart du temps immobile et reste accroché à un arbre. Cependant, intérieurement, il est très actif, car il se prépare pour sa prochaine évolution. En touchant sa carapace, on peut sentir sa chaleur.', 9, 12, 13),
(15, '015', 'Dardargnan', 'Dardargnan est extrêmement possessif. Il vaut mieux ne pas toucher son nid si on veut éviter d\'avoir des ennuis. Lorsqu\'ils sont en colère, ces Pokémon attaquent en masse.', 9, 12, 14),
(16, '016', 'Roucool', 'Roucool a un excellent sens de l\'orientation. Il est capable de retrouver son nid sans jamais se tromper, même s\'il est très loin de chez lui et dans un environnement qu\'il ne connaît pas.', 10, 18, 0),
(17, '017', 'Roucoups', 'Roucoups utilise une vaste surface pour son territoire. Ce Pokémon surveille régulièrement son espace aérien. Si quelqu\'un pénètre sur son territoire, il corrige l\'ennemi sans pitié d\'un coup de ses terribles serres.', 10, 18, 16),
(18, '018', 'Roucarnage', 'Ce Pokémon est doté d\'un plumage magnifique et luisant. Bien des Dresseurs sont captivés par la beauté fatale de sa huppe et décident de choisir Roucarnage comme leur Pokémon favori.', 10, 18, 17),
(19, '019', 'Rattata', 'Rattata est extrêmement prudent. Même lorsqu\'il est endormi, il fait pivoter ses oreilles pour écouter autour de lui. En ce qui concerne son habitat, il n\'est vraiment pas difficile. Il peut faire son nid n\'importe où.', 10, 17, 0),
(20, '020', 'Rattatac', 'Les crocs robustes de Rattatac poussent constamment. Pour éviter qu\'ils raclent le sol, il se fait les dents sur des cailloux ou des troncs d\'arbre. Il lui arrive même de ronger les murs des maisons.', 10, 17, 19),
(21, '021', 'Piafabec', 'Piafabec crie tellement fort qu\'il peut être entendu à 1 km de distance. Ces Pokémon se préviennent d\'un danger en entonnant une mélopée très aiguë, qu\'ils se renvoient les uns les autres, comme un écho.', 10, 18, 0),
(22, '022', 'Rapasdepic', 'On reconnaît un Rapasdepic à son long cou et à son bec allongé. Ces attributs lui permettent d\'attraper facilement ses proies dans la terre ou dans l\'eau. Il bouge son bec long et fin avec une grande agilité.', 10, 18, 21),
(23, '023', 'Abo', 'Abo s\'enroule en spirale pour dormir. Sa tête reste relevée de telle sorte que cette position lui permette de réagir rapidement si une menace survenait.', 12, 0, 0),
(24, '024', 'Arbok', 'Ce Pokémon doté d\'une force extraordinaire peut étrangler ses proies avec son corps. Il peut même écraser des tonneaux métalliques. Une fois sous l\'étreinte d\'Arbok, il est impossible de lui échapper.', 12, 0, 23),
(25, '025', 'Pikachu', 'Ce Pokémon dispose de petites poches dans les joues pour stocker de l\'électricité. Elles semblent se charger pendant que Pikachu dort. Il libère parfois un peu d\'électricité lorsqu\'il n\'est pas encore bien réveillé.', 5, 0, 0),
(26, '026', 'Raichu', 'Ce Pokémon libère un faible champ électrique tout autour de son corps, ce qui le rend légèrement lumineux dans le noir. Raichu plante sa queue dans le sol pour évacuer de l\'électricité.', 5, 5, 25),
(27, '027', 'Sabelette', 'Sabelette a une peau très sèche et extrêmement dure. Ce Pokémon peut s\'enrouler sur lui-même pour repousser les attaques. La nuit, il s\'enterre dans le sable du désert pour dormir.', 15, 8, 0),
(28, '028', 'Sablaireau', 'Sablaireau peut enrouler son corps pour prendre la forme d\'une balle hérissée de pointes. Ce Pokémon essaie de faire peur à son ennemi en le frappant avec ses pointes. Puis, il se rue sur lui avec ses griffes acérées.', 15, 8, 27),
(29, '029', 'Nidoran♀', 'Nidoran♀ est couvert de pointes qui sécrètent un poison puissant. On pense que ce petit Pokémon a développé ces pointes pour se défendre. Lorsqu\'il est en colère, une horrible toxine sort de sa corne.', 12, 0, 0),
(30, '030', 'Nidorina', 'Lorsqu\'un Nidorina est avec ses amis ou sa famille, il replie ses pointes pour ne pas blesser ses proches. Ce Pokémon devient vite nerveux lorsqu\'il est séparé de son groupe.', 12, 0, 29),
(31, '031', 'Nidoqueen', 'Le corps de Nidoqueen est protégé par des écailles extrêmement dures. Il aime envoyer ses ennemis voler en leur fonçant dessus. Ce Pokémon utilise toute sa puissance lorsqu\'il protège ses petits.', 12, 15, 30),
(32, '032', 'Nidoran♂', 'Nidoran♂ a développé des muscles pour bouger ses oreilles. Ainsi, il peut les orienter à sa guise. Ce Pokémon peut entendre le plus discret des bruits.', 12, 0, 0),
(33, '033', 'Nidorino', 'Nidorino dispose d\'une corne plus dure que du diamant. S\'il sent une présence hostile, toutes les pointes de son dos se hérissent d\'un coup, puis il défie son ennemi.', 12, 0, 32),
(34, '034', 'Nidoking', 'L\'épaisse queue de Nidoking est d\'une puissance incroyable. En un seul coup, il peut renverser une tour métallique. Lorsque ce Pokémon se déchaîne, plus rien ne peut l\'arrêter.', 12, 15, 33),
(35, '035', 'Mélofée', 'Les nuits de pleine lune, des groupes de ces Pokémon sortent jouer. Lorsque l\'aube commence à poindre, les Mélofée fatigués rentrent dans leur retraite montagneuse et vont dormir, blottis les uns contre les autres.', 6, 0, 0),
(36, '036', 'Mélodelfe', 'Les Mélodelfe se déplacent en sautant doucement, comme s\'ils volaient. Leur démarche légère leur permet même de marcher sur l\'eau. On raconte qu\'ils se promènent sur les lacs, les soirs où la lune est claire.', 6, 0, 35),
(37, '037', 'Goupix', 'À l\'intérieur du corps de Goupix se trouve une flamme qui ne s\'éteint jamais. Pendant la journée, lorsque la température augmente, ce Pokémon crache des flammes pour éviter que son corps ne devienne trop chaud.', 7, 8, 0),
(38, '038', 'Feunard', 'La légende raconte que Feunard est apparu lorsque neuf sorciers aux pouvoirs sacrés décidèrent de fusionner. Ce Pokémon est très intelligent. Il comprend la langue des hommes.', 7, 8, 37),
(39, '039', 'Rondoudou', 'Lorsque ce Pokémon chante, il ne s\'arrête pas pour respirer. Quand il se bat contre un adversaire qu\'il ne peut pas facilement endormir, Rondoudou reste donc sans respirer, mettant sa vie en danger.', 10, 6, 0),
(40, '040', 'Grodoudou', 'Le corps de Grodoudou est très élastique. S\'il inspire profondément, ce Pokémon peut se gonfler à volonté. Une fois gonflé, Grodoudou peut rebondir comme un ballon.', 10, 6, 39),
(41, '041', 'Nosferapti', 'Nosferapti évite la lumière du soleil, car ça le rend malade. Pendant la journée, il reste dans les cavernes ou à l\'ombre des vieilles maisons, où il dort, la tête à l\'envers.', 12, 18, 0),
(42, '042', 'Nosferalto', 'Nosferalto mord sa proie grâce à ses quatre crocs pour boire son sang. Il ne sort que lorsque la nuit est noire et sans lune, pour voleter en quête de gens et de Pokémon à mordre.', 12, 18, 41),
(43, '043', 'Mystherbe', 'Mystherbe cherche un sol fertile et riche en nutriments, pour s\'y planter. Pendant la journée, quand il est planté, les pieds de ce Pokémon changent de forme et deviennent similaires à des racines.', 11, 12, 0),
(44, '044', 'Ortide', 'Ortide bave un miel qui sent horriblement mauvais. Apparemment, il adore cette odeur nauséabonde. Il en renifle les fumées toxiques et se met à baver du miel de plus belle.', 11, 12, 43),
(45, '045', 'Rafflesia', 'Rafflesia dispose des plus grands pétales du monde. Il s\'en sert pour attirer ses proies avant de les endormir avec ses spores toxiques. Ce Pokémon n\'a plus alors qu\'à attraper sa proie et à la manger.', 11, 12, 44),
(46, '046', 'Paras', 'Paras accueille des champignons parasites appelés tochukaso qui poussent sur son dos. Ils grandissent grâce aux nutriments trouvés sur le dos de ce Pokémon Insecte. Ils peuvent rallonger l\'espérance de vie.', 9, 11, 0),
(47, '047', 'Parasect', 'On sait que les Parasect vivent en groupe dans les grands arbres et se nourrissent des nutriments contenus dans le tronc et les racines. Lorsqu\'un arbre infesté meurt, ils se précipitent vers le prochain.', 9, 11, 46),
(48, '048', 'Mimitoss', 'On raconte que Mimitoss a évolué avec une fourrure de poils fins et drus qui protège son corps tout entier. Il est doté de grands yeux capables de repérer ses proies, même minuscules.', 9, 12, 0),
(49, '049', 'Aéromite', 'Aéromite est un Pokémon nocturne, il ne sort donc que la nuit. Ses proies préférées sont les petits insectes qui se rassemblent autour des réverbères, attirés par la lumière.', 9, 12, 48),
(50, '050', 'Taupiqueur', 'Les Taupiqueur sont élevés dans la plupart des fermes. En effet, lorsque ce Pokémon creuse quelque part, le sol est comme labouré, prêt à recevoir les semences. On peut alors y planter de délicieux légumes.', 15, 15, 0),
(51, '051', 'Triopikeur', 'Les Triopikeur sont en fait des triplés qui ont émergé du même corps. C\'est pourquoi chaque triplé pense exactement comme les deux autres. Ils creusent inlassablement, dans une coopération parfaite.', 15, 15, 50),
(52, '052', 'Miaouss', 'Miaouss peut rentrer ses griffes dans ses pattes pour rôder gracieusement sans laisser de traces. Étrangement, ce Pokémon raffole des pièces d\'or qui brillent à la lumière.', 10, 17, 0),
(53, '053', 'Persian', 'Persian a six grosses vibrisses qui lui donnent un air costaud et lui permettent de sentir les mouvements de l\'air pour savoir ce qui se trouve à proximité. Il devient docile lorsqu\'on l\'attrape par les moustaches.', 10, 17, 52),
(54, '054', 'Psykokwak', 'Lorsqu\'il utilise son mystérieux pouvoir, Psykokwak ne s\'en souvient pas. Apparemment, il ne peut pas garder ce genre d\'événement en mémoire, car il pratique ce pouvoir dans un état proche du sommeil profond.', 4, 0, 0),
(55, '055', 'Akwakwak', 'Akwakwak est le Pokémon qui nage le plus vite. Il nage sans se fatiguer, même lorsque la mer est agitée. Il sauve parfois des gens coincés dans les navires bloqués en haute mer.', 4, 0, 54),
(56, '056', 'Férosinge', 'Lorsque Férosinge commence à trembler et que sa respiration devient haletante, cela signifie qu\'il est en colère. En outre, la moutarde lui monte au nez tellement vite qu\'il est presque impossible d\'échapper à sa colère.', 2, 0, 0),
(57, '057', 'Colossinge', 'Lorsque Colossinge devient furieux, sa circulation sanguine s\'accélère. Du coup, ses muscles sont encore plus puissants. En revanche, il devient bien moins intelligent.', 2, 0, 56),
(58, '058', 'Caninos', 'Caninos a un odorat très développé. Ce Pokémon n\'oublie jamais un parfum, quel qu\'il soit. Il utilise son puissant sens olfactif pour deviner les émotions des autres créatures vivantes.', 7, 0, 0),
(59, '059', 'Arcanin', 'Arcanin est célèbre pour son extraordinaire vitesse. On le dit capable de parcourir plus de 10 000 km en 24 h. Le feu qui fait rage à l\'intérieur du corps de ce Pokémon est la source de son pouvoir.', 7, 0, 58),
(60, '060', 'Ptitard', 'Ptitard a une peau très fine. On peut même voir les entrailles en spirale de ce Pokémon à travers sa peau. Malgré sa finesse, cette peau est aussi très élastique. Même les crocs les plus acérés rebondissent dessus.', 4, 0, 0),
(61, '061', 'Têtarte', 'La peau de Têtarte est toujours maintenue humide par un liquide huileux. Grâce à cette protection graisseuse, il peut facilement se glisser hors de l\'étreinte de n\'importe quel ennemi.', 4, 0, 60),
(62, '062', 'Tartard', 'Les muscles solides et surdéveloppés de Tartard ne se fatiguent jamais, quels que soient les efforts qu\'il produit. Ce Pokémon est tellement endurant qu\'il peut traverser un océan à la nage avec une étonnante facilité.', 4, 2, 61),
(63, '063', 'Abra', 'Abra doit dormir dix-huit heures par jour. S\'il dort moins, ce Pokémon ne peut plus utiliser ses pouvoirs télékinétiques. Lorsqu\'il est attaqué, Abra s\'enfuit en utilisant Téléport, sans même se réveiller.', 13, 0, 0),
(64, '064', 'Kadabra', 'Kadabra tient une cuiller en argent dans la main. Elle est utilisée pour amplifier les ondes alpha de son cerveau. Sans elle, on raconte que ce Pokémon ne peut utiliser que la moitié de ses pouvoirs télékinétiques.', 13, 0, 63),
(65, '065', 'Alakazam', 'Le cerveau d\'Alakazam grossit sans arrêt, multipliant sans cesse ses cellules. Ce Pokémon a un QI incroyablement élevé, de 5 000. Il peut garder en mémoire tout ce qui s\'est passé dans le monde.', 13, 13, 64),
(66, '066', 'Machoc', 'Machoc s\'entraîne en soulevant un Gravalanch, comme s\'il s\'agissait d\'haltères. Certains Machoc voyagent un peu partout dans le monde pour apprendre à maîtriser tous les types d\'arts martiaux.', 2, 0, 0),
(67, '067', 'Machopeur', 'Machopeur pratique le body-building tous les jours, même lorsqu\'il aide les gens à réaliser de durs travaux. Pendant ses congés, ce Pokémon va s\'entraîner dans les champs et les montagnes.', 2, 0, 66),
(68, '068', 'Mackogneur', 'Mackogneur est célèbre, car c\'est le seul Pokémon qui a réussi à maîtriser tous les types d\'arts martiaux. S\'il parvient à attraper son ennemi avec ses quatre bras, il le projette par-delà l\'horizon.', 2, 0, 67),
(69, '069', 'Chétiflor', 'Le corps long et flexible de Chétiflor lui permet de se tordre et d\'osciller pour éviter tout type d\'attaque, même les plus puissantes. Ce Pokémon crache un fluide corrosif qui peut même dissoudre le fer.', 11, 12, 0),
(70, '070', 'Boustiflor', 'Boustiflor est doté d\'un gros crochet. La nuit, ce Pokémon s\'accroche à une branche pour s\'endormir. Quand il a un sommeil agité, il se réveille par terre.', 11, 12, 69),
(71, '071', 'Empiflor', 'Empiflor est doté d\'une longue liane qui part de sa tête. Cette liane se balance et remue comme un animal pour attirer ses proies. Lorsque l\'une d\'elles s\'approche un peu trop près, ce Pokémon l\'avale entièrement.', 11, 12, 70),
(72, '072', 'Tentacool', 'Grâce à l\'eau de son corps, Tentacool convertit la lumière du soleil absorbée et la renvoie sous forme de rayon d\'énergie. Ce Pokémon lance ces rayons par le petit organe rond situé au-dessus de ses yeux.', 4, 12, 0),
(73, '073', 'Tentacruel', 'Les tentacules de Tentacruel peuvent s\'allonger et se rétracter à volonté. Il serre sa proie dans ses tentacules et l\'affaiblit en lui injectant une toxine. Il peut attraper jusqu\'à 80 proies en même temps.', 4, 12, 72),
(74, '074', 'Racaillou', 'Pour dormir profondément, Racaillou s\'enterre à moitié dans le sol. Il ne se réveille pas, même si des randonneurs lui marchent dessus. Au petit matin, ce Pokémon roule en contrebas en quête de nourriture.', 14, 15, 0),
(75, '075', 'Gravalanch', 'La nourriture préférée de Gravalanch est la roche. Ce Pokémon escalade parfois les montagnes, dévorant les rochers sur son passage. Une fois au sommet, il se laisse rouler jusqu\'en bas.', 14, 15, 74),
(76, '076', 'Grolem', 'On sait que les Grolem se laissent rouler en bas des montagnes. Afin d\'éviter qu\'ils roulent sur les maisons des gens, des tranchées ont été creusées le long des montagnes pour les guider dans leurs descentes infernales.', 14, 15, 75),
(77, '077', 'Ponyta', 'À sa naissance, Ponyta est très faible. Il peut à peine tenir debout. Ce Pokémon se muscle en trébuchant et en tombant, lorsqu\'il essaie de suivre ses parents.', 7, 0, 0),
(78, '078', 'Galopa', 'On voit souvent Galopa trotter dans les champs et les plaines. Cependant, lorsque ce Pokémon s\'en donne la peine, il peut galoper à plus de 240 km/h et sa crinière flamboyante s\'embrase.', 7, 0, 77),
(79, '079', 'Ramoloss', 'Ramoloss trempe sa queue dans l\'eau au bord des rivières pour attraper ses proies. Cependant, ce Pokémon oublie souvent ce qu\'il fait là et passe des jours entiers à traîner au bord de l\'eau.', 4, 13, 0),
(80, '080', 'Flagadoss', 'Flagadoss a un Kokiyas solidement attaché à sa queue. Du coup, il ne peut plus l\'utiliser pour pêcher. Flagadoss est donc obligé, à contrecœur, de nager pour attraper ses proies.', 4, 13, 79),
(81, '081', 'Magnéti', 'Magnéti flotte dans les airs en émettant des ondes électromagnétiques par les aimants sur ses côtés. Ces ondes annulent les effets de la gravité. Ce Pokémon ne peut plus voler si son stock d\'électricité est épuisé.', 5, 1, 0),
(82, '082', 'Magnéton', 'Magnéton émet un puissant champ magnétique qui neutralise les appareils électroniques. Certaines villes demandent aux propriétaires de ces Pokémon de les garder dans leurs Poké Balls.', 5, 1, 81),
(83, '083', 'Canarticho', 'On voit souvent des Canarticho avec une tige, récupérée sur une plante quelconque. Apparemment, ils peuvent distinguer les bonnes des mauvaises. On a vu ces Pokémon se battre pour des histoires de tiges.', 10, 18, 0),
(84, '084', 'Doduo', 'Les deux têtes de Doduo contiennent des cerveaux totalement identiques. Une étude scientifique démontra que dans des cas rares, certains de ces Pokémon possèdent des cerveaux différents.', 10, 18, 0),
(85, '085', 'Dodrio', 'Apparemment, Dodrio ne se contente pas d\'avoir trois têtes. Il semble également avoir trois cœurs et six poumons, ce qui lui permet de courir très longtemps sans s\'épuiser.', 10, 18, 84),
(86, '086', 'Otaria', 'Otaria chasse ses proies dans l\'eau gelée, sous la couche de glace. Lorsqu\'il cherche à respirer, il perce un trou en frappant la glace avec la partie saillante de sa tête.', 4, 0, 0),
(87, '087', 'Lamantine', 'Lamantine adore piquer un roupillon à même la glace. Il y a très longtemps, un marin ayant aperçu ce Pokémon dormant sur un glacier a cru voir une sirène.', 4, 8, 86),
(88, '088', 'Tadmorv', 'Tadmorv est apparu dans la vase accumulée sur un bord de mer pollué. Ce Pokémon aime tout ce qui est dégoûtant. Une substance pleine de germes suinte constamment de tout son corps.', 12, 12, 0),
(89, '089', 'Grotadmorv', 'Ce Pokémon ne mange que ce qui est répugnant et abject. Les Grotadmorv se rassemblent dans les villes où les gens jettent tout par terre, dans la rue.', 12, 12, 88),
(90, '090', 'Kokiyas', 'La nuit, ce Pokémon utilise sa grande langue pour creuser un trou dans le sable des fonds marins afin d\'y dormir. Une fois endormi, Kokiyas referme sa coquille, mais laisse sa langue dépasser.', 4, 0, 0),
(91, '091', 'Crustabri', 'Crustabri est capable de se déplacer dans les fonds marins en avalant de l\'eau et en la rejetant vers l\'arrière. Ce Pokémon envoie des pointes en utilisant la même méthode.', 4, 8, 90),
(92, '092', 'Fantominus', 'Fantominus est principalement constitué de matière gazeuse. Lorsqu\'il est exposé au vent, son corps gazeux se disperse et diminue. Des groupes de ce Pokémon se rassemblent sous les auvents des maisons pour se protéger.', 16, 12, 0),
(93, '093', 'Spectrum', 'Spectrum est un Pokémon dangereux. Si l\'un d\'entre eux fait signe d\'approcher, il ne faut jamais l\'écouter. Ce Pokémon risque de sortir sa langue pour essayer de voler votre vie.', 16, 12, 92),
(94, '094', 'Ectoplasma', 'Parfois, pendant les nuits noires, une ombre projetée par un réverbère peut tout à coup vous dépasser. Il s\'agit d\'un Ectoplasma qui court, en se faisant passer pour l\'ombre de quelqu\'un d\'autre.', 16, 12, 93),
(95, '095', 'Onix', 'Onix a dans le cerveau un aimant qui lui sert de boussole. Il permet à ce Pokémon de ne pas se perdre pendant qu\'il creuse. En prenant de l\'âge, son corps s\'arrondit et se polit.', 14, 15, 0),
(96, '096', 'Soporifik', 'Lorsque les enfants ont le nez qui les démange en dormant, c\'est sans doute parce que ce Pokémon se tient au-dessus de leur oreiller, afin d\'essayer de manger leurs rêves par leurs narines.', 13, 0, 0),
(97, '097', 'Hypnomade', 'Hypnomade tient un pendule dans sa main. Le mouvement de balancier et les reflets brillants du pendule hypnotisent profondément son ennemi. Lorsque ce Pokémon cherche ses proies, il nettoie son pendule.', 13, 0, 96),
(98, '098', 'Krabby', 'Krabby vit sur les plages, enterré dans le sable. Sur les plages où on trouve peu de nourriture, on peut voir ces Pokémon se disputer pour défendre leur territoire.', 4, 0, 0),
(99, '099', 'Krabboss', 'Krabboss est doté d\'une pince gigantesque, surdimensionnée. Il l\'agite en l\'air pour communiquer avec ses semblables. En revanche, sa pince est tellement lourde que ce Pokémon se fatigue très vite.', 4, 0, 98),
(100, '100', 'Voltorbe', 'Voltorbe est extrêmement sensible. Il explose au moindre choc. On raconte qu\'il fut créé par l\'exposition d\'une Poké Ball à une puissante dose d\'énergie.', 5, 0, 0),
(101, '101', 'Électrode', 'L\'une des caractéristiques d\'Électrode est son attirance pour l\'électricité. Ces Pokémon posent problème lorsqu\'ils se rassemblent dans les centrales électriques pour se nourrir de courant fraîchement généré.', 5, 0, 100),
(102, '102', 'Noeunoeuf', 'Ce Pokémon est constitué de six œufs formant une grappe serrée. Ces six œufs s\'attirent mutuellement et pivotent. Quand des fissures apparaissent sur les coquilles, ça signifie que Noeunoeuf est sur le point d\'évoluer.', 11, 13, 0),
(103, '103', 'Noadkoko', 'Noadkoko vient des tropiques. À force de vivre sous un soleil ardent, ses têtes ont rapidement grandi. On raconte que lorsque ses têtes tombent, elles se rassemblent et forment un Noeunoeuf.', 11, 13, 102),
(104, '104', 'Osselait', 'La maman d\'Osselait lui manque terriblement et il ne la reverra jamais. La lune le fait pleurer, car elle lui rappelle sa mère. Les taches sur le crâne que porte ce Pokémon sont les marques de ses larmes.', 15, 0, 0),
(105, '105', 'Ossatueur', 'Ossatueur est la forme évoluée d\'Osselait. Il a surmonté le chagrin causé par la perte de sa maman et s\'est endurci. Le tempérament décidé et entier de ce Pokémon le rend très difficile à amadouer.', 15, 7, 104),
(106, '106', 'Kicklee', 'Les jambes de Kicklee peuvent se contracter et s\'étirer à volonté. Grâce à ces jambes à ressort, il terrasse ses ennemis en les rouant de coups de pied. Après les combats, il masse ses jambes pour éviter de sentir la fatigue.', 2, 0, 0),
(107, '107', 'Tygnon', 'On raconte que Tygnon dispose de l\'état d\'esprit d\'un boxeur qui s\'entraîne pour le championnat du monde. Ce Pokémon est doté d\'une ténacité à toute épreuve et n\'abandonne jamais face à l\'adversité.', 2, 0, 0),
(108, '108', 'Excelangue', 'Chaque fois qu\'Excelangue découvre quelque chose de nouveau, il le lèche. Sa mémoire est basée sur le goût et la texture des objets. Il n\'aime pas les choses acides.', 10, 0, 0),
(109, '109', 'Smogo', 'Smogo est composé de substances toxiques. Il mélange des toxines et des détritus pour déclencher une réaction chimique générant un gaz très dangereux. Plus la température est élevée, plus la quantité de gaz est importante.', 12, 0, 0),
(110, '110', 'Smogogo', 'Smogogo rétrécit ou gonfle ses deux corps pour mélanger les gaz toxiques qui s\'y trouvent. Lorsque les gaz sont bien mélangés, la toxine devient très puissante. Le Pokémon se putréfie aussi un peu plus.', 12, 0, 109),
(111, '111', 'Rhinocorne', 'Le cerveau de Rhinocorne est tout petit, à tel point que lorsqu\'il attaque, il lui arrive d\'oublier pourquoi il a commencé à charger. Il lui arrive de se souvenir qu\'il a démoli certaines choses.', 15, 14, 0),
(112, '112', 'Rhinoféros', 'La corne de Rhinoféros lui sert de foreuse. Il l\'utilise pour détruire des rochers et des cailloux. Ce Pokémon charge de temps en temps dans du magma en fusion, mais sa peau blindée le protège de la chaleur.', 15, 14, 111),
(113, '113', 'Leveinard', 'Leveinard pond tous les jours des œufs pleins de vitamines. Ces œufs sont tellement bons que les gens les mangent même quand ils n\'ont pas faim.', 10, 0, 0),
(114, '114', 'Saquedeneu', 'Les lianes de Saquedeneu se brisent facilement lorsqu\'on les attrape. Cela ne lui fait pas mal et lui permet simplement de s\'échapper rapidement. Les lianes cassées repoussent le lendemain.', 11, 0, 0),
(115, '115', 'Kangourex', 'Lorsqu\'on rencontre un petit Kangourex qui joue tout seul, il ne faut jamais le déranger ou essayer de l\'attraper. Les parents du bébé Pokémon sont sûrement dans le coin et ils risquent d\'entrer dans une colère noire.', 10, 10, 0),
(116, '116', 'Hypotrempe', 'Lorsque Hypotrempe sent un danger, il libère instinctivement une épaisse encre noire pour pouvoir s\'échapper. Ce Pokémon nage en agitant sa nageoire dorsale.', 4, 0, 0),
(117, '117', 'Hypocéan', 'Hypocéan déclenche des tourbillons en faisant tournoyer son corps. Ces tourbillons sont assez puissants pour engloutir des bateaux de pêche. Ce Pokémon affaiblit sa proie grâce à ces courants, puis l\'avale en une bouchée.', 4, 0, 116),
(118, '118', 'Poissirène', 'Poissirène adore nager librement dans les rivières et les étangs. Si l\'un de ces Pokémon est mis dans un aquarium, il n\'hésitera pas à casser la vitre avec sa puissante corne pour s\'enfuir.', 4, 0, 0),
(119, '119', 'Poissoroy', 'Les Poissoroy font tout pour protéger leurs œufs. Les mâles et les femelles patrouillent pour surveiller le nid et les œufs. La garde de ces œufs dure un peu plus d\'un mois.', 4, 0, 118),
(120, '120', 'Stari', 'Stari communique apparemment avec les étoiles dans le ciel en faisant clignoter son cœur rouge. Si des parties de son corps sont cassées, ce Pokémon les régénère.', 4, 0, 0),
(121, '121', 'Staross', 'Staross nage en faisant tournoyer son corps en forme d\'étoile, un peu à la manière d\'une hélice de bateau. Le cœur au centre du corps de ce Pokémon brille de sept couleurs.', 4, 13, 120),
(122, '122', 'M.Mime', 'M. Mime est un pantomime hors pair. Ses gestes et ses mouvements parviennent à faire croire que quelque chose d\'invisible existe réellement. Lorsqu\'on y croit, ces choses deviennent palpables.', 13, 6, 0),
(123, '123', 'Insécateur', 'Insécateur est incroyablement rapide. Sa vitesse fulgurante améliore l\'efficacité des deux lames situées sur ses avant-bras. Elles sont si coupantes qu\'elles peuvent trancher un énorme tronc d\'arbre en un coup.', 9, 18, 0),
(124, '124', 'Lippoutou', 'Lippoutou marche en rythme, ondule de tout son corps et se déhanche comme s\'il dansait. Ses mouvements sont si communicatifs que les gens qui le voient sont soudain pris d\'une terrible envie de bouger les hanches, sans réfléchir.', 8, 13, 0),
(125, '125', 'Élektek', 'Lorsqu\'une tempête approche, des groupes entiers de ce Pokémon se battent pour grimper sur les hauteurs, où la foudre a le plus de chance de tomber. Certaines villes se servent d\'Élektek en guise de paratonnerres.', 5, 0, 0),
(126, '126', 'Magmar', 'Lorsqu\'il se bat, Magmar fait jaillir des flammes de son corps pour intimider son adversaire. Les explosions enflammées de ce Pokémon déclenchent des vagues de chaleur qui embrasent la végétation environnante.', 7, 0, 0),
(127, '127', 'Scarabrute', 'Scarabrute est doté de cornes imposantes. Des pointes jaillissent de la surface de ses cornes. Ces pointes s\'enfoncent profondément dans le corps de l\'ennemi, l\'empêchant ainsi de s\'échapper.', 9, 9, 0),
(128, '128', 'Tauros', 'Ce Pokémon n\'est pas satisfait s\'il ne détruit pas tout sur son passage. Lorsque Tauros ne trouve pas d\'adversaire, il se rue sur de gros arbres et les déracine pour passer ses nerfs.', 10, 0, 0),
(129, '129', 'Magicarpe', 'Magicarpe est virtuellement inutile en combat. Il se contente de faire des ronds dans l\'eau. On le considère plutôt faible. Pourtant, ce Pokémon est très robuste et peut survivre dans n\'importe quel environnement, même très pollué.', 4, 0, 0),
(130, '130', 'Léviator', 'Lorsque Léviator commence à s\'énerver, sa nature violente ne se calme qu\'une fois qu\'il a tout réduit en cendres. La fureur de ce Pokémon peut durer pendant un mois.', 4, 18, 129),
(131, '131', 'Lokhlass', 'Les Lokhlass sont en voie d\'extinction. Le soir, on entend ce Pokémon chantonner une complainte mélancolique, espérant retrouver ses rares congénères.', 4, 8, 130),
(132, '132', 'Métamorph', 'Métamorph peut modifier sa structure moléculaire pour prendre d\'autres formes. Lorsqu\'il essaie de se transformer de mémoire, il lui arrive de se tromper sur certains détails.', 10, 0, 0),
(133, '133', 'Évoli', 'Évoli a une structure génétique instable qui se transforme en fonction de l\'environnement dans lequel il vit. Ce Pokémon peut évoluer grâce aux radiations de diverses pierres.', 10, 0, 0),
(134, '134', 'Aquali', 'Aquali a subi une mutation spontanée. Des nageoires et des branchies sont apparues sur son corps, ce qui lui permet de vivre dans les fonds marins. Ce Pokémon peut contrôler l\'eau à volonté.', 4, 0, 133),
(135, '135', 'Voltali', 'Les cellules de Voltali génèrent un courant de faible intensité. Ce pouvoir est amplifié par l\'électricité statique de ses poils, ce qui lui permet d\'envoyer des éclairs. Sa fourrure hérissée est faite d\'aiguilles chargées d\'électricité.', 5, 0, 133),
(136, '136', 'Pyroli', 'La fourrure soyeuse de Pyroli a une fonction anatomique. Elle rejette la chaleur dans l\'air pour que son corps ne surchauffe pas. La température du corps de ce Pokémon peut atteindre 900 °C.', 7, 0, 133),
(137, '137', 'Porygon', 'Porygon est capable de se décompiler et de retourner à l\'état de programme informatique pour entrer dans le cyberespace. Ce Pokémon est protégé contre le piratage, il est donc impossible de le copier.', 10, 0, 0),
(138, '138', 'Amonita', 'Amonita est l\'un des Pokémon disparus depuis longtemps et qui furent ressuscités à partir de fossiles. Lorsqu\'il est attaqué par un ennemi, il se rétracte dans sa coquille.', 14, 4, 0),
(139, '139', 'Amonistar', 'Amonistar utilise ses tentacules pour capturer ses proies. On pense que l\'espèce s\'est éteinte parce que sa coquille était devenue trop grande et trop lourde, ce qui rendait ses mouvements lents et pesants.', 14, 4, 138),
(140, '140', 'Kabuto', 'Kabuto est un Pokémon ressuscité à partir d\'un fossile. Cependant, on a découvert des spécimens vivants. Ce Pokémon n\'a pas changé depuis 300 millions d\'années.', 14, 4, 0),
(141, '141', 'Kabutops', 'Jadis, Kabutops plongeait dans les profondeurs pour trouver ses proies. Apparemment, ce Pokémon vivant sur terre est l\'évolution d\'une créature marine, comme le prouvent les changements dans ses branchies.', 14, 4, 140),
(142, '142', 'Ptéra', 'Ptéra est un Pokémon de l\'ère des dinosaures. Il fut ressuscité à partir de cellules extraites d\'un morceau d\'ambre. On pense qu\'il était le roi des cieux à l\'époque préhistorique.', 14, 18, 0),
(143, '143', 'Ronflex', 'Les journées de Ronflex se résument aux repas et aux siestes. C\'est un Pokémon tellement gentil que les enfants n\'hésitent pas à jouer sur son énorme ventre.', 10, 0, 0),
(144, '144', 'Artikodin', 'Artikodin est un Pokémon Oiseau légendaire qui peut contrôler la glace. Le battement de ses ailes gèle l\'air tout autour de lui. C\'est pourquoi on dit que lorsque ce Pokémon vole, il va neiger.', 8, 18, 0),
(145, '145', 'Électhor', 'Électhor est un Pokémon Oiseau légendaire capable de contrôler l\'électricité. Il vit généralement dans les nuages orageux. Ce Pokémon gagne en puissance lorsqu\'il est frappé par la foudre.', 5, 18, 0),
(146, '146', 'Sulfura', 'Sulfura est un Pokémon Oiseau légendaire capable de contrôler le feu. On raconte que lorsque ce Pokémon est blessé, il se baigne dans le magma en ébullition d\'un volcan pour se soigner.', 7, 18, 0),
(147, '147', 'Minidraco', 'Minidraco mue constamment, renouvelant sans arrêt sa peau. En effet, l\'énergie vitale de son corps augmente régulièrement et sa mue lui permet d\'éviter d\'atteindre des niveaux incontrôlables.', 3, 0, 0),
(148, '148', 'Draco', 'Draco stocke une quantité d\'énergie considérable dans son corps. On raconte qu\'il peut modifier les conditions climatiques autour de lui en déchargeant l\'énergie contenue dans les cristaux de son cou et de sa queue.', 3, 0, 147),
(149, '149', 'Dracolosse', 'Dracolosse est capable de faire le tour de la planète en seize heures à peine. C\'est un Pokémon au grand cœur qui ramène à bon port les navires perdus dans les tempêtes.', 3, 18, 148),
(150, '150', 'Mewtwo', 'Mewtwo est un Pokémon créé par manipulation génétique. Cependant, bien que les connaissances scientifiques des humains aient réussi à créer son corps, elles n\'ont pas pu doter Mewtwo d\'un cœur sensible.', 13, 13, 0),
(151, '151', 'Mew', 'On dit que Mew possède le code génétique de tous les autres Pokémon. Il peut se rendre invisible à sa guise, ce qui lui permet de ne pas se faire remarquer quand il s\'approche des gens.', 13, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type`
--

INSERT INTO `type` (`id`, `name`, `color`) VALUES
(1, '  Acier', '#B7B7CE'),
(2, '  Combat', '#C22E28'),
(3, '  Dragon', '#6F35FC'),
(4, '  Eau', '#6390F0'),
(5, '  Électrik', '#F7D02C'),
(6, '  Fée', '#D685AD'),
(7, '  Feu', '#EE8130'),
(8, '  Glace', '#96D9D6'),
(9, '  Insecte', '#A6B91A'),
(10, '  Normal', '#A8A77A'),
(11, '  Plante', '#7AC74C'),
(12, '  Poison', '#A33EA1'),
(13, '  Psy', '#F95587'),
(14, '  Roche', '#B6A136'),
(15, '  Sol', '#E2BF65'),
(16, '  Spectre', '#735797'),
(17, '  Ténèbres', '#705746'),
(18, '  Vol', '#A98FF3');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.fr', '$2a$06$5EwU12VA/Fk/UPlWVGCQQeFfoVpCH5tHFSK3I/.u59IoJ8fXFtfHy');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
