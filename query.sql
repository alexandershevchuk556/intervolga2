CREATE TABLE sportsman (
    name VARCHAR(350),
    email VARCHAR(350),
    phone VARCHAR(15),
    birthday DATE,
    age INT,
    passport VARCHAR(350),
    average_competition_place INT,
    biography TEXT,
    video_presentation VARCHAR(1000)
)

SELECT sportsman, COUNT(*)
FROM Partakers
GROUP BY sportsman
ORDER BY COUNT(*) DESC
INNER JOIN Sportsman
ON Partakers.sportsman = Sportsman.id