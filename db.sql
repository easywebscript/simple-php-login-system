/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.26-log 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `users` (
	`id` int (11),
	`username` varchar (96),
	`password` varchar (384),
	`login_at` datetime ,
	`created_at` datetime ,
	`updated_at` datetime 
); 
insert into `users` (`id`, `username`, `password`, `login_at`, `created_at`, `updated_at`) values('1','admin','admin','2021-05-01 01:49:15','2021-04-28 00:55:07','2021-05-01 01:49:15');
insert into `users` (`id`, `username`, `password`, `login_at`, `created_at`, `updated_at`) values('2','easywebscript','123456','2021-04-28 07:49:18','2021-04-28 00:55:07','2021-05-01 01:49:46');

ALTER TABLE `users`   
  CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, 
  ADD PRIMARY KEY (`id`);
