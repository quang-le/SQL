SELECT * FROM students, school;  /*afficher toutes les données*/

SELECT prenom FROM students; /*affiche les prénoms*/

SELECT prenom,datenaissance, s.school, sch.school /*Affiche prenom, date de naissance et école*/
FROM students as s
LEFT JOIN school as sch
ON s.school=sch.idschool;

SELECT *                    /*affiche les filles*/
FROM students as s
WHERE genre='F';

SELECT prenom, sch.school  /*affiche prénom+école*/
FROM students as s
LEFT JOIN school as sch
ON s.school=sch.idschool
WHERE sch.school='Charleroi';

SELECT prenom   /*prénoms par ordre descendant, limite à 2 résultats*/
FROM students as s
ORDER BY prenom DESC
LIMIT 0,2;

INSERT INTO students (nom,prenom,datenaissance,genre,school)  /*insert new student*/
VALUES ('Dalor', 'Ginette', '1930-01-01','F','1');

UPDATE students             /*update new student*/
SET prenom='Omer'
WHERE prenom='Ginette';

DELETE FROM students  
WHERE idStudent='3';
/*delete student with id=3*/