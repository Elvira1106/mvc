use mvc;
insert `role` (`name`)
values ('menedjer');

insert `user`(login, fullname, email, password, role_id_role)
values ('ela', 'Эльвира', 'elvira.turnaeva@yandex.ru', 1),
		('mila', 'Мария', 'mari@gmail.ru', 2);
insert `product`(name_pr, price)
values ('стол', 12000),
		('диван', 23499),
	   ('стиральная машинка', 35600),
       ('холодильник', 35700);
insert `order`(date, amount, user_id_user)
values ('2023-10-05', 500, 1),
      ('2022-03-24', 1000, 2),
      ('2023-09-11', 5600, 1),
      ('2023-06-01', 1500, 2);
insert `product_order`(product_id_product, order_id_order)
values (2, 1),
	   (3, 4),
       (2, 2),
       (1, 3),
       (4, 3)