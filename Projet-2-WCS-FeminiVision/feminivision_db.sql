DROP DATABASE IF EXISTS feminivision;

CREATE DATABASE feminivision;

USE feminivision;

CREATE TABLE directors (
    id int unsigned NOT NULL AUTO_INCREMENT,
    firstname varchar(255),
    lastname varchar(255),
    PRIMARY KEY(id));

CREATE TABLE movies (
        id int unsigned NOT NULL AUTO_INCREMENT,
        title varchar(255),
        date_add DATETIME,
        year int,
        nationality varchar(255),
        duration varchar(25),
        synopsis text,
        about text,
        PRIMARY KEY(id)) ;

CREATE TABLE movies_directors(
    movie_id int unsigned NOT NULL,
    director_id int unsigned NOT NULL,
    PRIMARY KEY(movie_id, director_id),
    FOREIGN KEY (movie_id) REFERENCES movies(id),
    FOREIGN KEY (director_id) REFERENCES directors(id));
   
CREATE TABLE genres (
    id int unsigned NOT NULL AUTO_INCREMENT,
    name varchar(255),
    PRIMARY KEY (id)
    );

CREATE TABLE movies_genres (
    movie_id int unsigned NOT NULL,
    genre_id int unsigned NOT NULL,
    PRIMARY KEY (movie_id, genre_id),
    CONSTRAINT FK_MoviesGenre FOREIGN KEY (movie_id) REFERENCES movies(id),
    CONSTRAINT FK_GenreMovies FOREIGN KEY (genre_id) REFERENCES genres(id));

INSERT INTO directors (firstname, lastname) VALUES 
('Alice', 'Guy'),
('Marjane', 'Satrapi'),
('Kathryn', 'Bigelow'),
('Maïwenn',''),
('Julia', 'Ducournau'),
('Vincent', 'Paronnaud'),
('Marry', 'Harron'),
('Julie', 'Taymor'),
('Patty', 'Jenkins'),
('Rachel', 'Lears'), 
('Brenda', 'Chapman'),
('Mark', 'Andrews'),
('Anne', 'Fontaine'),
('Chloé', 'Zhao'),
('Christine', 'Carrière'),
('Greta', 'Gerwig'),
('Kelly', 'Reichardt'),
('Sofia', 'Coppola'),
('Sophie', 'Barthes'),
('Laura', 'Poitras'), 
('Naoko', 'Yamada'),
('Jane', 'Campion'),
('Kátia', 'Lund'),
('Fernando', 'Meirelles'),
('Nora', 'Twomey'),
('Sarah', 'Maldoror'),
('Agnès', 'Varda'),
('Safi', 'Faye'),
('Anne-Laure', 'Folly'),
('Marian E.', 'Wong'),
('Tang', 'Cheng'),
('Wu', 'Qiang'),
('Te', 'Wei'),
('Qian', 'Jiajun'),
('Farida', 'Benlyazid'),
('Maya', 'Deren'),
('Alexander', 'Hammid'),
('Věra', 'Chytilová')
;


