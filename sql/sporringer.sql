SELECT * FROM bilklasse WHERE bilklasse ='1'


SELECT b.Bilnavn AS Bil, k.klassenavn AS Bilklasse, b.antallseter AS Seter, b.litenbagasje AS Bag, b.storbagasje AS Koffert, b.transmisjon AS Girtype, b.aircondition as Aircondition, b.gps AS Gps, b.dorer AS Dører
FROM biler b
INNER JOIN bilklasse k
ON b.bilklasse=k.bilklasse

SELECT b.Bilnavn AS Bil, k.klassenavn AS Bilklasse, b.antallseter AS Seter, b.litenbagasje AS Bag, b.storbagasje AS Koffert, b.transmisjon AS Girtype, b.aircondition as Aircondition, b.gps AS Gps, b.dorer AS Dører, p.pris_ukedag AS 'Pris ukedag'
FROM biler b
INNER JOIN bilklasse k
INNER JOIN pris p
ON b.bilklasse=k.bilklasse AND b.bilklasse = p.bilklasse;



SELECT b.Bilnavn AS Bil, b. bilde, k.klassenavn AS Bilklasse, b.antallseter AS Seter, b.litenbagasje, b.storbagasje, b.transmisjon, b.aircondition, b.gps, b.dorer, p.pris_ukedag AS 'Pris ukedag' FROM biler b 
INNER JOIN bilklasse k 
INNER JOIN pris p 
LEFT JOIN bilbestilling o 
ON b.bilklasse=k.bilklasse AND b.bilklasse = p.bilklasse AND o.bilid = b.id WHERE b.bilklasse = '1'

SELECT b.Bilnavn AS Bil, b. bilde, k.klassenavn AS Bilklasse, b.antallseter AS Seter, b.litenbagasje, b.storbagasje, b.transmisjon, b.aircondition, b.gps, b.dorer, p.pris_ukedag AS 'Pris ukedag' FROM biler b INNER JOIN bilklasse k INNER JOIN pris p ON b.bilklasse=k.bilklasse AND b.bilklasse = p.bilklasse WHERE b.bilklasse = '1'


SELECT b.bilnavn AS Bil, b. bilde, k.klassenavn AS Bilklasse, b.antallseter AS Seter, b.litenbagasje, b.storbagasje, b.transmisjon, b.aircondition, b.gps, b.dorer, p.pris_ukedag, p.pris_helg, p.pris_hoytid FROM biler b INNER JOIN bilklasse k INNER JOIN pris p ON b.bilklasse = k.bilklasse AND b.bilklasse = p.bilklasse and b.bilklasse = '1' WHERE NOT EXISTS (Select * FROM bilbestilling WHERE b.id = bilbestilling.bilid AND bilbestilling.fra < '2016-11-05 00:00' AND bilbestilling.til > '2016-11-06 00:00')