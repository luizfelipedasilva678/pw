create database if not exists acme;
use acme;

create table categoria(
    id int auto_increment primary key,
    nome varchar(50) unique
)engine=INNODB;

create table materia_prima(
    id int auto_increment primary key,
    id_categoria int not null,
    descricao varchar(100) not null unique,
    quantidade int default 0,
    custo decimal(15,2) not null,
    constraint `fk_materia_prima_id_categoria`
    foreign key(id_categoria) references categoria(id) 
        on delete restrict 
        on update cascade
)engine=INNODB;

insert into categoria (id, nome) values (1, 'Categoria 0391');
insert into categoria (id, nome) values (2, 'Categoria A025');
insert into categoria (id, nome) values (3, 'Categoria I948');
insert into categoria (id, nome) values (4, 'Categoria D035');
insert into categoria (id, nome) values (5, 'Categoria 7523');
insert into categoria (id, nome) values (6, 'Categoria P724');
insert into categoria (id, nome) values (7, 'Categoria Z944');
insert into categoria (id, nome) values (8, 'Categoria 2162');
insert into categoria (id, nome) values (9, 'Categoria 7848');
insert into categoria (id, nome) values (10, 'Categoria A443');
insert into categoria (id, nome) values (11, 'Categoria 8871');
insert into categoria (id, nome) values (12, 'Categoria N913');
insert into categoria (id, nome) values (13, 'Categoria L168');
insert into categoria (id, nome) values (14, 'Categoria X867');
insert into categoria (id, nome) values (15, 'Categoria B846');
insert into categoria (id, nome) values (16, 'Categoria 5482');
insert into categoria (id, nome) values (17, 'Categoria J959');
insert into categoria (id, nome) values (18, 'Categoria I479');
insert into categoria (id, nome) values (19, 'Categoria 6086');
insert into categoria (id, nome) values (20, 'Categoria T877');
insert into categoria (id, nome) values (21, 'Categoria J484');
insert into categoria (id, nome) values (22, 'Categoria Z408');
insert into categoria (id, nome) values (23, 'Categoria Q419');
insert into categoria (id, nome) values (24, 'Categoria H379');
insert into categoria (id, nome) values (25, 'Categoria J847');
insert into categoria (id, nome) values (26, 'Categoria 6764');
insert into categoria (id, nome) values (27, 'Categoria T375');
insert into categoria (id, nome) values (28, 'Categoria W968');
insert into categoria (id, nome) values (29, 'Categoria 0780');
insert into categoria (id, nome) values (30, 'Categoria V275');
insert into categoria (id, nome) values (31, 'Categoria D669');
insert into categoria (id, nome) values (32, 'Categoria B929');
insert into categoria (id, nome) values (33, 'Categoria Z816');
insert into categoria (id, nome) values (34, 'Categoria 4778');
insert into categoria (id, nome) values (35, 'Categoria 3200');
insert into categoria (id, nome) values (36, 'Categoria C407');
insert into categoria (id, nome) values (37, 'Categoria 6222');
insert into categoria (id, nome) values (38, 'Categoria 6747');
insert into categoria (id, nome) values (39, 'Categoria P234');
insert into categoria (id, nome) values (40, 'Categoria Y168');
insert into categoria (id, nome) values (41, 'Categoria D998');
insert into categoria (id, nome) values (42, 'Categoria 4337');
insert into categoria (id, nome) values (43, 'Categoria Z594');
insert into categoria (id, nome) values (44, 'Categoria Z566');
insert into categoria (id, nome) values (45, 'Categoria F126');
insert into categoria (id, nome) values (46, 'Categoria 3412');
insert into categoria (id, nome) values (47, 'Categoria 6072');
insert into categoria (id, nome) values (48, 'Categoria S720');
insert into categoria (id, nome) values (49, 'Categoria X275');
insert into categoria (id, nome) values (50, 'Categoria 3890');
insert into categoria (id, nome) values (51, 'Categoria 9084');
insert into categoria (id, nome) values (52, 'Categoria L246');
insert into categoria (id, nome) values (53, 'Categoria T425');
insert into categoria (id, nome) values (54, 'Categoria D132');
insert into categoria (id, nome) values (55, 'Categoria Q272');
insert into categoria (id, nome) values (56, 'Categoria V002');
insert into categoria (id, nome) values (57, 'Categoria B317');
insert into categoria (id, nome) values (58, 'Categoria V762');
insert into categoria (id, nome) values (59, 'Categoria X384');
insert into categoria (id, nome) values (60, 'Categoria 2847');
insert into categoria (id, nome) values (61, 'Categoria 0864');
insert into categoria (id, nome) values (62, 'Categoria O320');
insert into categoria (id, nome) values (63, 'Categoria 4878');
insert into categoria (id, nome) values (64, 'Categoria 1662');
insert into categoria (id, nome) values (65, 'Categoria P766');
insert into categoria (id, nome) values (66, 'Categoria V113');
insert into categoria (id, nome) values (67, 'Categoria 3799');
insert into categoria (id, nome) values (68, 'Categoria 6840');
insert into categoria (id, nome) values (69, 'Categoria G469');
insert into categoria (id, nome) values (70, 'Categoria 2583');
insert into categoria (id, nome) values (71, 'Categoria V006');
insert into categoria (id, nome) values (72, 'Categoria I463');
insert into categoria (id, nome) values (73, 'Categoria 9532');
insert into categoria (id, nome) values (74, 'Categoria P396');
insert into categoria (id, nome) values (75, 'Categoria L394');
insert into categoria (id, nome) values (76, 'Categoria 1387');
insert into categoria (id, nome) values (77, 'Categoria D668');
insert into categoria (id, nome) values (78, 'Categoria D435');
insert into categoria (id, nome) values (79, 'Categoria 6539');
insert into categoria (id, nome) values (80, 'Categoria 0143');
insert into categoria (id, nome) values (81, 'Categoria A948');
insert into categoria (id, nome) values (82, 'Categoria W638');
insert into categoria (id, nome) values (83, 'Categoria D466');
insert into categoria (id, nome) values (84, 'Categoria P284');
insert into categoria (id, nome) values (85, 'Categoria J865');
insert into categoria (id, nome) values (86, 'Categoria M541');
insert into categoria (id, nome) values (87, 'Categoria D337');
insert into categoria (id, nome) values (88, 'Categoria C159');
insert into categoria (id, nome) values (89, 'Categoria F263');
insert into categoria (id, nome) values (90, 'Categoria U739');
insert into categoria (id, nome) values (91, 'Categoria L894');
insert into categoria (id, nome) values (92, 'Categoria 0118');
insert into categoria (id, nome) values (93, 'Categoria Q979');
insert into categoria (id, nome) values (94, 'Categoria K332');
insert into categoria (id, nome) values (95, 'Categoria D087');
insert into categoria (id, nome) values (96, 'Categoria 9473');
insert into categoria (id, nome) values (97, 'Categoria 6033');
insert into categoria (id, nome) values (98, 'Categoria J152');
insert into categoria (id, nome) values (99, 'Categoria X315');
insert into categoria (id, nome) values (100, 'Categoria F815');
insert into categoria (id, nome) values (101, 'Categoria N612');
insert into categoria (id, nome) values (102, 'Categoria M418');
insert into categoria (id, nome) values (103, 'Categoria W308');
insert into categoria (id, nome) values (104, 'Categoria W867');
insert into categoria (id, nome) values (105, 'Categoria K241');
insert into categoria (id, nome) values (106, 'Categoria Z300');
insert into categoria (id, nome) values (107, 'Categoria Q805');
insert into categoria (id, nome) values (108, 'Categoria K078');
insert into categoria (id, nome) values (109, 'Categoria T577');
insert into categoria (id, nome) values (110, 'Categoria J855');
insert into categoria (id, nome) values (111, 'Categoria N939');
insert into categoria (id, nome) values (112, 'Categoria Y195');
insert into categoria (id, nome) values (113, 'Categoria 0168');
insert into categoria (id, nome) values (114, 'Categoria P946');
insert into categoria (id, nome) values (115, 'Categoria 0325');
insert into categoria (id, nome) values (116, 'Categoria N509');
insert into categoria (id, nome) values (117, 'Categoria B053');
insert into categoria (id, nome) values (118, 'Categoria G800');
insert into categoria (id, nome) values (119, 'Categoria G896');
insert into categoria (id, nome) values (120, 'Categoria 5492');
insert into categoria (id, nome) values (121, 'Categoria K764');
insert into categoria (id, nome) values (122, 'Categoria 3925');
insert into categoria (id, nome) values (123, 'Categoria 0446');
insert into categoria (id, nome) values (124, 'Categoria 4062');
insert into categoria (id, nome) values (125, 'Categoria C097');
insert into categoria (id, nome) values (126, 'Categoria N241');
insert into categoria (id, nome) values (127, 'Categoria E386');
insert into categoria (id, nome) values (128, 'Categoria 9181');
insert into categoria (id, nome) values (129, 'Categoria Z272');
insert into categoria (id, nome) values (130, 'Categoria 8545');
insert into categoria (id, nome) values (131, 'Categoria I277');
insert into categoria (id, nome) values (132, 'Categoria T186');
insert into categoria (id, nome) values (133, 'Categoria A000');
insert into categoria (id, nome) values (134, 'Categoria J968');
insert into categoria (id, nome) values (135, 'Categoria H899');
insert into categoria (id, nome) values (136, 'Categoria P834');
insert into categoria (id, nome) values (137, 'Categoria X780');
insert into categoria (id, nome) values (138, 'Categoria J153');
insert into categoria (id, nome) values (139, 'Categoria R929');
insert into categoria (id, nome) values (140, 'Categoria N029');
insert into categoria (id, nome) values (141, 'Categoria W951');
insert into categoria (id, nome) values (142, 'Categoria F457');
insert into categoria (id, nome) values (143, 'Categoria 6220');
insert into categoria (id, nome) values (144, 'Categoria A134');
insert into categoria (id, nome) values (145, 'Categoria F174');
insert into categoria (id, nome) values (146, 'Categoria C781');
insert into categoria (id, nome) values (147, 'Categoria H916');
insert into categoria (id, nome) values (148, 'Categoria O645');
insert into categoria (id, nome) values (149, 'Categoria 9047');
insert into categoria (id, nome) values (150, 'Categoria M366');
insert into categoria (id, nome) values (151, 'Categoria D670');
insert into categoria (id, nome) values (152, 'Categoria Y507');
insert into categoria (id, nome) values (153, 'Categoria Z796');
insert into categoria (id, nome) values (154, 'Categoria R543');
insert into categoria (id, nome) values (155, 'Categoria D339');
insert into categoria (id, nome) values (156, 'Categoria T124');
insert into categoria (id, nome) values (157, 'Categoria 9948');
insert into categoria (id, nome) values (158, 'Categoria 2432');
insert into categoria (id, nome) values (159, 'Categoria P304');
insert into categoria (id, nome) values (160, 'Categoria I178');
insert into categoria (id, nome) values (161, 'Categoria 5062');
insert into categoria (id, nome) values (162, 'Categoria C642');
insert into categoria (id, nome) values (163, 'Categoria S402');
insert into categoria (id, nome) values (164, 'Categoria X967');
insert into categoria (id, nome) values (165, 'Categoria J788');
insert into categoria (id, nome) values (166, 'Categoria I291');
insert into categoria (id, nome) values (167, 'Categoria I486');
insert into categoria (id, nome) values (168, 'Categoria P470');
insert into categoria (id, nome) values (169, 'Categoria 2388');
insert into categoria (id, nome) values (170, 'Categoria 4926');
insert into categoria (id, nome) values (171, 'Categoria M750');
insert into categoria (id, nome) values (172, 'Categoria M435');
insert into categoria (id, nome) values (173, 'Categoria O628');
insert into categoria (id, nome) values (174, 'Categoria J768');
insert into categoria (id, nome) values (175, 'Categoria V045');
insert into categoria (id, nome) values (176, 'Categoria O214');
insert into categoria (id, nome) values (177, 'Categoria C080');
insert into categoria (id, nome) values (178, 'Categoria M474');
insert into categoria (id, nome) values (179, 'Categoria A206');
insert into categoria (id, nome) values (180, 'Categoria O038');
insert into categoria (id, nome) values (181, 'Categoria L456');
insert into categoria (id, nome) values (182, 'Categoria 0261');
insert into categoria (id, nome) values (183, 'Categoria J327');
insert into categoria (id, nome) values (184, 'Categoria T953');
insert into categoria (id, nome) values (185, 'Categoria 5220');
insert into categoria (id, nome) values (186, 'Categoria 8982');
insert into categoria (id, nome) values (187, 'Categoria 9893');
insert into categoria (id, nome) values (188, 'Categoria X310');
insert into categoria (id, nome) values (189, 'Categoria 1680');
insert into categoria (id, nome) values (190, 'Categoria 5405');
insert into categoria (id, nome) values (191, 'Categoria H742');
insert into categoria (id, nome) values (192, 'Categoria E179');
insert into categoria (id, nome) values (193, 'Categoria R962');
insert into categoria (id, nome) values (194, 'Categoria 0622');
insert into categoria (id, nome) values (195, 'Categoria O256');
insert into categoria (id, nome) values (196, 'Categoria 6639');
insert into categoria (id, nome) values (197, 'Categoria 0825');
insert into categoria (id, nome) values (198, 'Categoria X905');
insert into categoria (id, nome) values (199, 'Categoria F600');
insert into categoria (id, nome) values (200, 'Categoria 5398');


