Users
1. username [varchar]
2. fullname [varchar]
3. phone_number [varchar]
4. email [varchar]
5. role_id [int] -> Roles
6. password [varchar]
7. avatar [varchar]
8. address [text]

Roles
1. name [varchar]

Product Categories
1. name [varchar]

Product Images
1. url [varchar]
2. product_id [int] -> Products

Products
1. name [varchar]
2. price [double]
3. description [text]
4. tags [varchar]
5. category_id [int] -> Product Categories

Transactions
1. user_id [int] -> Users
2. address [text]
3. payment_method_id [int]
4. total_price [double]
5. total_shipping [double]
6. status_id [int]

Payment Methods
1. name [varchar]

Transaction Statuses
1. name [varchar]

Product Transaction
1. product_id [int] -> Products
2. transaction_id [int] -> Transactions
3. quantity [int]
