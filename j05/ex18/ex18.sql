SELECT `name` FROM distrib
WHERE (id_distrib IN (42,71,88,89,90))
OR (id_distrib BETWEEN 62 AND 69)
OR (LOWER(distrib.name) LIKE '%y%y%'
LIMIT 10 OFFSET 2;