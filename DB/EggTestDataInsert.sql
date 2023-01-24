INSERT INTO categories (category) VALUES
('Csirke Tojás'),
('Strucc Tojás'),
('Kitalált Tojás'),
('Lúd Tojás'),
('Valamilyen Tojás');

INSERT INTO `delivery_modes` (`id`, `delivery_mode`) VALUES (NULL, 'Házhozszállítás'), (NULL, 'Postai átvétel');
INSERT INTO `payment_modes` (`id`, `payment_mode`) VALUES (NULL, 'Kártya'), (NULL, 'Készpénz');
INSERT INTO `customers` (`id`, `username`, `email`, `password`) VALUES (NULL, 'TesztUser', 'user@teszt.hu', 'teszt');