from flask import Flask, render_template, request
from flask_mysqldb import MySQL

app = Flask(__name__)

# Konfiguracija baze podataka
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = 'root'
app.config['MYSQL_DB'] = 'linkedin'

mysql = MySQL(app)

@app.route('/', methods=['GET', 'POST'])
def index():
    if request.method == 'POST':
        # Dohvaćanje podataka iz HTML forme
        name = request.form['name']
        email = request.form['email']

        # Povezivanje s bazom podataka i izvršavanje upita
        cur = mysql.connection.cursor()
        cur.execute("INSERT INTO users (name, email) VALUES (%s, %s)", (name, email))
        mysql.connection.commit()
        cur.close()

        return 'Podaci su uspješno spremljeni!'
    
    return render_template('index.html')

if __name__ == '__main__':
    app.run(debug=True)