
CREATE TABLE categories(
	c_id int auto_increment primary key not null,
	c_name varchar(256) not null,
	created_at datetime default current_timestamp not null
)


CREATE TABLE posts(
	p_id int auto_increment primary key not null,
	cid  int not null,
	title varchar(256) not null,
	body text not null,
	author varchar(256) not null,
        created_at datetime default current_timestamp not null

);


