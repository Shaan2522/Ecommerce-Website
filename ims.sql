use mysql;

create table tbl_client(client_id int PRIMARY KEY, company_name varchar(15), company_address varchar(20), contact_no int, contact_person varchar(12),  website varchar(20), official_email_address varchar(20), username varchar(15), password varchar(15), user_id int unique not null);

insert into tbl_client values(101, 'VNEST', 'VIT Chennai', 9876542112, 'Sunil', 'www.vnest.com', 'vnest@vitc.in', 'sunil', 'sunil123', 1011);
insert into tbl_client values(102, 'Edumania', 'Kelambakkam, Chennai', 9876542222, 'Rajshri', 'www.edumania.com', 'edumania@gmail.com', 'rajshri', 'rajshri123', 1021);
insert into tbl_client values(103, 'SkyRoot', 'Bangalore', 9876521232, 'Sharma', 'www.skyroot.com', 'skyroot@gmail.com', 'sharmaji', 'sharmaji123', 1031);
insert into tbl_client values(104, 'SpectoV', 'VIT Chennai', 7976542112, 'Ajit', 'www.spectov.com', 'spectov@vitc.in', 'ajit', 'ajit123', 1041);


create table tbl_user(user_id int PRIMARY KEY, username varchar(15), password varchar(15), email_address varchar(20), contact_info varchar(20), designation int);

insert into tbl_user values(1011, 'sunil', 'sunil123', 'sunil@gmail.com', 8765432123, 1);
insert into tbl_user values(1021, 'rajshri', 'rajshri123', 'rajshri@gmail.com', 8765432178, 2);
insert into tbl_user values(1031, 'sharmaji', 'sharmaji123', 'sharmaji@gmail.com', 9965432123, 3);
insert into tbl_user values(1041, 'ajit', 'ajit123', 'ajit@gmail.com', 7965432123, 2);


CREATE TABLE invoices(invoice_id int PRIMARY KEY, client_name varchar(20), invoice_date date, payment_method varchar(5), amount int);

insert into invoices values(101, 'Anjana Kashyap', '2024-04-02', 'Cash', 1600);
insert into invoices values(102, 'Priyanshu Patel', '2024-04-07', 'Card', 2100);
insert into invoices values(103, 'Rajat Patidar', '2024-04-09', 'Card', 1900);
insert into invoices values(104, 'Vikrant Gupta', '2024-04-09', 'Cash', 4100);
insert into invoices values(105, 'Virat Kohli', '2024-04-09', 'Cash', 3600);
insert into invoices values(106, 'Ajinkya Rahane', '2024-04-10', 'Cash', 2100);
insert into invoices values(107, 'Shashank Singh', '2024-04-10', 'Card', 900);
insert into invoices values(108, 'Surekha Pate', '2024-04-10', 'Cash', 1100);
insert into invoices values(109, 'Jay Shah', '2024-04-11', 'Cash', 6900);
insert into invoices values(110, 'Raj Singhania', '2024-04-11', 'Card', 4100);
insert into invoices values(111, 'Sanjiv Sahani', '2024-04-12', 'Card', 2900);
insert into invoices values(112, 'Anika Sachdeva', '2024-04-12', 'Cash', 8100);