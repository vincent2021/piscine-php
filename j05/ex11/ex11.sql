SELECT UPPER(nom) AS 'NOM', prenom, prix FROM membre
INNER JOIN abonnement on membre.id_abo = abonnement.id_abo
WHERE prix > 42
ORDER BY nom ASC, prenom ASC;
