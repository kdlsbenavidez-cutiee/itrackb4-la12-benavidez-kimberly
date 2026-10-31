# LA10 – Your Own Lookup Table

## Part G – Reflection

**1. What column did you choose to turn into a lookup table, and why?**

I chose the `category` column in my Skincare Products Management System. I decided to turn it into a lookup table because several skincare products share the same categories, such as Cleanser, Toner, Serum, and Sunscreen. Instead of storing the category name repeatedly in every product record, I created a separate Categories table and connected it to the Skincare table using `category_id`. This makes the data more organized and easier to manage.

**2. How many queries appeared in Screenshot 6, and why?**

In Screenshot 6, the query count was higher because the application loaded the skincare products first and then accessed their related categories separately. This caused additional database queries when displaying the category names. Each product needed to retrieve its related category, which resulted in more queries.

**3. Why is the relationship method in the main model singular (`category`) instead of plural (`categories`)?**

The relationship method in my Skincare model is named `category` because each skincare product belongs to only one category. I used a singular name to represent that one-to-one connection from the product's perspective. On the other hand, the Category model uses `skincares` because one category can have many skincare products.

