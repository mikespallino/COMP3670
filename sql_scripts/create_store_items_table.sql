CREATE TABLE store_items (
	item_id INT NOT NULL,
	item_name VARCHAR(50) NOT NULL,
    item_type VARCHAR(50) NOT NULL,
    item_info VARCHAR(50) NOT NULL,
    item_style VARCHAR(50) NOT NULL,
	item_img_path VARCHAR(100) NOT NULL,
	quantity INT NOT NULL,
	price FLOAT NOT NULL,
    display_item BOOLEAN NOT NULL,

PRIMARY KEY store_items_pk
	(item_id)
);