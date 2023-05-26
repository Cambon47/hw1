

/*Creazione tabelle*/
CREATE table Users(username varchar(20) primary key, password varchar(70), email varchar(30));
CREATE table Stories(id int primary key auto_increment, title varchar(20), testo text,utente varchar(20), n_likes int default 0,
 n_comments int default 0, n_segnalazioni int default 0, data_ins date);
CREATE table Likes(id int primary key auto_increment ,giver varchar(20) references Users(username),index giv(giver),
receiver varchar(20) references Users(username),index rec(receiver), id_storia int references Stories(id) , 
unique(id_storia,giver)  );
CREATE table Comments(id int primary key auto_increment,testo text,giver varchar(20) references Users(username),index giv(giver),
receiver varchar(20) references Users(username),index rec(receiver), id_storia int references Stories(id)) ;
CREATE table Segnalazioni(id int primary key auto_increment, utente varchar(20), id_storia int references Stories(id), id_commento int references Comments(id), unique(id_storia,utente));
/*---------------*/

/*Creazione trigger*/
CREATE trigger t_likes after insert on Likes for each row 
update Stories set n_likes =n_likes+1 where id = new.id_storia; 
CREATE trigger t_comments after insert on Comments for each row 
update Stories set n_comments = n_comments+1 where id = new.id_storia;
CREATE trigger t_segnalazioni after insert on Segnalazioni for each row 
update Stories set n_segnalazioni = n_segnalazioni+1 where id = new.id_storia;
/*--------------*/

/*Riempimento tabelle*/
INSERT into Users VALUES('Co', '$2y$10$cHmS/50Lg/irlg6rZbhZtOm1W.RjfzsmvQwmRGTWlvnueuwRFLuFq', 'co@co.co');
INSERT into Users VALUES('Io', '$2y$10$2k4tgjfnI3j4yMaNkz1JDOF3XsgqL0pGauf5KvQ7CI3RrI5PXU1dS', 'io@g.it');
INSERT into Users VALUES('Boh', '$2y$10$IyyyMQu1mklipSLcILtFGuIn9B5mHPWoywQObnaOQ470fNDKZRMje', 'boh@boh.it');
INSERT into Users VALUES('Ciao', '$2y$10$rcqApEOg3Yr0qdiK32GkROWp0H9Gq62K4K4wVOEnQMuK0DefF.zNy', 'mai@g.it');
INSERT into Users VALUES('Username', '$2y$10$XO4pl4Hc.x5MORnc4aM6rO5iQj9hdyLBmEPrQ.oMKVzRRLDMjYnLO', 'bla@boh.it');
INSERT into Users VALUES('Johnny', '$2y$10$9EQEZzdPW1k1fhSx.e2FDeimoS/mMoGhsfDpN81H8rtuN4Hvl/d1S', 'johnny@gmail.com');
INSERT into Users VALUES('ItzLydia', '$2y$10$xvL7GWuDZm7yISlPwTXPpOkjP1Vhss0IlxtWh3BvQAAY32Etm7TSi', 'lydia@gmail.com');
INSERT into Users VALUES('Idiot', '$2y$10$iaGMDEyOUDIFx.2JxQlRX.4iOL0Sj86s/Qsqvo.oqIRQr9zM3OYmW', 'idiot@outlook.com');

INSERT into Stories(title,testo,utente, data_ins) VALUES("Johnny", "Settimana scorsa è morto il mio porcellino d'India, si chiamava Johnny", "Johnny","2020-06-15");
INSERT into Stories(title,testo,utente, data_ins) VALUES( "Boh", "ciao ciao, mi chiamo miao", "Io", "2023-05-25");
INSERT into Stories(title,testo,utente, data_ins) VALUES("Minaccia", "Vi uccido tutti", "Idiot", "2022-04-08");
INSERT into Stories(title,testo,utente, data_ins) VALUES("Giorno", "Giorno a tutti, amici di TMAY", "Johnny","2020-06-30");
INSERT into Stories(title,testo,utente, data_ins) VALUES("Wow", "Ue, raga, come butta?", "Username","2021-09-25");
INSERT into Stories(title,testo,utente, data_ins) VALUES("Inserisci titolo", "Sapete qual è il colmo per un idraulico? Non capirci un tubo", "Ciao","2020-08-10");
INSERT into Stories(title,testo,utente, data_ins) VALUES("Pulcino Pio", "In edicola c'è un pulcino", "Co", "2023-04-17");
INSERT into Stories(title,testo,utente, data_ins) VALUES("Momento triste", "Sto attraversando un periodo difficile, vorrei poter parlare con qualcuno", "ItzLydia", "2022-07-15");

INSERT into Likes(giver, receiver, id_storia) VALUES("Boh","Johnny",1 );
INSERT into Likes(giver, receiver, id_storia) VALUES("Io","Johnny",1);
INSERT into Likes(giver, receiver, id_storia) VALUES("Ciao","Johnny",1);
INSERT into Likes(giver, receiver, id_storia) VALUES("Boh","Ciao",6);
INSERT into Likes(giver, receiver, id_storia) VALUES("Johnny","ItzLydia",8);
INSERT into Likes(giver, receiver, id_storia) VALUES("ItzLydia","Ciao",6);
INSERT into Likes(giver, receiver, id_storia) VALUES("Co","ItzLydia",8);

INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Bella", "Boh", "Ciao",6);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Bella", "Io", "Ciao",6);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Bella", "Username", "Ciao",6);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Rip", "Idiot", "Johnny",  1);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Poverinooo", "Io", "Johnny",  1);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Emozionante", "Co","Io",2);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Mi dispiace, se vuoi possiamo parlare", "Io","ItzLydia",8);
INSERT into Comments(testo,giver, receiver, id_storia) VALUES("Idiota! Ti ho segnalato, segnalatelo tutti", "Co", "Idiot",3);

INSERT into Segnalazioni(utente, id_storia) VALUES("Co",3);
INSERT into Segnalazioni(utente, id_storia) VALUES("Io",3);
INSERT into Segnalazioni(utente, id_storia) VALUES("Ciao",3);
INSERT into Segnalazioni(utente, id_storia) VALUES("Username",3);
/*--------------*/

