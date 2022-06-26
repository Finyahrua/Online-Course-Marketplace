-- convert Laravel migrations to raw SQL scripts --

-- migration:2014_10_12_100000_create_password_resets_table --
create table `password_resets` (
  `email` varchar(191) not null, 
  `token` varchar(191) not null, 
  `created_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `password_resets` 
add 
  index `password_resets_email_index`(`email`);

-- migration:2017_07_19_082005_create_1500441605_permissions_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `permissions` (
  `id` int unsigned not null auto_increment primary key, 
  `title` varchar(191) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;

-- migration:2017_07_19_082006_create_1500441606_roles_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `roles` (
  `id` int unsigned not null auto_increment primary key, 
  `title` varchar(191) not null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;

-- migration:2017_07_19_082009_create_1500441609_users_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `users` (
  `id` int unsigned not null auto_increment primary key, 
  `name` varchar(191) not null, 
  `email` varchar(191) not null, 
  `password` varchar(191) not null, 
  `remember_token` varchar(191) null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;

-- migration:2017_07_19_082347_create_1500441827_courses_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `courses` (
  `id` int unsigned not null auto_increment primary key, 
  `title` varchar(191) not null, 
  `slug` varchar(191) null, 
  `description` text null, 
  `price` decimal(15, 2) null, 
  `course_image` varchar(191) null, 
  `start_date` date null, 
  `published` tinyint null default '0', 
  `created_at` timestamp null, 
  `updated_at` timestamp null, 
  `deleted_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `courses` 
add 
  index `courses_deleted_at_index`(`deleted_at`);

-- migration:2017_07_19_082723_create_1500442043_lessons_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `lessons` (
  `id` int unsigned not null auto_increment primary key, 
  `course_id` int unsigned null, 
  `title` varchar(191) null, 
  `slug` varchar(191) null, 
  `lesson_image` varchar(191) null, 
  `lesson_video` varchar(191) null, 
  `short_text` text null, 
  `full_text` text null, 
  `position` int unsigned null, 
  `free_lesson` tinyint null default '0', 
  `published` tinyint null default '0', 
  `created_at` timestamp null, 
  `updated_at` timestamp null, 
  `deleted_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `lessons` 
add 
  constraint `54419_596eedbb6686e` foreign key (`course_id`) references `courses` (`id`) on delete cascade;
alter table 
  `lessons` 
add 
  index `lessons_deleted_at_index`(`deleted_at`);

-- migration:2017_07_19_082724_create_media_table --
create table `media` (
  `id` int unsigned not null auto_increment primary key, 
  `model_id` int unsigned null, 
  `model_type` varchar(191) null, 
  `collection_name` varchar(191) not null, 
  `name` varchar(191) not null, 
  `file_name` varchar(191) not null, 
  `disk` varchar(191) not null, 
  `size` int unsigned not null, 
  `manipulations` text not null, 
  `custom_properties` text not null, 
  `order_column` int unsigned null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `media` 
add 
  index `media_model_id_model_type_index`(`model_id`, `model_type`);

-- migration:2017_07_19_082929_create_1500442169_questions_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `questions` (
  `id` int unsigned not null auto_increment primary key, 
  `question` text not null, 
  `question_image` varchar(191) null, 
  `score` int null, 
  `created_at` timestamp null, 
  `updated_at` timestamp null, 
  `deleted_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `questions` 
add 
  index `questions_deleted_at_index`(`deleted_at`);

-- migration:2017_07_19_083047_create_1500442247_questions_options_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `questions_options` (
  `id` int unsigned not null auto_increment primary key, 
  `question_id` int unsigned null, `option_text` text not null, 
  `correct` tinyint null default '0', 
  `created_at` timestamp null, `updated_at` timestamp null, 
  `deleted_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `questions_options` 
add 
  constraint `54421_596eee8745a1e` foreign key (`question_id`) references `questions` (`id`) on delete cascade;
alter table 
  `questions_options` 
add 
  index `questions_options_deleted_at_index`(`deleted_at`);

-- migration:2017_07_19_083236_create_1500442356_tests_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `tests` (
  `id` int unsigned not null auto_increment primary key, 
  `course_id` int unsigned null, 
  `lesson_id` int unsigned null, 
  `title` varchar(191) null, 
  `description` text null, 
  `published` tinyint null default '0', 
  `created_at` timestamp null, 
  `updated_at` timestamp null, 
  `deleted_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `tests` 
add 
  constraint `54422_596eeef514d00` foreign key (`course_id`) references `courses` (`id`) on delete cascade;
alter table 
  `tests` 
add 
  constraint `54422_596eeef53411a` foreign key (`lesson_id`) references `lessons` (`id`) on delete cascade;
alter table 
  `tests` 
add 
  index `tests_deleted_at_index`(`deleted_at`);

-- migration:2017_07_19_120427_create_596eec08307cd_permission_role_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `permission_role` (
  `permission_id` int unsigned null, 
  `role_id` int unsigned null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `permission_role` 
add 
  constraint `fk_p_54415_54416_role_per_596eec08308d0` foreign key (`permission_id`) references `permissions` (`id`) on delete cascade;
alter table 
  `permission_role` 
add 
  constraint `fk_p_54416_54415_permissi_596eec0830986` foreign key (`role_id`) references `roles` (`id`) on delete cascade;

-- migration:2017_07_19_120430_create_596eec0af366b_role_user_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `role_user` (
  `role_id` int unsigned null, `user_id` int unsigned null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `role_user` 
add 
  constraint `fk_p_54416_54417_user_rol_596eec0af3746` foreign key (`role_id`) references `roles` (`id`) on delete cascade;
alter table 
  `role_user` 
add 
  constraint `fk_p_54417_54416_role_use_596eec0af37c1` foreign key (`user_id`) references `users` (`id`) on delete cascade;

-- migration:2017_07_19_120808_create_596eece522a6e_course_user_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `course_user` (
  `course_id` int unsigned null, `user_id` int unsigned null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `course_user` 
add 
  constraint `fk_p_54418_54417_user_cou_596eece522b73` foreign key (`course_id`) references `courses` (`id`) on delete cascade;
alter table 
  `course_user` 
add 
  constraint `fk_p_54417_54418_course_u_596eece522bee` foreign key (`user_id`) references `users` (`id`) on delete cascade;

-- migration:2017_07_19_121657_create_596eeef709839_question_test_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `question_test` (
  `question_id` int unsigned null, `test_id` int unsigned null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `question_test` 
add 
  constraint `fk_p_54420_54422_test_que_596eeef70992f` foreign key (`question_id`) references `questions` (`id`) on delete cascade;
alter table 
  `question_test` 
add 
  constraint `fk_p_54422_54420_question_596eeef7099af` foreign key (`test_id`) references `tests` (`id`) on delete cascade;

-- migration:2017_08_14_085956_create_course_students_table --
select 
  * 
from 
  information_schema.tables 
where 
  table_schema = ? 
  and table_name = ?;
create table `course_student` (
  `course_id` int unsigned null, `user_id` int unsigned null, 
  `created_at` timestamp null, `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `course_student` 
add 
  constraint `course_student_course_id_foreign` foreign key (`course_id`) references `courses` (`id`) on delete cascade;
alter table 
  `course_student` 
add 
  constraint `course_student_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade;

-- migration:2017_08_17_051131_create_tests_results_table --
create table `tests_results` (
  `id` int unsigned not null auto_increment primary key, 
  `test_id` int unsigned null, `user_id` int unsigned null, 
  `test_result` int not null, `created_at` timestamp null, 
  `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `tests_results` 
add 
  constraint `tests_results_test_id_foreign` foreign key (`test_id`) references `tests` (`id`) on delete cascade;
alter table 
  `tests_results` 
add 
  constraint `tests_results_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade;

-- migration:2017_08_17_051254_create_tests_results_answers_table --
create table `tests_results_answers` (
  `id` int unsigned not null auto_increment primary key, 
  `tests_result_id` int unsigned null, 
  `question_id` int unsigned null, `option_id` int unsigned null, 
  `correct` tinyint not null default '0', 
  `created_at` timestamp null, `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `tests_results_answers` 
add 
  constraint `tests_results_answers_tests_result_id_foreign` foreign key (`tests_result_id`) references `tests_results` (`id`) on delete cascade;
alter table 
  `tests_results_answers` 
add 
  constraint `tests_results_answers_question_id_foreign` foreign key (`question_id`) references `questions` (`id`) on delete cascade;
alter table 
  `tests_results_answers` 
add 
  constraint `tests_results_answers_option_id_foreign` foreign key (`option_id`) references `questions_options` (`id`) on delete cascade;

-- migration:2017_08_18_054622_create_lesson_student_table --
create table `lesson_student` (
  `lesson_id` int unsigned null, `user_id` int unsigned null, 
  `created_at` timestamp null, `updated_at` timestamp null
) default character set utf8mb4 collate utf8mb4_unicode_ci;
alter table 
  `lesson_student` 
add 
  constraint `lesson_student_lesson_id_foreign` foreign key (`lesson_id`) references `lessons` (`id`) on delete cascade;
alter table 
  `lesson_student` 
add 
  constraint `lesson_student_user_id_foreign` foreign key (`user_id`) references `users` (`id`) on delete cascade;

-- migration:2017_08_18_060324_add_rating_to_course_student_table --
alter table 
  `course_student` 
add 
  `rating` int unsigned not null default '0' 
after 
  `user_id`;
