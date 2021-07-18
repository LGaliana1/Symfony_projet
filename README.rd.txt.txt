J'ai choisi de choisir comme sujet des auteurs qui écrivent des livres pour cela j'ai 3 BDD :

	-Auteur
	-Livre
	-Pays (pour ajouter une liason 1 n à auteur)
Une table de jointure livre_auteur pour associer un auteur a son livre


Il faut modifier le .env car je suis sur mariaDB



Pour commencer utilisez les routes pour ajoute des items en BDD:

	/add_pays
	/add_auteurs
	/add_livres

Plusieurs routes explicite sont définis dans le dossier config/routes.yaml

Pour le css j'ai utilisé tailwindcss