SELECT titre AS 'Titre', resum AS 'Resum', annee_prod FROM film
INNER JOIN genre ON film.id_genre = genre.id_genre
WHERE nom = 'erotic'
ORDER BY annee_prod DESC;
