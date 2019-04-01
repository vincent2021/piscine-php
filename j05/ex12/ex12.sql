SELECT p.last_name, p.first_name FROM user_card AS p
WHERE p.last_name LIKE "%-%" OR p.first_name LIKE "%-%"
ORDER BY p.last_name ASC, p.first_name ASC;