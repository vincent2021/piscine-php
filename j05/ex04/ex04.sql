UPDATE ft_table SET date_de_creation = ADDDATE(date_de_creation, INTERVAL 1 YEAR) WHERE id > 5;
