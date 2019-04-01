UPDATE ft_table SET creation_date = ADDDATE(creation_date, INTERVAL 1 YEAR) WHERE id > 5;
