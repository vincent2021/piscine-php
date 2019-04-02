SELECT COUNT(DISTINCT subscription.name) AS 'nb_susc',
AVG(subscription.price) - MOD(AVG(subscription.price), 1) AS 'av_susc',
MOD(SUM(duration_sub), 42) AS 'ft' FROM subscription;