INSERT INTO movies (title, year, nationality, duration, synopsis, about) VALUES
('La Fée aux Choux', 1896, 'Europe', '51s', 'Dans un jardin, une fée salue aimablement le public, et se penche sur des choux immenses. Elle en sort comme par magie un, puis deux nouveau-nés qui gigotent, puis un troisième figuré par une poupée, qui sont successivement déposés à terre, donnant ainsi foi à la légende du folklore français selon laquelle les petits garçons naissent dans les choux et les petites filles dans les roses.', 'Alice Guy est considérée comme la première femme réalisatrice'),
('Persepolis', 2007, 'Europe', '95min', "Téhéran 1978 : Marjane, huit ans, songe à l'avenir et se rêve en prophète sauvant le monde. Choyée par des parents modernes et cultivés, particulièrement liée à sa grand-mère, elle suit avec exaltation les évènements qui vont mener à la révolution et provoquer la chute du régime du Chah.
Avec l'instauration de la République islamique débute le temps des 'commissaires de la révolution' qui contrôlent tenues et comportements. Marjane qui doit porter le voile, se rêve désormais en révolutionnaire.
Bientôt, la guerre contre l'Irak entraîne bombardements, privations, et disparitions de proches. La répression intérieure devient chaque jour plus sévère.
Dans un contexte de plus en plus pénible, sa langue bien pendue et ses positions rebelles deviennent problématiques. Ses parents décident alors de l'envoyer en Autriche pour la protéger.
A Vienne, Marjane vit à quatorze ans sa deuxième révolution : l'adolescence, la liberté, les vertiges de l'amour mais aussi l'exil, la solitude et la différence. ", "Marjane Satrapi s'est d'abord illustrée dans la BD Persepolis avant de porter son oeuvre en long métrage. Il reçut le prix du jury à Cannes en 2007 et fut nominé aux Oscars en 2008." ),
('Démineurs', 2009, 'Amérique', '131min', "Bagdad. Le lieutenant James est à la tête de la meilleure unité de déminage de l'US Army. Leur mission : désamorcer des bombes dans des quartiers civils ou des théâtres de guerre, au péril de leur vie, alors que la situation locale est encore... explosive.", "Le 7 mars 2010, à Los Angeles, il obtient six Oscars dont ceux du meilleur film et du meilleur réalisateur. Kathryn Bigelow est ainsi devenue la première femme à remporter l'Oscar du meilleur réalisateur." ),
('Polisse', 2011, 'Europe', "127min", "Avertissement : des scènes, des propos ou des images peuvent heurter la sensibilité des spectateurs     
Le quotidien des policiers de la BPM (Brigade de  Protection des Mineurs) ce sont les gardes à vue de pédophiles, les  arrestations de pickpockets mineurs mais aussi la pause déjeuner où l’on  se raconte ses problèmes de couple ; ce sont les auditions de parents  maltraitants, les dépositions des enfants, les dérives de la sexualité  chez les adolescents, mais aussi la solidarité entre collègues et les  fous rires incontrôlables dans les moments les plus impensables ; c’est  savoir que le pire existe, et tenter de faire avec… 
Comment ces  policiers parviennent-ils à trouver l’équilibre entre leurs vies privées  et la réalité à laquelle ils sont confrontés, tous les jours ? Fred,  l’écorché du groupe, aura du mal à supporter le regard de Melissa,  mandatée par le ministère de l’intérieur pour réaliser un livre de  photos sur cette brigade.", "Il a été présenté en compétition officielle au Festival de Cannes 2011 où il reçoit le prix du jury. Il a reçu deux César en 2012, celui du meilleur espoir féminin et du meilleur montage. Le titre est inspiré par une faute d'orthographe du fils de la réalisatrice en écrivant le mot Police"),
('Grave', 2016, 'Europe', "98min", "Interdit aux moins de 16 ans     
Dans la famille de Justine tout le monde est  vétérinaire et végétarien. À 16 ans, elle est une adolescente surdouée  sur le point d’intégrer l’école véto où sa sœur ainée est également  élève. Mais, à peine installés, le bizutage commence pour les premières  années. 
On force Justine à manger de la viande crue. C’est la première  fois de sa vie. Les conséquences ne se font pas attendre. Justine  découvre sa vraie nature.", "Le film a été présenté en compétition au festival de Cannes 2016 pendant la Semaine de la critique, puis est sorti en salles en 2017."),
('American Psycho', 2000, 'Amérique', '101min',"Au coeur des années Reagan, Patrick Bateman est un pur produit de la réussite américaine. Jeune, riche, il est un de ces golden boys qui triomphent à la bourse. Seul le nec plus ultra est digne de lui et il s'emploie à ne retrouver que des symboles qui lui renvoient une image de succès. Il accumule, avec une obsession maladive, les vêtements selects, les relations enviables. 
Son voeu le plus cher est de se fondre dans cette foule, de trouver sa place au milieu de ceux auxquels il s'identifie.", "Mary Harron et Guinevere Turner , toutes deux scénaristes sur le film, reçurent le prix du Best Screenplay Adapted (littéralement meilleur scénario adapté aux Chlotrudis Awards en 2001. 
Mary Harron fut également nominée aux Online Film Critics Society Awards la même année. Le film reçut 2 autres récompenses en 2000 et 2001 et fut nominé en 2000 au prix du meilleur film lors du Festival international du film de Catalogne"),
('Frida', 2002, 'Amérique', '123min', "Frida retrace la vie mouvementée de Frida Kahlo, artiste peintre mexicaine du XXe siècle qui se distingua par son oeuvre surréaliste, son engagement politique en faveur du communisme et sa bisexualité. 
Le film se concentre également sur les relations tumultueuses de Frida avec son mari, le peintre Diego Rivera, et sur sa liaison secrète et controversée avec Léon Trotski.", "Le film a reçu un accueil critique globalement favorable et a été récompensé par plus d'une quinzaine de prix. 
Sa réalisatrice, Julie Taymor, véritable couteau suisse du cinéma, est réalisatrice, scénariste, costumière, scénographe, productrice, metteure en scène de cinéma et spectacle lyrique. Son talent paticulier pour les costumes lui valut le Molière 2008 des meilleurs costumes pour la comédie musicale du Roi Lion." ),
('Point Break', 1991, 'Amérique', '122min', "Pour retrouver les braqueurs responsables de 26 attaques de banques, Johnny Utah, jeune inspecteur du FBI inexpérimenté et naïf, s'infiltre dans le milieu des surfeurs de Los Angeles.", "Véritable icône de la culture populaire, repris dans de nombreux films tels que la cité de la peur, Hot Fuzz ou encore Brice de Nice, Point Break a valut une nomination pour Patrick Swayze et une récompense pour Keanu Reeves pour la même catégorie de l'homme le plus désirable. 
Quant à la réalisation, Ridley Scott s'était positionné sur l'adapation du scénario de W. Peter Iliff, mais c'est finalement Kathryn Bigelow qui sublimera cette oeuvre. Le film devait initialement être éponyme de son héro Johnny Utah, puis s'appeler Riders on the storm selon la chanson des Doors, mais s'appelera finalement Point Break pour coller à l'univers du surf propre au film, le terme désignant des spots à fonds rocheux créant des vagues très longues." ),
('Wonder Woman', 2017, 'Amérique', '141min', "C'était avant qu'elle ne devienne Wonder Woman, à l'époque où elle était encore Diana, princesse des Amazones et combattante invincible. Un jour, un pilote américain s'écrase sur l'île paradisiaque où elle vit, à l'abri des fracas du monde. 
Lorsqu'il lui raconte qu'une guerre terrible fait rage à l'autre bout de la planète, Diana quitte son havre de paix, convaincue qu'elle doit enrayer la menace. En s'alliant aux hommes dans un combat destiné à mettre fin à la guerre, Diana découvrira toute l'étendue de ses pouvoirs… et son véritable destin.", 
"Le projet Wonder Woman a commencé à faire son chemin à Hollywood en 1996 avec Ivan Reitman. 
En 2001, c'est Todd Alcott qui est engagé pour écrire le scénario, puis Laeta Kalogridis en 2003. Plus tard, en mars 2005, le projet passe entre les mains de Joss Whedon, pressenti pour le réaliser. Il abandonne en 2007 pour des différends créatifs. 
En 2014, Michelle MacLaren est confirmée pour mettre en scène le long-métrage mais laisse également tomber le projet pour différends créatifs avant que Patty Jenkins ne soit finalement choisie.

A noter que Kathryn Bigelow, Catherine Hardwicke, Mimi Leder, Karyn Kusama, Julie Taymor, Angelina Jolie et Tricia Brock ont été plus ou moins considérées pour réaliser Wonder Woman. 
Patty Jenkins est la première femme à mettre en scène un film de super-héros après Lexi Alexander qui était aux commandes de The Punisher: Zone de guerre (2008)"),
('Cap sur le Congrès', 2019, 'Amérique', '126min', "Le portrait de quatre candidates démocrates insurgées (Alexandria Ocasio-Cortez, Amy Vilela, Cori Bush et Paula Jean Swearengin) durant les élections du Congrès américain de 2018.", 
"À 28 ans, elle est devenue le 6 novembre 2018 la plus jeune représentante jamais élue au Congrès américain. Née dans le Bronx, Alexandria Ocasio-Cortez est aujourd’hui l’une des principales voix contre la politique de Donald Trump, incarnant la nouvelle vague des démocrates outre-Atlantique. Mais comment cette ancienne serveuse a-t-elle été élue ? 
Ce documentaire l’a suivie dans sa course au Congrès. Ce dernier dresse aussi le portrait de trois autres candidates : Amy Vilela, dont la fille de 22 ans est décédée après avoir été refusée des urgences car elle n’était pas assurée, Cori Bush, Afro-américaine inspirée par les manifestations de Ferguson contre les violences policières et Paula Jean Swearengin, fille d’une famille de mineurs originaire de Virginie.
Rachel Lears, la réalisatrice, a obtenu un master d'ethnomusicologie et un advanced certificate en Culture & Media a Yale, et un doctorat en culture anthropologique à la New York University. Sa thèse intitulée 'Between Two Monsters: Popular Music, Visual Media, and the Rise of Global Indie in 21st Century Uruguay', porte sur la première génération de jeunes artistes uruguayens à s'approprier le média digital.
C'est donc une réalisatrice particulièrement engagée dans la cause sociale, comme le montre son dernier film."),
('Rebelle', 2012, 'Amérique', '93min', "Depuis la nuit des temps, au cœur des terres sauvages et mystérieuses des Highlands d’Ecosse, récits de batailles épiques et légendes mythiques se transmettent de génération en génération. Merida, l’impétueuse fille du roi Fergus et de la reine Elinor, a un problème… Elle est la seule fille au monde à ne pas vouloir devenir princesse ! 
Maniant l’arc comme personne, Merida refuse de se plier aux règles de la cour et défie une tradition millénaire sacrée aux yeux de tous et particulièrement de sa mère. Dans sa quête de liberté, Merida va involontairement voir se réaliser un vœu bien malheureux et précipiter le royaume dans le chaos. Sa détermination va lui être cruciale pour déjouer cette terrible malédiction.", 
"De son titre original Brave, Rebelle s'est révélé être une icône du film d'animation engagé promouvant le libre-arbitre de la Femme. Il reçut les prix du meilleur film d'animation au Village Voice Film Poll 2012, aux Oscar 2013, au BAFTA Award 2013, au Golden Globe 2013, et au lowa Film Critics Association Award 2013. Il reçut également le prix du Meilleur film d'animation Féminin au Women Film Critics Circle Awards 2012, ainsi que plusieurs autres prix pour le meilleur personnage féminin animé, le meilleur montage de film d'animation et meilleur production design.
L'histoire du film est venue à Brenda Chapman (première Américaine réalisatrice d'un film d'animation, avec Le Prince d'Egypte, en 1998) plus de huit ans avant la sortie de Rebelle. Inspirée par sa relation avec sa fille, à l'époque âgée seulement de 4 ans, elle a ensuite mêlé cela à sa passion pour l’Écosse et aux légendes de ce pays."),
('Coco avant Chanel', 2009, 'Europe', "105min", "Le film s'intéresse aux années de formation de la grande couturière Coco Chanel : comment une jeune fille nommée Gabrielle, d'origine très modeste, autodidacte, et dotée d'une personnalité hors du commun, va devenir Coco Chanel, le symbole de réussite et de liberté et qui incarnera la femme moderne.", "Le film est adapté du livre L'Irrégulière d'Edmonde Charles-roux, une biographie de Coco Chanel, et a obtenu le César 2010 des meilleurs costumes (Catherine Leterrier)."),
('The Rider', 2018, 'Amerique', "104min", "Le jeune cowboy Brady, étoile montante du rodéo, apprend qu'après son tragique accident de cheval, les compétitions lui sont désormais interdites. De retour chez lui, Brady doit trouver une nouvelle raison de vivre, à présent qu'il ne peut plus s'adonner à l'équitation et la compétition qui donnaient tout son sens à sa vie. 
Dans ses efforts pour reprendre en main son destin, Brady se lance à la recherche d'une nouvelle identité et tente de définir ce qu'implique être un homme au coeur de l'Amérique.  ", "Chloé Zhao a travaillé en équipe réduite, tournant chez les gens des situations et des événements réels. Elle se rappelle : «C’est la seconde fois que je collabore avec le directeur de la photographie Joshua James Richards. Nous nous sommes efforcés de capturer certains moments de manière organique autant que cinématographique, dans l’idée d’insuffler au récit un sentiment de réalité. 
À travers le voyage de Brady, tant à l’écran que dans la vie, j’aspire à explorer notre culture de la masculinité et à offrir une version plus nuancée du cowboy américain classique. 
Je souhaite également proposer un portrait fidèle du coeur de l’Amérique, rocailleux, véritable et de toute beauté, que j’aime et je respecte profondément.»"),
('Une mère', 2015, 'Europe', "100min", "Marie vit seule avec son fils de 16 ans. Elle se bat pour rester debout, pour le sortir des mauvais coups dans lesquels il s’enfonce. 
Trop usée et contrariée pour vivre sa vie de femme, Marie est coincée entre son ex toujours amoureux et son adolescent irrécupérable. Entre eux, les mots passent de plus en plus mal, l’amour s’exprime de moins en moins bien. 
La violence et le rejet envahissent tout. Il est mauvais fils, elle sera mauvaise mère. De là à penser qu’il n’y a pas d’amour… ", 
"Une mère a été tourné dans le nord et en Haute Normandie. La réalisatrice explique son choix : « J’ai volontairement cherché à éviter les clichés habituels qu’on balance à tort sur ces régions. Je me suis arrêtée sur des bords de mer uniquement… Là où je me dis qu’on a encore beaucoup de boulot, c’est que, même aujourd’hui, montrer une histoire de gens simples a forcément quelque chose de singulier. »"),
('Lady Bird', 2017, 'Amerique', "97min", "Christine « Lady Bird » McPherson se bat désespérément pour ne pas ressembler à sa mère, aimante mais butée et au fort caractère, qui travaille sans relâche en tant qu’infirmière pour garder sa famille à flot après que le père de Lady Bird a perdu son emploi.", "Lady Bird fait partie des meilleurs films de l'année 2017 pour le National Board of Review1, l'American Film Institute2 et le Time3. Il détient un score exceptionnel de 99% d'avis positifs pour 343 critiques sur le site Rotten Tomatoes. "),
('Night Moves', 2013, 'Amerique', "112min", "Josh travaille dans une ferme biologique en Oregon. Au contact des activistes qu'il fréquente, ses convictions écologiques se radicalisent. 
Déterminé à agir, il s'associe à Dena, une jeune militante, et à Harmon, un homme au passé trouble. Ensemble, ils décident d'exécuter l'opération la plus spectaculaire de leur vie...", 
"Night Moves a remporté le Grand Prix lors de la 39ème édition du Festival du Cinéma Américain de Deauville."),
('Virgin suicides', 1999, 'Amerique', "97min", "Dans une ville américaine tranquille et puritaine des années soixante-dix, Cecilia Lisbon, treize ans, tente de se suicider. Elle a quatre soeurs, de jolies adolescentes. Cet incident éclaire d'un jour nouveau le mode de vie de toute la famille. 
L'histoire, relatée par l'intermédiare de la vision des garçons du voisinage, obsédés par ces soeurs mystérieuses, dépeint avec cynisme la vie adolescente. Petit a petit, la famille se referme et les filles reçoivent rapidement l'interdiction de sortir. Alors que la situation s'enlise, les garçons envisagent de secourir les filles.", "Actrice, elle a joué sous la direction de son père dans The outsiders (1983), Rusty James (id.), Cotton Club (1984), Peggy Sue s'est mariée (1986) et Le Parain III (1990), où elle tenait l'un des rôles principaux. Elle a également participé au Parrain (1972), où elle était le nourrisson baptisé dans une célèbre scène du film, et au Parrain II (1974), où elle ne faisait qu'une très brève apparition."),
('Lost in translation', 2003, 'Amerique', "102min", "Bob Harris, acteur sur le déclin, se rend à Tokyo pour tourner un spot publicitaire. Il a conscience qu'il se trompe - il devrait être chez lui avec sa famille, jouer au théâtre ou encore chercher un rôle dans un film -, mais il a besoin d'argent. Du haut de son hôtel de luxe, il contemple la ville, mais ne voit rien. 
Il est ailleurs, détaché de tout, incapable de s'intégrer à la réalité qui l'entoure, incapable également de dormir à cause du décalage horaire. Dans ce même établissement, Charlotte, une jeune Américaine fraîchement diplômée, accompagne son mari, photographe de mode. Ce dernier semble s'intéresser davantage à son travail qu'à sa femme. Se sentant délaissée, Charlotte cherche un peu d'attention. 
Elle va en trouver auprès de Bob...",
"Lost in Translation est en partie basé sur le vécu de Sofia Coppola. En effet, la réalisatrice a effectué plusieurs voyages au Japon durant les années 90, notamment dans le cadre de la promotion de son premier film, Virgin Suicides. Par ailleurs, l’hôtel Park Hyatt de Tokyo, où une grande partie du film a été tournée, est un des endroits préférés de la cinéaste."),
('Madame Bovary', 2015, 'Europe', "119min", "Emma Rouault, fraîchement sortie du couvent, épouse Charles Bovary, un médecin de campagne qui se réjouit d’avoir trouvé la compagne parfaite. Emma occupe ses journées à aménager sa nouvelle demeure, dessine, joue du piano et reçoit avec élégance les visiteurs. 
Cette vie monochrome auprès d’un époux sans raffinement est bien loin des fastes et de la passion auxquels elle aspire. Ses rencontres avec M. Lheureux, habile commerçant, le Marquis d’Andervilliers, et Léon, jeune clerc de notaire, vont rompre la monotonie de son existence.", "Madame Bovary a été diffusé dans de nombreux festivals à travers le monde. On peut notamment citer le Festival international du film de Toronto, le Festival du film de Telluride, celui de Sidney ainsi que le Festival du cinéma américain de Deauville 2015."),
('Risk', 2016, 'Amérique', '86min', "Risk est un documentaire réalisé par Laura Poitras, sorti en 2016, ayant pour objet Julien Assange, le fondateur de WikiLeaks",
"Lorsqu'en 2010, Laura Poitras commence à filmer Julian Assange, elle suppose que son documentaire chroniquera l'infini combat pour la liberté d'expression auquel participe l'un des esprits les plus brillants au monde. Mais en chemin, le scénario prend une toute nouvelle direction. Assange est rappelé en Suède pour répondre à des accusations d'agressions sexuelles sur deux femmes, le contraignant à un asile d'une durée indéterminée auprès de l'ambassade d'Equateur à Londres. 
Sans jamais questionner l'importance du travail mené par Assange avec Wikileaks, le film de Poitras saisit son attitude problématique à l'égard des femmes, un paradoxe qu'un autre réalisateur aurait pu choisir d'éluder. Alors qu'il parle à son avocat, Assange décrit les accusations d'agressions sexuelles comme « complètement sordides, fruits d'un positionnement féministe radical », avant de dire de l'une des femmes concernées « elle a ouvert le club lesbien de Gothenberg. » Quand son avocat lui demande en quoi cela concerne l'affaire, il répond « Elle est dans ce cercle. Ce cercle de… » avant de baisser la voix.
À un autre moment, il s'interroge : ne pourrait-il pas simplement s'excuser pour « quelque chose que j'ai fait ou que je n'ai pas fait pour les blesser», une expression facétieuse qu'il livre avec un cruel sourire suffisant. 
Sans jamais forcer le trait, le film de Laura Poitras met en lumière l'ironie d'un homme dont le combat fondé sur la recherche de responsabilité ne l'empêche pas de tout mettre en œuvre pour éviter de prendre les siennes. "),
('Silent Voice', 2018, 'Asie', '129min', "Nishimiya est une élève douce et attentionnée. Chaque jour, pourtant, elle est harcelée par Ishida, car elle est sourde. Dénoncé pour son comportement, le garçon est à son tour mis à l'écart et rejeté par ses camarades. Des années plus tard, il apprend la langue des signes... et part à la recherche de la jeune fille.",
"Naoko Yamada avait l’intention de travailler dans le cinéma après l’université, mais elle décide de rejoindre le studio Kyoto Animation après avoir vu une de leurs publicités3. Son premier travail est sur la série Inuyasha, où elle dessine les images de tweening, avant d'être promue animateur clé sur Air.
En 2016, son projet suivant est Silent Voice, adaptation du manga du même nom traitant de l'ijime, le harcèlement scolaire au Japon. Pour sa première semaine d'exploitation au cinéma au Japon, le film se classe deuxième au box office japonais derrière Your Name. (le plus gros succès cinéma de l'année au Japon) et engendre 2,3 milIiards de yens de recettes. 
Le film est nommé pour de nombreuses récompenses comme celle du meilleur film d'animation au Mainichi Film Awards et du film d'animation de l'année au Japan Academy Prize. 
Très prolifique, depuis son entrée au studio Kyoto Animation, elle est créditée sur la quasi-totalité des séries et des films produits par le studio dans un ou plusieurs des différents domaines qu'elle maîtrise, que ce soit au storyboard, à l'animation ou à la réalisation d'épisodes.

Pour cette dernière, le rôle le plus important d'être un réalisateur est d'observer les gens. Elle se décrit elle-même comme une réalisatrice de « méthode », mettant l'accent sur l'esprit des personnages."),
('La leçon de Piano', 1993, 'Océanie', '129min',"Ada, mère d’une fillette de neuf ans, s’apprête à partager la vie d’un inconnu, au fin fond du bush néo-zélandais. Son nouveau mari accepte de transporter toutes ses possessions, à l’exception de la plus précieuse : un piano, qui échoue chez un voisin illettré. Ne pouvant se résigner à cette perte, Ada accepte le marché que lui propose ce dernier : regagner le piano, touche par touche en se soumettant à ses fantaisies...", "En 1993, Jane Campion remporte la Palme d'or du festival de Cannes pour ce film. Elle est la seule femme cinéaste de l'histoire du festival à avoir reçu cette récompense. En mai 2014, elle marque de nouveau le monde médiatique et cinématographique en devenant la première réalisatrice à présider le jury des longs métrages lors de la 67e édition du festival de Cannes.
Outre la palme cannoise, La Leçon de piano décroche le César du meilleur film étranger puis l'Oscar du meilleur scénario original et Jane Campion devient la seconde réalisatrice, après Lina Wertmüller, à être nommée à l'Oscar du meilleur réalisateur."),
('La cité de Dieu', 2002, 'Amérique', '130min', "Dans une favela de Rio de Janeiro, dans les années 60, Fusée, un gamin noir et pauvre, rêve de devenir photographe professionnel. Petit Dé, un enfant de 11 ans, emménage dans la Cité. Il souhaite pour sa part devenir le plus grand criminel de Rio", "Le film est classé en vingtième position dans le classement des meilleurs films de tous les temps sur le site de référence IMDB avec une note de 8,7/10.
Leur collaboration débute avec le court métrage Golden Gate et se poursuit avec La Cité de Dieu, film qui dénonce la violence inouïe des quartiers pauvres de Rio. Succès mondial, le métrage sert de tremplin à la série télévisée La Cité des hommes, prolongement de Golden Gate, dont elle assure la production et la réalisation de quelques épisodes.
Ce film obtint une vingtaine de récompenses sur 7 grands festivals."),
('Parvana, une enfance en Afghanistan', 2017, 'Europe', '94min', "En Afghanistan, sous le régime taliban, Parvana, onze ans, grandit à Kaboul ravagée par la guerre. Elle aime écouter les histoires que lui raconte son père, lecteur et écrivain public. Mais un jour, il est arrêté et la vie de Parvana bascule à jamais. Car sans être accompagnée d’un homme, on ne peut plus travailler, ramener de l'argent ni même acheter de la nourriture.
Parvana décide alors de se couper les cheveux et de se travestir en garçon afin de venir en aide à sa famille. Risquant à tout moment d'être démasquée, elle reste déterminée à trouver un moyen de sauver son père. Parvana est un conte merveilleux sur l'émancipation des femmes et l'imagination face à l'oppression.", 
"Cofondatrice et directrice de la création de Cartoon Saloon, Nora Twomey supervise le développement de l’ensemble des projets de la société, comme Puffin Rock, série jeunesse diffusée par Netflix, avec Chris O’Dowd pour narrateur. Elle a réalisé les courts métrages From Darkness et Cuilin Dualach (Backwards Boy), plusieurs fois primés, et coréalisé le long métrage d’animation Brendan et le secret de Kells, nommé aux Oscars. 
Elle a ensuite supervisé l’écriture du deuxième long métrage de la société, Le Chant de la mer, également nommé pour l’Oscar du meilleur film d’animation. Adaptation du best-seller jeunesse de Deborah Ellis, Parvana est son premier long métrage réalisé en solo. Anita Doron en a signé le scénario et Angelina Jolie figure parmi les producteurs délégués du film. La première du film s’est tenue au Festival international du film de Toronto en septembre 2017, avant sa sortie aux États-Unis et au Canada à l’automne suivant.
Le film obtint le Prix du jury et Prix du public au Festival international du film d'animation d'Annecy 2018 et une sélection en section Special Presentations du Festival international du film de Toronto 2017. Il fut également nommé à l'Oscar du meilleur film d'animation"),
('Sambizanga', 1972, 'Afrique', '102min', "Le film se passe en Angola en 1961. Domingos Xavier, un militant révolutionnaire angolais, est arrêté par la police secrète portugaise. Xavier est emmené en prison à Sambizanga où il subit des interrogatoires puis des tortures destinés à lui soutirer les noms de ses contacts indépendantistes. 
Le film se place du point de vue de Maria, la femme de Xavier, qui part à la recherche de son mari de prison en prison sans comprendre exactement ce qui est en train de se passer, tandis que Xavier est torturé et battu à mort.", "Le film s'inspire de près de l'histoire réelle de plusieurs personnes impliquées dans la production. Le mari de Sarah Maldoror est en effet Mário Pinto de Andrade, l'un des principaux chefs du Mouvement populaire de libération de l'Angola (MPLA), qui en devient le premier président entre 1960 et 1962. Mário de Andrade participe à l'écriture du scénario.
Sarah Maldoror a réalisé plus de quarante films qui sont des courts et longs-métrages, des films de fiction et des documentaires. Son regard s'est notamment porté sur les poètes Aimé Césaire (cinq films), René Depestre ou Louis Aragon, ainsi que les artistes peintres Ana Mercedes Hoyos, Joan Miró ou Vlady.
Elle fut médaillée le 3 mars 2011 Chevalier de l'ordre national du Mérite par Frédéric Mitterrand ministre de la Culture. "),
('Sans Toit ni Loi', 1985, 'Europe', '105min', "Une jeune fille errante est trouvée morte de froid : c'est un fait d'hiver. Etait-ce une mort naturelle ? C'est une question de gendarme ou de sociologue. Que pouvait-on savoir d'elle et comment ont réagi ceux qui ont croisé sa route ? C'est le sujet du film. La caméra s'attache à Mona, racontant les deux derniers mois de son errance. Elle traîne. Installe sa tente près d'un garage ou d'un cimetière. Elle marche, surtout jusqu'au bout de ses forces.", 
"Le film, dédié à Nathalie Sarraute, consiste en une sorte d'adaptation, au cinéma, d'un genre littéraire, le « nouveau roman ». Pour respecter les doctrines prônées par le mouvement de Nathalie Sarraute, Alain Robbe-Grillet et consorts, la réalisatrice Agnès Varda a choisi un ton neutre.
La voix off de la personne qui mène les interviews est celle d'Agnès Varda.

L'ensemble de l'œuvre cinématographique d'Agnès Varda est récompensé par un César d'honneur en 2001, par le prix René-Clair de l'Académie française en 2002, par une Palme d'honneur au Festival de Cannes 2015, par un Oscar d'honneur reçu en 20171 et par la Caméra de la Berlinale en 2019.
Pour ce film, elle obtint le lauréat du Lion d'or et le prix FIPRESCI au Mostra de Venise, le lauréat du meilleur film en langue étrangère au LAFCA Awards et le prix du Meilleur film au Prix Méliès. Elle fut également nominée aux Césars pour le Meilleur film et Meilleur réalisateur. "),
('Lettre Paysanne', 1975, 'Afrique', '98min', "Dans un petit village d'agriculteurs-éleveurs au Sénégal habitent Ngor et Coumba. Il y a maintenant deux ans que Ngor désire épouser Coumba. Et cette année encore, la récolte est mauvaise... Les pluies sont insuffisantes, irrégulières. Or l'arachide, culture coloniale, la seule commercialisable, ne se récolte qu'une fois par an.", 
" Il s'agit du premier long métrage réalisé par une femme d'Afrique subsaharienne à être distribué commercialement et à valoir à sa réalisatrice une reconnaissance internationale. Pionnière, la réalisatrice sénégalaise Safi Faye réalise en 1972 un court-métrage, La Passante, puis trois ans plus tard, ce long métrage, le premier réalisé par une Africaine: Lettre paysanne. 
« Comme j’étais la première négresse à faire des films, j’ai été connue », dit-elle aujourd’hui avec une ironie qui n’est pas dépourvue d’amertume." ),
('Les Oubliées', 1996, 'Afrique', '52min', "Après 10 ans de lutte pour l'indépendance, la guerre en Angola a encore duré vingt autres années. L'histoire énumère les motifs successifs de ces combats. L'indépendance d'abord, ensuite la guerre froide qui fut sanglante en Angola où se relayèrent les communistes cubains et les Sud-Africains racistes. Et puis, à la chute du Mur et des idéologies, une nouvelle guerre, civile celle-ci. Je n'ai rien lu sur l'histoire des Angolais et des Angolaises, sur cette population civile qui constitue la cible privilégiée de cette guerre moderne de la fin du siècle. C'est pour ça que je suis partie là-bas. Pas pour comprendre cette guerre, pour rencontrer ses victimes...", "Anne-Laure Folly a commencé à faire des films au début des années 1990. Elle n'a pas fait d'école de cinéma mais a été fortement inspirée par Sarah Maldoror (cinéaste française-guadeloupéenne) et Safi Faye (cinéaste et ethnologue sénégalaise).
Cette réalisatrice atypique se partage entre le cinéma et une carrière de juriste internationale spécialisée dans les questions concernant l’Afrique. Elle a réalisé une vingtaine de documentaires à caractère socio-politique en Afrique qui ont obtenu de nombreuses distinctions. Entre 1997 et en 2006, Anne-Laure Folly a été élue au bureau de la FEPACI, la Fédération panafricaine des cinéastes. "),
('The Curse of Quon Gwon: When the Far East Mingles with the West', 1916, 'Asie', '35min',"Les membres d'une famille chinoise vivant aux Etats-Unis reçoivent une malédiction pour s'être trop occidentalisés.", "Premier film réalisé par une femme chinoise et un des premiers réalisés par une femme, il fut classé au National Film Registry en 2006 en tant que film historique important.
L'écrivaine/réalisatrice/productrice Marian E. Wong n'a pas pu le faire distribuer donc il n'est jamais sorti. A vrai dire, on pensait que ce film était perdu à jamais mais en 2004, le producteur Arthur Dong en a retrouvé deux bobines sur sept alors qu'il effectuait des recherches pour son documentaire Hollywood Chinese (2007). Le film reste donc incomplet."),
('La flûte et le Grelot', 2011, 'Asie', '42min', "Deux films d'art des studios de Shanghai : Le Grelot du faon (1982) de Tang Cheng et Wu Qiang et La Flûte du bouvier (1963) de Te Wei et Qian Jiajun. 
Le premier film, Le Grelot du faon, raconte l'histoire d'un faon blessé, perdu, et qui sera recueilli par une petite fille, avec laquelle il partagera sa vie et ses jeux jusqu'au jour où, ayant grandi, il devra la quitter pour retourner à la vie sauvage.
Le second film, La Flûte du bouvier, raconte l'histoire d'un enfant, qui, juché sur son buffle, joue de la flûte. Il s'endort, et rêve que son buffle s'est échappé. Parti à sa recherche, il traverse montagnes et vallées. Lorsqu'il retrouve son ami, sa joie est si grande qu'il se réveille. Saisissant alors sa flûte, il reprend le morceau de musique interrompu.",
"Tang Chen est considérée comme la première réalisatrice d'animation chinoise. Son oeuvre le Grelot de Sang, tout comme La Flûte du bouvier, sont peints comme des toiles, il a fallut redessiner l'ensemble de chaque dessin pour chaque frame. C'est un travail titanesque rendant un effet superbe auquel vient se greffer une musique entêtante, aux dons sons d'Asie, qui nous emmènent au coeur d'un univers féerique. 
Simples dans leurs histoires, format muet oblige, les oeuvres n'en restent pas moins poignantes, toutes deux portant sur l'amitié  attendrissante d'un enfant envers un animal. Malgré les contraintes de dessin et le manque de parole, la fluidité de l'animation et la puissance de l'atmosphère transcendent le spectateur."),
('Juanita de Tanger', 2005, 'Afrique', '101min', "Juanita, de père anglais et de mère andalouse, raconte ses peines et parle des femmes qui l’entourent. Sa sœur Helena, obsédée de liberté et qui a étudié au lycée français. Esther, son amie juive marocaine complètement engloutie dans son histoire d’amour impossible avec un jeune homme marocain musulman. Et enfin, Hamruch, la fidèle domestique ; sa famille à elle seule quand les autres ne sont pas là.
En toile de fond : l’histoire de Tanger à l’époque de la Guerre civile espagnole, avec l’entrée des troupes khalifiennes soumises aux ordres franquistes, puis l’époque de la Guerre mondiale avec l’arrivée de réfugiés de toute l’Europe.", "C'est une adaptation d'un roman d'Ángel Vázquez, publié en 1976, La vida perra de Juanita Narboni (traduction française : La Chienne de vie de Juanita Narboni), où une femme égrène les souvenirs de sa vie, et de l'époque coloniale cosmopolite de Tanger.
Farida Benlyazid introduit dans cette adaptation des souvenirs de sa propre enfance, et s'attache aussi à l’histoire de Tanger, se centrant sur la période de 1930 à 1970, avec ce contexte du statut international de la zone de Tanger, les conséquences de la guerre civile espagnole, la Seconde Guerre mondiale et l'invasion franquiste en 1940, etc. Puis elle suggère l'évolution post-coloniale de la ville.
Ce film lui valut le prix Violette d'Or du Meilleur film, le Coup de Coeur du jury des Lecteurs de la Dépêche du Midi, et le Prix du Public au Festival du Cinéma Espagnol de Toulouse et Midi Pyrénées 2006"),
('Meshes of the Afternoon', 1943, 'Amérique', '14min', "Des objets récurrents et symboliques, des actions hallucinatoires et répétitives constituent la trame de récits confus et obsédants, à la lisière du rêve et de la réalité.", "Personnalité majeure du cinéma expérimental américain des années 1940, Maya Deren réalise de nombreux courts métrages d'inspiration surréaliste et psychanalytique, inspirés par Jean Cocteau.
Ce film est le fruit du désir commun de Maya Deren et Alexander Hammid de créer un film d'avant-garde personnel qui traiterait des problèmes psychologiques dévastateurs, à l'instar des films français d'avant-garde des années 1920, comme Un chien andalou (1929) et L'Âge d'or (1930) de Salvador Dalí et Luis Buñuel.
À sa sortie, le film n'avait pas de musique. Cependant, une partition musicale influencée par la musique traditionnelle japonaise et réalisée par le troisième mari de Maya Deren, Teiji Ito, a été ajoutée au film, sous la direction de Maya Deren, en 1959.
Le Prix Maya Deren a été créé en 1986 par l'American Film Institute, et récompense des artistes du cinéma vidéo indépendant."),
('Les Petites Marguerites', 1966, 'Asie', '74min', "L'histoire de deux jeunes filles, toutes deux appelées Marie (Jitka Cerhová et Ivana Karbanová), qui, en réponse au mal dans le monde, décident de devenir malfaiteurs à leur tour.", "Généralement reconnu comme un chef-d'œuvre de la nouvelle vague cinématographique Tchécoslovaque, Les Petites Marguerites (Sedmikrásky) reçut le Grand prix de l'Union de la critique de cinéma de 1969.
Le long métrage s’inspire de la Nouvelle Vague française de la fin des années 50 par un style expérimental avec des passages du noir et blanc à la couleur et inversement ainsi que diverses accumulations visuelles et sonores. 
Les deux héroïnes des Petites Marguerites, Marie 1 et Marie 2, se veulent être la version tchèque de Brigitte et Brigitte de Luc Moullet, sorti la même année, où deux provinciales débarquent à Paris pour leurs études. La mouture de Vera Chytilova est parsemée de situations burlesques et d’élans érotiques. 
Il a été interdit de diffusion peu de temps avant le Printemps de Prague par le gouvernement tchécoslovaque en raison du gaspillage outrancier de nourriture sur plusieurs scènes. Le long métrage est finalement sorti deux ans plus tard dans le pays."),
('La Pointe courte ', 1956, 'Europe', '77min', "Un couple sur le point de se séparer, se questionne dans les lieux que la femme découvre, là où l’homme a été élevé, un petit village de pêcheurs près de Sète, La Pointe Courte. Des pêcheurs de coquillages s’organisent pour défendre leurs droits, les familles ont des tracas et des histoires de voisinage. Le couple est en crise : ils dialoguent. Ceux de La Pointe Courte se réunissent pour les Joutes. C’est une double chronique, un couple et un groupe, dans la lumière éblouissante de l'été.",
"Sans expérience cinématographique, Agnès Varda tisse, comme malgré elle, les prémices de ce que sera la Nouvelle Vague. Avec peu de moyens, en décors naturels et avec le jeu volontairement minimaliste d'un couple de comédiens dont le hiératisme issu de l’art de la tragédie détonne par rapport à la figuration locale, le premier film de Varda va à la fois déconcerter le public et inspirer toute une génération de jeunes cinéastes.
Il reçut le Prix de L'Âge d'or 1955 et le Grand Prix du film d’avant-garde de Paris 1955 et fut nominé dans la catégorie « Masters and Restorations » du Festival international du film de Melbourne 2013.
Au Festival de Cannes 2019, une affiche rendait hommage à la personnalité d'Agnès Varda qu'on voit juchée sur le dos d'un technicien lors d'une prise de vue de La Pointe courte.")
; 


INSERT INTO genres (name) VALUES ('Fiction'), ('Documentaire'), ('Animation'), ('Expérimental') ;

INSERT INTO movies_genres (movie_id, genre_id) VALUES (1, 1), (1, 4), (2, 2), (2, 3), (3, 1), (4, 1), (5, 1), (6, 1), (7, 1), (7, 2), (8, 1), (9, 1), (10, 2), (11, 3), (12, 1), (13, 1), (14, 1), (15, 1), (16, 1), (17, 1), (18, 1), (19, 1), (20, 2), (21, 3), (22, 1), (23, 1), (24, 3), (25, 2), (26, 1), (27, 2), (27, 1), (28, 2), (29, 4), (29, 1), (30, 3), (31, 1), (32, 4), (33, 4), (34, 1) ;

INSERT INTO movies_directors (movie_id, director_id) VALUES (1, 1), (2, 2), (2, 6), (3, 3), (4, 4), (5, 5), (6, 7), (7, 8), (8, 3), (9, 9), (10, 10), (11, 11), (11, 12), (12, 13), (13, 14), (14, 15), (15, 16), (16, 17), (17, 18), (18, 18), (19, 19), (20, 20), (21, 21), (22, 22), (23, 23), (23, 24), (24, 25), (25, 26), (26, 27), (27, 28), (28, 29), (29, 30), (30, 31), (30, 32), (30, 33), (30, 34), (31, 35), (32, 36), (32, 37), (33, 38), (34, 27) ;