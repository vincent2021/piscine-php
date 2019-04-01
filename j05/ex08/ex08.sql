SELECT last_name, first_name, DATE_FORMAT(birthdate, '%Y-%m-%d') as 'birthdate' FROM user_card
WHERE DATE_FORMAT(birthdate, '%Y') = '1989'
ORDER BY last_name ASC;
