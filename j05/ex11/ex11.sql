SELECT UPPER(p.last_name) AS 'NOM', p.first_name, subscription.price FROM user_card AS p
INNER JOIN member ON p.id_user = member.id_user_card
INNER JOIN subscription ON member.id_sub = subscription.id_sub AND subscription.price > 42
ORDER BY p.last_name ASC, p.first_name ASC;