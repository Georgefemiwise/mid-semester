CREATE DATABASE IF NOT EXISTS online_book_store;

USE online_book_store;

CREATE TABLE book (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  author VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  quantity INT(11) NOT NULL,
  image VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  author VARCHAR(255) NOT NULL,
  category VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  user_type ENUM('user', 'admin') DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  buyer_name VARCHAR(255) NOT NULL,
  buyer_email VARCHAR(255) NOT NULL,
  buyer_address VARCHAR(255) NOT NULL,
  buyer_city VARCHAR(255) NOT NULL,
  buyer_region VARCHAR(255) NOT NULL,
  buyer_zip_code VARCHAR(255) NOT NULL,
  buyer_payment_method VARCHAR(255) NOT NULL,
  orders TEXT NOT NULL,
  order_total_cost DECIMAL(10, 2) NOT NULL,
  status ENUM('pending', 'shipped', 'delivered') DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO book (author, title, description, price, category, image) VALUES 
('Jordan B Peterson', '12 Rules for Life', 'A self-help book offering 12 practical principles for living a meaningful life', 25.99, 'Self-help', '12_rules_for_life.jpg'),
('Stacy Willingham', 'A Flicker in the Dark', 'A thrilling mystery novel about a woman who inherits a mysterious house in the woods', 12.99, 'Mystery', 'a_flicker_in_the_dark.jpg'),
('James Clear', 'Atomic Habits', 'A guide to building good habits and breaking bad ones', 19.99, 'Self-help', 'atomic_habits.jpg'),
('Charlie Mackesy', 'The Boy, the Mole, the Fox and the Horse', 'A heartwarming book about the power of friendship and kindness', 29.99, 'Children', 'the_boy_the_mole_the_fox_and_the_horse.jpg'),
('Peggy Oppong', 'End of the Tunnel', 'A memoir about surviving abuse and finding hope', 15.99, 'Memoir', 'end_of_the_tunnel.jpg'),
('Susan Cain', 'Bitter Sweet', 'A non-fiction book about introversion and the power of quiet', 18.99, 'Non-fiction', 'bitter_sweet.jpg'),
('Margaret Mitchell', 'Gone with the Wind', 'A historical novel set during the American Civil War and Reconstruction era', 9.99, 'Historical fiction', 'gone_with_the_wind.jpg'),
('Emily Henry', 'Book Lovers', 'A romantic comedy about two people falling in love in a bookstore', 14.99, 'Romance', 'book_lovers.jpg'),
('Haruki Murakami', 'Kafka on the Shore', 'A surreal novel that explores themes of identity, family, and destiny', 22.99, 'Fiction', 'kafka_on_the_shore.jpg'),
('Bonnie Garmus', 'Lesson in Chemistry', 'A historical fiction about a brilliant female scientist who falls in love with her male colleague', 17.99, 'Historical fiction', 'lesson_in_chemistry.jpg');


