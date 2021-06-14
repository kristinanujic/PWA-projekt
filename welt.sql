-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 13, 2021 at 09:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welt`
--
CREATE DATABASE IF NOT EXISTS `welt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `welt`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `kor_ime` varchar(32) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `razina` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ime`, `prezime`, `kor_ime`, `pass`, `razina`) VALUES
(1, 'kristina', 'nujic', 'kris97', '$2y$10$ykd82Gv//5MtzLh/ZBrBtuqSAQfwi3i8uxNmgLjTiQJ1YcCywv4j6', 1),
(2, 'g', 'g', '123', '$2y$10$IZCBB26W5RrrVFbR/x2ea.I62Q3iXcdZRyn4KbgYUV4n/yAS2/LXi', 0),
(3, 'b', 'b', 'bok', '$2y$10$ly5d0K8Y120GixcBmdL0pe3XL2dB9JVJTUoabwn92XbOLSBW.OfFq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(150) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(22, '13.06.2021.', ' Cilj nula - kako se njemačke korporacije bore protiv kvote za žene', 'Bundestag je razriješio minimalni broj ženskih rukovoditeljica u odborima velikih kompanija s liste. Mnoge korporacije još nisu spremne. A ni nekima se ne žuri.', 'U budućnosti će velike tvrtke u Njemačkoj morati više paziti na žene prilikom popunjavanja mjesta na najvišoj upravljačkoj razini. U petak je Bundestag donio \"zakon o drugim izvršnim pozicijama\". Plan velike koalicije predviđa da ubuduće barem jedna žena mora sjediti u upravnom odboru tvrtki s popisa s jednakom suodlučnošću s više od 2000 zaposlenih i više od tri člana odbora.\r\n\r\nTo se mora uzeti u obzir prilikom popunjavanja novih postova. \"Imenovanje člana odbora koji krši ovaj uvjet sudjelovanja je ništavno\", kaže zakon.\r\n\r\nZakon također mijenja pravila za druge uvrštene ili suodređene tvrtke koje ne potpadaju pod minimalni zahtjev: u budućnosti bi trebali opravdati planiraju li svoj upravni odbor bez žena - odnosno ako imaju \" ciljna vrijednost nula \"u njihovim izvješćima navedite. Ako se to ne dogodi, postoji rizik od novčanih kazni. U skladu s tim pooštrit će se zahtjevi za izvješćivanje za tvrtke.\r\n\r\n\r\nPrema organizaciji Žene u nadzornim odborima (Fidar), koja godinama vodi kampanju za tu temu i neprestano prati razvoj popunjavanja mjesta nadzornog odbora i izvršnog odbora, 66 tvrtki s popisa s jednakim suodlučivanjem potpada pod novu zahtjevi za minimalni udio žena u odboru. Njih 24 još nije imalo ženu na najvišem menadžerskom katu.\r\n\r\nOrganizacija je također prvi put objavila popis tih tvrtki. Od kraja ožujka sljedeće tvrtke nemaju žene u upravi: Aurubis, Bauer Aktiengesellschaft, BayWa, Deutz, ElringKlinger, Freenet, Hapag-Lloyd, HeidelbergCement, Hochtief, Hugo Boss, Indus Holding, Knaus Tabbert, Koenig & Bauer, Krones, MTU Aero Engines, Rheinmetall, Rhön-Klinikum, Sartorius, Symrise, Talanx, Traton, Wacker Chemie, Wüstenrot & Württembergische.\r\n\r\nBudući da je status popisa od kraja ožujka, neki su podaci već zastarjeli. Energetskom tvrtkom Uniper i dalje se upravlja, ali Tiina Tuomela financijska je direktorica od 29. ožujka i Wacker Chemie AG, gdje je Angela Wörl članica izvršnog odbora od 12. svibnja.', 'Business-people-at-conference-table-in-office.jpg', 'wirtschaft', 0),
(23, '13.06.2021.', ' Subnautica: Ispod nule ledeno je hladna detektivska avantura', 'U filmu \"Subnautica: Ispod nule\" igrači se kao mladi istraživač sele u oceanske dubine misterioznog planeta. Važno je riješiti smrt vlastite sestre. No, iza njihovog nestanka krije se velika opasnost.', 'Neobjašnjiva sudbina sestre, dalekog planeta, puno minus stupnjeva: U \"Subnautici: Ispod nule\" krećemo se kao mladi istraživač Robin u oceanske dubine planeta 4546b. Za razliku od prethodnice \"Subnautica\" iz 2018. godine, nažalost nije tropski toplo, već ogorčeno hladno.\r\n\r\nNaslov za preživljavanje odvija se dvije godine nakon \"Subnautice\". Robin Ayou želi riješiti smrt svoje sestre. Navodno je ubijena vlastitom nepravdom - kaže njezin poslodavac Alterra. U prvom licu pogled ide do 4546b i njegovog hladnog podvodnog svijeta.\r\n\r\nOdmah na početku Robin susreće misteriozno vanzemaljsko stvorenje koje zauzima njezin mozak. Što vam još treba za potresnu detektivsku priču o preživljavanju?\r\n\r\nKao Robin, sada istražujemo podvodna staništa, a to je novo - i neka kopnena područja od 4546b. Prikupljamo resurse, gradimo alate i baze - naravno, to također uključuje borbe s neugodnim stanovnicima vodenog svijeta.\r\n\r\nNova mehanika igre dolazi u igru ??na kopnu: prikaz temperature. Hladnoća i oluje pogodili su Robina; kako se ne bi smrzla do smrti, redovito mora tražiti zaklon u morskom kamionu ili u špiljama i napuštenim istraživačkim stanicama. Zaštitna odjeća povećava otpornost na hladnoću kako igra odmiče.', 'Subnautica-Below-Zero-ist-ein-eiskaltes-Detektiv-Abenteuer.jpg', 'wirtschaft', 0),
(24, '13.06.2021.', 'Netflix ovdje uopće nije potreban', 'Dobrodošli natrag u kino: Canneski festival najavljuje svoj program za srpanj - i zvuči fantastično. Od Jodie Foster preko Seana Penna do Wesa Andersona. No, uvjeti za posjetitelje prilično su teški.', 'Bit će isto kao i uvijek. Na vrhu stepenica crvenog tepiha bit će Thierry Fremaux i Pierre Lescure, šefovi Cannesa. Vidjet ćete kako se Matt Damon i Jodie Foster probijaju kroz bljeskalice. Léa Seydoux i Spike Lee i Tilda Swinton bit će tu i Marion Cotillard, Adam Driver, Sean Penn, Timothee Chalamet, Elisabeth Moss, Frances McDormand, Owen Wilson, Bill Murray, Christoph Waltz, Benicio del Toro, Saoirse Ronan, Tim Roth Wasikowska, Sophie Marceau, Charlotte Rampling, Hanna Schygulla ...\r\n\r\nSvi će otići u sobu Lumi?re sa svojih 2300 sjedećih mjesta, nijedna fotelja neće biti zauzeta, a zatim će se svjetla ugasiti i započet će legendarni uvodni krediti, onaj sa stepenicama koje vode od mora do zvijezda do bisera glazba iz Saint-Saënsova \"Karnevala životinja\". Bit će to kao da se proteklih 14 mjeseci nikada nije dogodilo.\r\n\r\nNaravno, neće baš baš tako biti. Ali Canneski festival jedna je od tradicija da se privremeni fenomen poput ove pandemije ne odbaci s puta. Zbog bolesti je odgođena za dva mjeseca za prvu polovicu srpnja - \"jednom\", kaže Frémaux, \"sljedeće godine opet u svibnju\" - ali to nije razlog za odstupanje od onoga što je nekoć bilo priznato kao ispravno. Obaveza pušenja na crvenom tepihu naravno neće biti ukinuta, iako je prosječna temperatura u srpnju na Azurnoj obali 28 stupnjeva, osam stupnjeva viša nego u svibnju.', 'Still-Benedetta.jpg', 'kultur', 0),
(25, '13.06.2021.', ' Tajanstveni i mračni svjetovi', 'U fantastičnom programu s 19 premijera u nadolazećoj sezoni, redatelj Thalie Joachim Lux kombinira dramatične klasike sa uzbudljivim svjetskim premijerama. A službeno otvaranje održat će se ove godine na Alsteru.', '\r\nU skladu s duhom vremena, kazalište Thalia - nadamo se sada kada je pandemija većim dijelom prevladana - u nadolazećoj sezoni će se opsežno baviti tamnim i tamnim stranama ljudskog svijeta. Na programu je 19 premijera, od toga jedanaest u velikoj kući, osam na Gaußstrasse.\r\n\r\n\"Shockheaded Peter\" (\"Der Struwwelpeter\") u Alstertoru započinje kao bezvrijedna opera Tiger Lillies, Julian Crouch i Phelim McDermott (režija Peter Jordan i Leonhard Koppelmann) 21. kolovoza.\r\n\r\nSlužbeno otvorenje, međutim, održat će se 29. kolovoza na Alsteru, u iznajmljivanju brodova i restoranu Bobby Reich. Jedno izdanje serije \"Centar za srce\" Navida Kermanija bavi se \"Ljepotom\". Redateljica Jette Steckel s autorom provodi čežnju za ljepotom, publika se u malim skupinama susreće s glumcima ansambla.\r\n\r\n\r\n\"Idiot\" Fyodora M. Dostojewskog (redatelj: Johan Simons, premijera 4. rujna) i distopijski \"GRM Brainfuck\" prema romanu Sibylle Berg kao \"takozvani mjuzikl\" s originalnom glazbom Ruff Sqwad Arts Foundation ( Redatelj: Sebastian Nübling, svjetska premijera: 10. rujna).', 'shockheaded.jpg', 'kultur', 0),
(26, '13.06.2021.', 'Ovaj bend čak i cvrčeći maslac čini cool', '15 milijuna obožavatelja nadalo se novom singlu najuspješnijeg svjetskog K-Pop benda i umjesto toga čulo je samo za prženje masti. Nova izdanja klasika Disney plaše protivnike krzna - a luksuzna verzija kebaba sada je također dostupna. Stilske vijesti tjedna.', 'Louis Vuitton nedavno ih je imenovao globalnim ambasadorima kuća, a McDonalds je po njima nazvao jelovnik. Sada je BTS uspio pridobiti 15 milijuna obožavatelja koji se nadaju da će novi singl najuspješnijeg svjetskog K-Pop benda sat vremena slušati prženu masnoću.\r\n\r\nNitko nije morao pjevati u najave za \"Butter\" da bi slijedio obećavajuće klikove prve pjesme na engleskom jeziku \"Dynamite\", s kojom drži nekoliko YouTube zapisa. Stvarni singl - s vokalom - bit će objavljen 21. svibnja. bron', 'bts.jpg', 'kultur', 0),
(27, '13.06.2021.', ' Savezna vlada priprema izvoz ugljičnog dioksida', 'Norveška, Nizozemska, Belgija i Velika Britanija pripremaju ubrizgavanje velikih količina ugljičnog dioksida u morsko dno, ponekad s milijardama dolara. Njemačka želi iskoristiti ovu priliku. Put za to je oslobođen.', 'Savezna vlada želi omogućiti izvoz i skladištenje stakleničkih plinova ugljični dioksid (CO2) na morskom dnu izvan njemačkog teritorija. Pravni okvir za to već se prilagođava, izvještava WELT AM SONNTAG pozivajući se na Federalno ministarstvo okoliša i gospodarstva.\r\n\r\nS ciljem transporta CO2 u inozemstvo i njegovog skladištenja tamo, Savezna vlada planira ratificirati izmijenjeni i dopunjeni članak 6. Londonskog protokola, reklo je listu Federalno ministarstvo okoliša. To će omogućiti ?prekogranični transport CO2 za skladištenje u dubokoj podzemnoj površini ispod morskog dna?.\r\n\r\nTakozvani Londonski protokol iz 1972. godine odnosi se na međunarodni sporazum o sprečavanju zagađenja mora uzrokovanog ispuštanjem smeća i drugih tvari. Nakon ratifikacije revidiranog članka 6., međutim, \"promjene nacionalnog zakona i dalje su potrebne\" u svrhu odlaganja CO2 u inozemstvo, nastavilo je Federalno ministarstvo okoliša.\r\n\r\nprikaz\r\n\r\n\"Za prekogranični transport CO2 i potrebnu CO2 infrastrukturu u Njemačkoj ispituje se da li i kako se Zakon o skladištenju ugljičnog dioksida mora prilagoditi tome i koji propisi moraju biti uključeni u odgovarajuću uredbu.', '230406603.jpg', 'wirtschaft', 0),
(28, '13.06.2021.', ' Imao je cijeli grad na vidiku', 'Gottfried Bohm izazvao nas je svojim crkvama, džamijama, kazalištima i knjižnicama i nije popuštao u težnji za održivim urbanim razvojem. Sada je dobitnik Pritzkerove nagrade umro u 101. godini.', 'Gottfrieda Bohma lako možemo nazvati jednim od najusamljenijih njema?kih arhitekata 20. stoljeća - čini se da ga nitko nije pratio, nitko da mu je prethodio ili ga slijedio. Ipak, slijediti njegov vrlo tvrdoglavi put kroz dugi profesionalni život, to predstavlja izvanredno postignuće ustrajnosti i svjedoći o zapanjujućoj unutarnjoj sigurnosti.\r\n\r\nMožda je tim iznenađujuće za čovjeka koji je jedva propustio priliku da gotovo himnički pohvali vlastitog oca, arhitekta Dominikusa B?hma, kako bi se skromnije smjestio u njegovu sjenu.\r\n\r\nPostoje čudne, neusporedive zgrade koje je ovaj arhitekt ostavio iza sebe. Mnogi od njih imaju ne?to hibridno u sebi kad se gledaju površno. Najmoderniji materijali - beton, čelik, staklo - dovode se u nevjerojatne \"barokne\" oblike.', 'Architekt-Gottfried-Boehm-ist-tot.jpg', 'kultur', 0),
(29, '13.06.2021.', ' Ovaj brod duhova pokazuje put za globalnu plovidbu', 'Novoosnovano poduzeće iz Schleswiga razvija baterijama i autonomnim trajektima koji bicikliste i turiste prevoze preko vode. Ali stručnjaci vide velike izazove za ambiciozni pilot projekt. Jedan od njih je tipično Nijemac.', 'Dva krmila vire s krme katamarana, a na njih su navijene dvije lopatice kormila, po jedna na svakom trupu. Razvojni programer Lars Engelhard razlog dupliciranja naziva \"sigurnim u kvaru\". Ako motor ili kontrola ne uspiju, jedinica je i dalje u funkciji. Ali to nije jedina specijalnost. Dvije kamere su pričvršćene na prednji dio brodskog krova. Trebali bi bilježiti pokrete i prepreke.\r\n\r\nKoristeći ove informacije, senzori i računala trebali bi zauzvrat sigurno putovati malim putničkim trajektom pored prepreka. \"Potrebni su nam snimci fotoaparata jer nam omogućuju prepoznavanje boja\", kaže 38-godišnji Engelhard. Brodu su za orijentaciju potrebne plutače u crvenoj boji za luku i zelenoj za desni bok. Toliko tradicionalnog pomorstva i dalje će se sačuvati na brodu budućnosti.\r\n\r\nU bivšoj tvornici rakije u industrijskom parku u Schleswigu koja se desetljećima nije koristila, brodarstvo se trenutno iznova izmišlja. Sniježno bijeli model broda podignut je u bivšoj radionici tvornice alkohola, na kraju ogromne hale izgleda pomalo izgubljeno. Na ljestvici od jedan do četiri, \"nosilac je tehnologije\", kako kažu graditelji, za novu vrstu putničkog trajekta dužine između dvanaest i 30 metara. Nakon što je brod kršten ?Nula jedan?, prvo morsko putovanje započinje u srpnju, iako daljinskim upravljanjem s pratnje.', 'Mittelstandsseite-GeisterschiffGruend.jpg', 'wirtschaft', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kor_ime` (`kor_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
