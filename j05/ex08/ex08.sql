SELECT nom, prenom, date_naissance FROM fiche_personne
WHERE DATE_FORMAT(date_naissance, '%Y') = '1989'
ORDER BY nom ASC;
