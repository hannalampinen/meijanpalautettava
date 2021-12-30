
/* GetAliasesByRegion proceduren-luontilause */
DELIMITER $$

CREATE PROCEDURE GetAliasesbyRegion(
    IN regionName VARCHAR(4)
)
BEGIN
SELECT title from aliases
WHERE (region = regionName)
GROUP BY title_id ORDER BY title LIMIT 10;
END$$
DELIMITER ;

/* dc_as_jamesbond viewin luontilause, joka hakee elokuvat joissa Daniel Craig on näytellyt James Bondin roolia*/

CREATE VIEW dc_as_jamesbond AS
SELECT `name_`, `role_`, `primary_title`
FROM had_role AS h, names_ as n, titles as t
WHERE h.name_id = n.name_id AND h.title_id = t.title_id 
AND name_ LIKE '%Daniel Craig%'
AND role_ LIKE '%James Bond%' OR '%007%'
LIMIT 15;

$sql = "SELECT * FROM `dc_as_jamesbond`";