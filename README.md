# Тестовое задание interview_php_fts_4

## 1. Создайте fork репозитория
Создайте fork репозитория https://github.com/creaturd/interview_php_fts_4 в своём аккаунте на github.com

## 2. Выполните следующие задания

### Задание 1

Реализуйте класс для MySQLConnect, использующий класс DBConnect в качестве родительского, для того, чтобы иметь возможность подключаться к произвольной базе данных MySQL с помощью PDO;

### Задание 2

Напишите функцию, которые выполняет следующие действия и возвращает полученную информацию в виде JSON:

	1) Подключается к удаленной БД MySQL используя следующие данные:
	
•	host: mysql-rfam-public.ebi.ac.uk

•	user: rfamro

•	password: <без пароля>

•	port: 4497

•	database: Rfam


	2) Получает список видов (только названия - поле species в таблице taxomony, без дубликатов), автором описания семейства которых является человек с фамилией Petrov или Chen. Список видов отсортировать по алфавиту и вернуть в видео двумерного ассоциативного массива Автор > Вид;

### Задание 3

Напишите функцию, которая находит и выводит на экран количество всех записей, касающихся вируса, вызывающего Covid-19 в таблице genome.

## 3. Pull request
Создайте pull request в ветку master репозитория https://github.com/creaturd/interview_php_fts_4.
