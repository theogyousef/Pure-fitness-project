import mysql.connector

# Establish a database connection
db_connection = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="purefitness"
)

# Create a cursor object to execute SQL queries
cursor = db_connection.cursor()

def get_product_info(product_name):
    try:
        # Execute a SQL query to retrieve product information based on the user's input
        query = "SELECT name, price, description FROM products WHERE Name = %s"
        cursor.execute(query, (product_name,))
        result = cursor.fetchone()

        if result:
            name, price, description = result
            return f"Product Name: {name}\nPrice: {price}\nDescription: {description}"
        else:
            return "Product not found."

    except mysql.connector.Error as err:
        print(f"Error: {err}")
        return "An error occurred while retrieving product information."

# Your chatbot logic here
user_input = input("Enter your query: ")
if user_input.lower() == "get product info":
    product_name = input("Enter the product name: ")
    product_info = get_product_info(product_name)
    print(product_info)

# Close the cursor and database connection when done
cursor.close()
db_connection.close()
