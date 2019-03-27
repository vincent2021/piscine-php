SELECT p.nom, p.prenom FROM fiche_personne AS p
WHERE p.nom LIKE "%-%" OR p.prenom LIKE "%-%"
ORDER BY p.nom ASC, p.prenom ASC;