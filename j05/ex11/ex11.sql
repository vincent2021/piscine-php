SELECT UPPER(p.nom) AS 'NOM', p.prenom, abonnement.prix FROM fiche_personne AS p
INNER JOIN membre ON p.id_perso = membre.id_fiche_perso
INNER JOIN abonnement ON membre.id_abo = abonnement.id_abo AND abonnement.prix > 42
ORDER BY p.nom ASC, p.prenom ASC;