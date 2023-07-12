INSERT INTO categories (name, icon_class)
VALUES
('Текст', 'text'),
('Цитата','quote'),
('Картинка','photo'),
('Видео','video'),
('Ссылка', 'link');

INSERT INTO users
SET email = 'larisa@mail.com', name = 'Лариса', password = '12345', avatar_path = 'userpic-larisa-small.jpg';

INSERT INTO users
SET email = 'vladik@mail.com', name = 'Владик', password = '12345', avatar_path = 'userpic.jpg';

INSERT INTO users
SET email = 'victor@mail.com', name = 'Виктор', password = '12345', avatar_path = 'userpic-mark.jpg';

INSERT INTO posts
set  title = 'Цитата', category_id = 2, user_id = 1, description = 'Мы в жизни любим только раз, а после ищем лишь похожих';

INSERT INTO posts
set  title = 'Игра престолов', category_id = 1, user_id = 2, description = 'В лингвистике термин «текст» используется в широком значении, включая и образцы устной речи. Восприятие текста изучается в рамках лингвистики текста и психолингвистики. Так, например, И. Р. Гальперин определяет текст следующим образом: «Это письменное сообщение, объективированное в виде письменного документа, состоящее из ряда высказываний, объединённых разными типами лексической, грамматической и логической связи, имеющее определённый моральный характер, прагматическую установку и соответственно литературно обработанное»';

INSERT INTO posts
set  title = 'Наконец, обработал фотки!', category_id = 3, user_id = 3, img_path = 'rock-medium.jpg';

INSERT INTO posts
set  title = 'Моя мечта', category_id = 3, user_id = 1, img_path = 'coast-medium.jpg';

INSERT INTO posts
set  title = 'Лучшие курсы', category_id = 5, user_id = 2, site_link = 'www.htmlacademy.ru';

INSERT INTO comments
set description = 'Вау, как круто!', user_id = 1, post_id = 3;

INSERT INTO comments
set description = 'Этого точно того стоит!', user_id = 2, post_id = 4;


-- получить список постов с сортировкой по популярности и вместе с именами авторов и типом контента
SELECT p.title, u.name AS username, c.name
FROM posts p JOIN users u ON p.user_id = u.id
JOIN categories c ON p.category_id = c.id
ORDER BY show_count DESC;

-- получить список постов для конкретного пользователя
SELECT p.title
FROM posts p JOIN users u ON p.user_id = u.id
WHERE u.name = 'Лариса';

-- получить список комментариев для одного поста, в комментариях должен быть логин пользователя
SELECT c.description, u.email
FROM comments c JOIN posts p ON c.post_id = p.id
JOIN users u ON c.user_id = u.id
WHERE p.id = 3;

-- добавить лайк к посту
INSERT INTO likes SET user_id = 1, post_id = 1;

-- подписаться на пользователя
INSERT INTO subscriptions SET author_id = 1, follower_id = 2;
