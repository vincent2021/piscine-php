SELECT MD5(REPLACE(CONCAT(distrib.phone_number, '42'), '7', '9')) AS 'ft5' FROM distrib
WHERE distrib.id_distrib = 84;