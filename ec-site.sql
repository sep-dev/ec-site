create database ec_site;
connect ec_site;
create table tblClient(clientId int primary key not null auto_increment,
					clientName nvarchar(255) not null,
					clientKana nvarchar(255) not null,
					clientSex nvarchar(255) not null,
					clientBirthday varchar(255),
					clientPostCode varchar(8) not null,
					clientAdd nvarchar(255) not null,
					clientTel varchar(20) not null,
					clientMailAddress nvarchar(255) not null);
create table tblItem(itemId int primary key not null auto_increment,
					itemName nvarchar(255) not null,
					itemPrice int not null,
					itemData nvarchar(1000),
					itemCount int not null,
					itemCategory int (255) not null,
					itemImg varchar(255));
create table tblCategory(categoryId int primary key not null auto_increment,
					categoryName nvarchar(255) not null,
					categotyImg varchar(255) not null);