insert into materia_prima (id_categoria, descricao, quantidade, custo) values (87, 'Descrição W779947C', 85, 188);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (176, 'Descrição G273650K', 131, 137);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (178, 'Descrição T204891S', 134, 251);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (44, 'Descrição 3481663L', 640, 263);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (73, 'Descrição Y206932H', 581, 489);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (68, 'Descrição I631953F', 399, 907);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (119, 'Descrição H509131Z', 149, 26);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (9, 'Descrição A472783X', 4, 563);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (85, 'Descrição 9615937H', 516, 399);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (130, 'Descrição 1751208R', 318, 732);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (3, 'Descrição H7410898', 813, 637);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (38, 'Descrição 4754503W', 602, 159);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (7, 'Descrição O899535Y', 982, 943);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (12, 'Descrição A492907W', 670, 648);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (76, 'Descrição 4641722V', 809, 548);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (111, 'Descrição J228928W', 539, 362);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (25, 'Descrição N058920D', 559, 150);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (25, 'Descrição Q612414E', 940, 105);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (17, 'Descrição R750626X', 460, 361);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (154, 'Descrição O1225358', 386, 661);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (15, 'Descrição U728055N', 24, 524);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (75, 'Descrição H229371H', 273, 304);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (188, 'Descrição G382979P', 475, 962);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (15, 'Descrição Y415927L', 425, 108);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (140, 'Descrição S5246684', 832, 338);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (15, 'Descrição M668223W', 955, 234);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (72, 'Descrição B8643544', 579, 432);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (35, 'Descrição Q953364V', 411, 799);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (188, 'Descrição E340898E', 158, 357);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (121, 'Descrição S419433F', 784, 657);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (92, 'Descrição K281909Q', 851, 267);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (45, 'Descrição 85941336', 646, 432);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (7, 'Descrição G6919052', 41, 190);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (174, 'Descrição T2270050', 126, 858);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (199, 'Descrição M160132Z', 711, 556);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (78, 'Descrição D726517C', 175, 974);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (45, 'Descrição S559297L', 631, 220);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (184, 'Descrição 5329770B', 650, 489);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (5, 'Descrição D873997A', 825, 109);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (42, 'Descrição J9920122', 136, 539);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (95, 'Descrição I0396187', 629, 174);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (98, 'Descrição 4400919W', 670, 555);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (195, 'Descrição R688093Q', 38, 276);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (131, 'Descrição Y1271738', 594, 557);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (52, 'Descrição 7206003V', 347, 160);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (54, 'Descrição G6792819', 214, 318);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (194, 'Descrição 6466413I', 465, 532);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (170, 'Descrição F1943139', 855, 737);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (28, 'Descrição M675918N', 579, 441);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (195, 'Descrição D032636V', 770, 305);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (105, 'Descrição N870067U', 829, 269);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (75, 'Descrição K4714669', 259, 712);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (68, 'Descrição A573277G', 273, 146);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (74, 'Descrição 0680652L', 666, 870);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (67, 'Descrição Y969905V', 235, 456);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (181, 'Descrição 5262616O', 116, 593);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (139, 'Descrição P413929H', 300, 531);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (51, 'Descrição V9558041', 438, 574);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (177, 'Descrição J021752G', 705, 536);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (136, 'Descrição T288612E', 747, 397);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (66, 'Descrição 1468515A', 772, 970);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (10, 'Descrição I672242C', 756, 167);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (163, 'Descrição F0207522', 551, 578);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (109, 'Descrição 76304199', 199, 123);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (170, 'Descrição F585619K', 681, 645);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (100, 'Descrição U246129O', 852, 93);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (167, 'Descrição 5900663W', 885, 783);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (51, 'Descrição 6324643Y', 467, 940);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (180, 'Descrição 4405425C', 178, 637);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (174, 'Descrição 8145607E', 968, 89);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (147, 'Descrição A8921563', 875, 706);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (103, 'Descrição W876696K', 416, 147);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (95, 'Descrição V8979348', 485, 929);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (177, 'Descrição P541634Q', 440, 52);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (128, 'Descrição H662442D', 731, 717);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (151, 'Descrição H5925488', 343, 134);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (64, 'Descrição S9078009', 843, 294);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (124, 'Descrição S463526F', 527, 155);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (98, 'Descrição I831641M', 656, 977);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (152, 'Descrição 9030093Z', 597, 997);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (200, 'Descrição F4110556', 523, 603);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (141, 'Descrição J434992G', 194, 513);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (195, 'Descrição K628534G', 345, 741);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (159, 'Descrição T5444663', 104, 509);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (99, 'Descrição N624240X', 596, 843);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (35, 'Descrição Q601224N', 173, 886);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (42, 'Descrição P531245O', 917, 95);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (49, 'Descrição 6004091E', 402, 575);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (92, 'Descrição 34327471', 758, 733);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (27, 'Descrição M538646D', 816, 10);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (186, 'Descrição Q060361W', 417, 699);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (170, 'Descrição B4001468', 120, 458);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (194, 'Descrição W558001W', 670, 193);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (69, 'Descrição 6766271S', 137, 551);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (133, 'Descrição J8196938', 202, 754);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (163, 'Descrição L671121X', 847, 194);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (104, 'Descrição V864904S', 92, 921);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (93, 'Descrição 8997377S', 977, 368);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (136, 'Descrição A430507E', 605, 390);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (170, 'Descrição G051824P', 652, 625);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (196, 'Descrição B475511H', 28, 661);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (18, 'Descrição H331437N', 895, 281);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (93, 'Descrição 0687872I', 767, 682);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (184, 'Descrição M4554740', 221, 699);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (10, 'Descrição W3116066', 284, 245);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (148, 'Descrição R786461I', 571, 850);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (87, 'Descrição D250541N', 930, 6);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (187, 'Descrição N211271Y', 767, 48);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (98, 'Descrição T598902C', 404, 380);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (199, 'Descrição X359559A', 11, 383);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (176, 'Descrição D724957E', 931, 833);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (17, 'Descrição 03614695', 169, 200);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (33, 'Descrição G062253J', 563, 686);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (84, 'Descrição Y237439W', 148, 115);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (196, 'Descrição I916043N', 941, 906);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (126, 'Descrição F859031P', 938, 779);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (46, 'Descrição F751050D', 662, 661);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (121, 'Descrição 83530340', 735, 386);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (12, 'Descrição R0945203', 790, 73);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (21, 'Descrição 9666858B', 661, 717);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (92, 'Descrição V8168249', 380, 53);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (14, 'Descrição H0002657', 262, 615);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (198, 'Descrição E5636800', 771, 248);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (88, 'Descrição 48423267', 341, 695);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (17, 'Descrição V7458510', 842, 712);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (105, 'Descrição F828296D', 535, 869);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (145, 'Descrição V878424S', 841, 914);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (63, 'Descrição T1832030', 449, 700);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (190, 'Descrição J146717R', 89, 126);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (174, 'Descrição P1741181', 875, 251);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (18, 'Descrição M382618F', 443, 85);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (35, 'Descrição 7882967M', 773, 386);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (194, 'Descrição X2290033', 871, 406);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (156, 'Descrição 31241529', 857, 529);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (58, 'Descrição W597874F', 246, 916);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (146, 'Descrição I7572094', 561, 362);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (90, 'Descrição O198670O', 806, 129);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (38, 'Descrição S100498O', 39, 605);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (81, 'Descrição 33878696', 449, 466);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (67, 'Descrição D105150J', 787, 507);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (74, 'Descrição 1217864Y', 512, 670);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (167, 'Descrição Y0406078', 549, 550);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (192, 'Descrição 60423029', 963, 260);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (151, 'Descrição 8936817S', 819, 687);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (99, 'Descrição E353560X', 96, 798);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (47, 'Descrição E647453F', 332, 882);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (62, 'Descrição W099235S', 239, 84);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (154, 'Descrição Q884987A', 200, 339);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (180, 'Descrição W2674028', 336, 232);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (90, 'Descrição B569132N', 288, 4);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (69, 'Descrição 3965992Q', 57, 359);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (164, 'Descrição 27803735', 651, 903);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (154, 'Descrição 8011107J', 938, 287);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (20, 'Descrição 89897402', 742, 933);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (197, 'Descrição 36108348', 659, 523);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (185, 'Descrição 5329886B', 654, 581);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (177, 'Descrição K392765F', 423, 106);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (157, 'Descrição X327273M', 193, 574);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (2, 'Descrição 8676810K', 1000, 568);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (31, 'Descrição 1858161P', 387, 989);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (101, 'Descrição T244628F', 779, 488);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (163, 'Descrição G585378T', 322, 268);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (159, 'Descrição R971534L', 929, 143);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (94, 'Descrição V046511C', 906, 838);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (169, 'Descrição D3063257', 226, 14);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (167, 'Descrição S568952K', 451, 740);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (41, 'Descrição K4215714', 689, 156);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (128, 'Descrição G865138U', 421, 79);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (81, 'Descrição U377549D', 847, 870);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (174, 'Descrição M1406245', 2, 549);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (93, 'Descrição M654300O', 462, 833);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (140, 'Descrição 83616441', 775, 839);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (3, 'Descrição S078051T', 702, 915);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (51, 'Descrição P155585X', 167, 621);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (200, 'Descrição F9958114', 291, 420);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (37, 'Descrição H125013J', 517, 722);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (124, 'Descrição B902855G', 350, 842);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (191, 'Descrição X857698T', 511, 215);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (121, 'Descrição P6108143', 328, 615);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (193, 'Descrição 8998589M', 663, 140);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (147, 'Descrição 4479147X', 558, 263);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (68, 'Descrição 5521270Z', 172, 200);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (66, 'Descrição N1477906', 409, 424);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (32, 'Descrição T7527433', 953, 496);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (44, 'Descrição T377027C', 110, 213);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (142, 'Descrição S3208462', 339, 278);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (75, 'Descrição Y0900043', 342, 703);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (179, 'Descrição S440297O', 823, 354);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (1, 'Descrição U410508A', 1000, 920);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (163, 'Descrição O891791E', 171, 622);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (149, 'Descrição Y932827I', 488, 863);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (163, 'Descrição Q7419987', 116, 220);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (94, 'Descrição U905209R', 431, 703);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (165, 'Descrição 9563217V', 203, 86);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (64, 'Descrição 6752109D', 581, 807);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (154, 'Descrição R986797W', 147, 762);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (135, 'Descrição K779725L', 562, 936);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (27, 'Descrição I037074Q', 526, 591);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (190, 'Descrição X713320K', 4, 768);
insert into materia_prima (id_categoria, descricao, quantidade, custo) values (26, 'Descrição A425811P', 400, 725);

select mp.id as materia_prima_id, mp.descricao, mp.custo, mp.quantidade, c.id as categoria_id, c.nome
from materia_prima mp
join categoria c on(mp.id_categoria = c.id)