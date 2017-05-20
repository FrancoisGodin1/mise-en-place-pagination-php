# mise-en-place-pagination-php

Objectif : Faire évoluer le site web afin d'afficher la liste des livres en mettant en place une pagination pour les afficher sur plusieurs pages avec 10 livres par pages.



Modèle LivreModel.php : modification de la méthode get_all_livre (développer une surcharge qui ne retournera plus la totalité des livres mais un nombre défini grâce aux paramètres que l'on va recevoir)


Controleûr Livre.php : modification de la méthode index


Vue LivreIndex.php : affichage des liens pour manipuler la pagination
